<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\ContactForm;
use app\models\EmailForm;
use app\models\Post;
use app\models\Test;
use app\models\PostLike;  // 添加这行
use app\models\Employees;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionerror()
    {
        return $this->render('error');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if ($model->user->getRole() == 0) {
                return Yii::$app->response->redirect(['backend/backend/index']);
            } else
                return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionRegister()
    {
        $model = new RegisterForm();
        $email = new EmailForm();
        if ($model->load(Yii::$app->request->post())) {
            $email->email = $model->email;
            $email->code = $model->VerificationCode;
            if (isset($_POST['send'])) {

                if ($email->sendVerificationCode()) {
                    $email->addError('email', 'success send code');

                } else {
                    $email->addError('email', 'fail send code');
                }
            } else if (isset($_POST['register'])) {
                if ($model->Register()) {

                    if ($model->user->getRole() == 0) {
                        return Yii::$app->response->redirect(['backend/backend/index']);
                    } else
                        return $this->goBack();
                }



            }
        }
        $model->password = '';
        return $this->render('register', [
            'model' => $model,
        ]);

    }
    public function actionFind()
    {
        $model = new EmailForm();

        if ($model->load(Yii::$app->request->post())) {
            if (isset($_POST['send'])) {
                if ($model->sendVerificationCode()) {
                    $model->addError('email', 'success send code');

                } else {
                    $model->addError('email', 'fail send code');
                }
            } else if (isset($_POST['login'])) {
                $model->login();
                if ($model->user->getRole() == 0) {
                    return Yii::$app->response->redirect(['backend/backend/index']);
                } else
                    return $this->goBack();
            }


        }

        return $this->render('find', [
            'model' => $model,
        ]);

    }




    public function actionInitPermissions()
    {
        $auth = Yii::$app->authManager();

        // 创建权限
        $enterbackend = $auth->createPermission('enterbackend');
        $enterbackend->description = '进入后台';
        $auth->add($enterbackend);



        // 创建角色
        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $user = $auth->createRole('user');
        $auth->add($user);

        // 给角色分配权限
        $auth->addChild($admin, $enterbackend);

    }

    public function actionCreatepost()
    {
        // 创建新的模型实例
        $model = new Post();

        // 检查是否是 POST 提交
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '添加成功！');
            return $this->redirect(['index']);
        }

        // 渲染视图并传递模型
        return $this->render('createpost', [
            'model' => $model  // 这里传递模型到视图
        ]);
    }

    public function actionViewpost()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\Post::find()->orderBy(['create_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10, // 每页显示10条
            ],
        ]);

        return $this->render('viewpost', [
            'dataProvider' => $dataProvider  // 传递 dataProvider 到视图
        ]);
    }

    public function actionCreate()
    {
        // 创建新的模型实例
        $model = new Test();

        // 检查是否是 POST 提交
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '添加成功！');
            return $this->redirect(['index']);
        }

        // 渲染视图并传递模型
        return $this->render('create', [
            'model' => $model  // 这里传递模型到视图
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionDetail($id)
    {
        return $this->render('detail', [
            'id' => $id
        ]);
    }

    public function actionTest()
    {
        // 测试创建点赞
        $postLike = new PostLike();
        $postLike->post_id = 1;
        $postLike->user_id = 1;
        var_dump($postLike->save()); // 应该返回 true

        // 测试重复点赞
        $duplicateLike = new PostLike();
        $duplicateLike->post_id = 1;
        $duplicateLike->user_id = 1;
        var_dump($duplicateLike->save()); // 应该返回 false，因为违反唯一约束
    }


}

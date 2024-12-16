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
use app\models\Feedback;
use yii\data\ActiveDataProvider;

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
        // 获取留言数据
        $feedbacks = Feedback::find()
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(10)  // 限制显示最新的10条
            ->all();
    
        return $this->render('index', [
            'feedbacks' => $feedbacks,  // 传递留言数据到视图
        ]);
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

    public function actionFeedback()
    {
        $model = new Feedback();
        
        // 创建数据提供者
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find()->orderBy(['created_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        // 处理表单提交
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', '感谢您的留言！');
                return $this->refresh(); // 刷新页面
            } else {
                Yii::$app->session->setFlash('error', '留言提交失败，请检查输入！');
            }
        }

        return $this->render('feedback', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionD3demo1()
    {
        return $this->render('d3demo1');
    }

    public function actionD3demo2()
    {
        // 从 feedback 表获取留言列表
        $feedbacks = Feedback::find()
            ->select(['id', 'author_name', 'content']) // 假设是 title 和 body 字段
            ->asArray()
            ->all();
        
        return $this->render('d3demo2', [
            'feedbacks' => $feedbacks
        ]);
    }

    public function actionGetFeedback($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        $feedback = Feedback::findOne($id);
        if ($feedback) {
            return [
                'success' => true,
                'content' => $feedback->body // 使用 body 字段
            ];
        }
        return ['success' => false];
    }

    public function actionD3demo3()
    {
        // 传递必要的数据到视图
        $year = date('Y'); // 或者从请求中获取具体年份
        
        return $this->render('d3demo3', [
            'year' => $year,
        ]);
    }
}

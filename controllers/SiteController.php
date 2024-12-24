<?php
/**
 * SiteController 类负责管理网站的前端控制逻辑，包括用户认证、内容展示和权限管理等功能。
 * 该控制器使用了 Yii2 框架中的一些重要组件，如 AccessControl 和 VerbFilter，以确保只有经过身份验证的用户才能执行特定操作。
 * 
 * 主要功能：
 * 1. **首页展示**：通过 actionIndex 方法渲染网站的首页。
 * 2. **用户登录与注销**：actionLogin 和 actionLogout 方法分别处理用户的登录和注销请求，其中登录后根据用户角色重定向到不同的页面。
 * 3. **用户注册与验证**：actionRegister 方法处理用户注册，包括发送验证邮件和注册逻辑；actionFind 方法用于找回密码功能。
 * 4. **联系管理员**：actionContact 方法允许用户通过表单与管理员联系，支持发送消息并在成功后提供反馈。
 * 5. **关于页面**：actionAbout 方法返回关于页面的视图。
 * 6. **权限管理**：actionInitPermissions 方法用于初始化用户角色及其权限，支持后台管理功能。
 * 7. **文章管理**：包括创建文章（actionCreatepost）、查看文章（actionViewpost）等功能，使用 ActiveDataProvider 实现分页展示。
 * 8. **测试功能**：actionTest 方法用于测试文章点赞功能，包括正常点赞和重复点赞的验证。
 * 
 * 该控制器的实现充分利用了 Yii2 的 MVC 架构，确保了代码的可维护性和扩展性。所有的用户输入均经过相应模型的验证，确保数据的安全性和完整性。同时，通过使用闪存消息（flash messages），在用户操作后给予即时反馈，提升用户体验。
 */

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

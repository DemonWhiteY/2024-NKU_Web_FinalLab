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
                $model->Register();
                if ($model->user->getRole() == 0) {
                    return Yii::$app->response->redirect(['backend/backend/index']);
                } else
                    return $this->goBack();
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








}

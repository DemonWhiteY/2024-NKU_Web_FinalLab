<?php
/**
 * UserController类负责实现用户模型的增删改查（CRUD）操作。
 * 
 * 本控制器继承自Yii框架的基类Controller，主要用于处理与用户相关的请求，包括：
 * 1. 列出所有用户（actionIndex）：通过UserSearch模型搜索用户，并将结果提供给视图进行渲染。
 * 2. 查看单个用户详情（actionView）：根据用户ID查找指定用户模型，并渲染用户详情视图。
 * 3. 创建新用户（actionCreate）：提供一个表单用于输入新用户信息，成功后会重定向到该用户的详情页面。
 * 4. 更新现有用户信息（actionUpdate）：加载指定用户模型，提供表单用于编辑用户信息，保存后重定向至用户详情页面。
 * 5. 删除用户（actionDelete）：根据用户ID删除指定用户，并重定向至用户列表页面。
 * 
 * 该控制器还实现了请求方法的过滤（behaviors方法），确保仅通过POST方法进行删除操作，从而增强安全性。此外，所有操作都具备异常处理机制，如果请求的用户模型不存在，将抛出404错误，提示用户相应的错误信息。
 * 
 * 总之，UserController提供了一个完整的用户管理功能，包括用户的搜索、查看、创建、更新和删除，体现了Yii框架的MVC设计模式和RESTful风格的应用开发理念，能够为开发人员提供一个清晰、高效的用户管理界面。
 */

namespace app\controllers;

use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $UserID User ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($UserID)
    {
        return $this->render('view', [
            'model' => $this->findModel($UserID),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'UserID' => $model->UserID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $UserID User ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($UserID)
    {
        $model = $this->findModel($UserID);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'UserID' => $model->UserID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $UserID User ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($UserID)
    {
        $this->findModel($UserID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $UserID User ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($UserID)
    {
        if (($model = User::findOne(['UserID' => $UserID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

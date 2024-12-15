<?php
namespace app\modules\backend\controllers;

use Yii;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UserController 用于后台用户管理
 */
class UserController extends Controller
{
    // 页面布局设置
    public $layout = 'adamin';  // 后台管理布局

    /**
     * 显示用户列表
     */
    public function actionIndex()
    {
        // 创建数据提供者，获取所有用户数据
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 20,  // 每页显示 20 个用户
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,  // 将数据提供者传递给视图
        ]);
    }

    /**
     * 编辑用户信息
     * @param int $id 用户ID
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = User::findOne($id);  // 根据ID查找用户
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'User updated successfully.');
            return $this->redirect(['index']);  // 更新后重定向到用户列表页面
        }

        return $this->render('update', [
            'model' => $model,  // 将用户模型传递给视图
        ]);
    }

    // 删除用户
    public function actionDelete($id)
    {
        // 通过 id 查找用户模型
        $model = User::findOne($id);

        // 删除模型
        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'User has been deleted successfully.');
        } else {
            Yii::$app->session->setFlash('error', 'Error occurred while deleting user.');
        }

        // 重定向回用户管理页面
        return $this->redirect(['index']);
    }

    public function actionCreate()
{
    $model = new User();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        Yii::$app->session->setFlash('success', '用户创建成功！');
        return $this->redirect(['index']);
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}


}

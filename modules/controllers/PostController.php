<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-14
 * This is the main layout of Backend-Post.
 */
namespace app\modules\backend\controllers;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\models\Post;

class PostController extends Controller
{
    public $layout = 'adamin'; // 使用后台布局

    // 显示 Post 列表
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'pagination' => ['pageSize' => 10], // 每页显示 10 条数据
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // 创建 Post
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Post 创建成功！');
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    // 编辑 Post
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Post 更新成功！');
            return $this->redirect(['index']);
        }

        return $this->render('update', ['model' => $model]);
    }

    // 删除 Post
    public function actionDelete($id)
    {
        // 根据 ID 查找模型
        $model = $this->findModel($id);

        if ($model !== null) {
            $model->delete();
            Yii::$app->session->setFlash('success', '删除成功！');
        } else {
            Yii::$app->session->setFlash('error', '记录不存在！');
        }

        return $this->redirect(['index']);
    }

    // 根据 ID 查找模型
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('请求的页面不存在。');
    }
}

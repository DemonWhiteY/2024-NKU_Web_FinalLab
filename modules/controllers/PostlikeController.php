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
use app\models\PostLike;
use app\models\PostLikeSearch;

class PostlikeController extends Controller
{
    public $layout = 'adamin'; // 使用后台布局

    // 显示 PostLike 列表
    public function actionIndex()
{
    $searchModel = new PostLikeSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
}


    // 创建 PostLike
    public function actionCreate()
    {
        $model = new PostLike();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'PostLike 创建成功！');
            return $this->redirect(['index']);
        }

        return $this->render('create', ['model' => $model]);
    }

    // 删除 PostLike
    public function actionDelete($id)
    {
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
        if (($model = PostLike::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('请求的页面不存在。');
    }
}
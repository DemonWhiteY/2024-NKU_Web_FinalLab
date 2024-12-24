<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-13
 * This is the main layout of Backend-Comment
 */
namespace app\modules\backend\controllers;

use Yii;
use app\models\CommentLike;
use app\models\CommentLikeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CommentlikeController extends Controller
{
    public $layout = 'adamin'; // 使用后台布局
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    // 显示评论点赞列表
    public function actionIndex()
    {
        $searchModel = new CommentLikeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // 删除评论点赞
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', '评论点赞已删除');
        return $this->redirect(['index']);
    }

    // 获取指定的评论点赞模型
    protected function findModel($id)
    {
        if (($model = CommentLike::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

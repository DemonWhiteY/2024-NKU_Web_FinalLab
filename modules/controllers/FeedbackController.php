<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-18
 * This is the main layout of Backend-Feedback.
 */

namespace app\modules\backend\controllers;

use Yii;
use app\models\Feedback;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * FeedbackController 实现留言的后台管理
 */
class FeedbackController extends Controller
{
    /**
     * 列表页：显示所有留言
     * @return string
     */

    public $layout = 'adamin'; // 使用后台布局
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Feedback::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 查看单个留言详情
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * 删除留言
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        Yii::$app->session->setFlash('success', '留言已成功删除！');
        return $this->redirect(['index']);
    }

    /**
     * 查找模型
     * @param int $id
     * @return Feedback|null
     * @throws NotFoundHttpException
     */
    protected function findModel($id)
    {
        if (($model = Feedback::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('请求的记录不存在。');
    }
}

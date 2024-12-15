<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Test;

class TestController extends Controller
{
    // 显示列表
    public function actionIndex()
    {
        $tests = Test::find()->all();
        return $this->render('index', [
            'tests' => $tests
        ]);
    }

    // 创建新记录
    public function actionCreate()
    {
        $model = new Test();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '添加成功！');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }
}
<?php
namespace app\modules\backend\controllers;

use Yii;
use yii\web\Controller;

class SettingsController extends Controller
{
    public function actionIndex()
    {
        // 使用后台管理布局
        $this->layout = 'adamin';

        // 渲染视图
        return $this->render('index');
    }
}

<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-10
 * This is the main layout of Backend-setting.
 */
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

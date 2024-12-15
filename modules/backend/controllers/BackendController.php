<?php

namespace app\modules\backend\controllers;

use yii\web\Controller;
use app\models\User;

/**
 * Default controller for the `backend` module
 */
class BackendController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'adamin';
        return $this->render('index');
    }


    /**
     * 团队作业页面
     * @return string
     */
    public function actionHomework()
    {
        $this->layout = 'adamin';  // 使用后台管理布局
        return $this->render('homework');  // 渲染 user-management 视图
    }

    public function actionTeammember()
    {
        $this->layout = 'adamin';  // 使用后台管理布局
        return $this->render('teammember');  // 渲染 user-management 视图
    }
}

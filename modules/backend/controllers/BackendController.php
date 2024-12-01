<?php

namespace app\modules\backend\controllers;

use yii\web\Controller;

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
}

<?php

namespace app\controllers;

use app\models\Employees;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class EmployeesController extends Controller
{
    // 行为过滤器（如 POST 请求只允许修改）
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'update' => ['POST'],
                ],
            ],
        ];
    }

    public function actionEmployee($id)
    {
        $employee = $this->findModel($id);  // 根据员工ID查找员工数据

        return $this->render('employees', [
            'model' => $employee,  // 将员工数据传递给视图
        ]);
    }

    // 查找员工信息（如果不存在则抛出404错误）
    protected function findModel($id)
    {
        if (($model = Employees::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

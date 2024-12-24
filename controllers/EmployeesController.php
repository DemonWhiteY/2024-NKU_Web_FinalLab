<?php

namespace app\controllers;

use app\models\Employees;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * EmployeesController 处理员工模型的CRUD操作。
 * 该控制器提供员工信息的显示功能，能够根据员工ID渲染不同的视图。
 * 主要包含以下功能：
 * - 行为过滤器：限制某些操作的请求方式（如更新操作只允许POST请求）。
 * - actionEmployee：根据传入的员工ID查找员工数据，并渲染相应的视图。
 * - findModel：根据员工ID查找员工记录，如果记录不存在，则抛出404错误。
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
    $employee = $this->findModel($id); // 根据员工ID查找员工数据

    // 根据不同的id渲染不同的视图
    switch ($id) {
        case 1:
            $view = 'employees1';
            break;
        case 2:
            $view = 'employees2';
            break;
        case 3:
            $view = 'employees3';
            break;
        case 0:
            $view = 'employees0';
            break;
        default:
            $view = 'employees'; // 默认视图
    }

    return $this->render($view, [
        'model' => $employee, // 将员工数据传递给视图
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

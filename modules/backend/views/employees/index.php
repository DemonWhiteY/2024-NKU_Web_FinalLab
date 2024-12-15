<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employees-index">
    <!-- 将标题居中显示 -->
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <div class="employees-wrapper">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function ($model) {
                return $this->render('_employee', ['model' => $model]);
            },
            'layout' => "{items}",
        ]) ?>
    </div>
</div>

<style>
    /* 父容器：卡片横向排列，并填满整行 */
    .employees-wrapper {
        display: flex;
        flex-direction: column; /* 垂直排列 */
        width: 100%; /* 父容器填满页面 */
    }

    .employee-card {
        width: 100%; /* 每个卡片宽度填满整行 */
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px; /* 卡片之间的间距 */
        background-color: #f9f9f9;
        text-align: center;
        box-sizing: border-box;
    }

    .employee-img img {
        border-radius: 50%;
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .employee-info {
        margin-top: 15px;
    }

    .employee-name {
        font-size: 22px;
        font-weight: bold;
    }

    /* 响应式设计：在较小屏幕上调整布局 */
    @media (max-width: 768px) {
        .employee-card {
            min-width: 200px; /* 在较小的屏幕上调整最小宽度 */
        }
    }

    /* 确保标题居中显示 */
    h1 {
        text-align: center;
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>

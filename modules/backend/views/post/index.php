<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-14
 * This is the main layout of Backend-Post.
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Post 列表';
$this->params['breadcrumbs'][] = $this->title;

// 加载 CSS 文件
$this->registerCssFile('@web/css/backend/custom.css', ['depends' => \yii\web\JqueryAsset::className()]);
?>

<div class="post-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    <p class="text-center">
        <?= Html::a('创建新 Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-hover table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], // 序号列

            'id',
            'name',
            'content:ntext',
            'author_id',
            'create_at:date', // 格式化日期显示

            [
                'label' => '点赞数',
                'value' => function ($model) {
                    return $model->getLikeCount();
                },
            ],
            // 操作按钮列
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-edit"></i> 编辑', ['update', 'id' => $model->id], [
                            'class' => 'btn btn-primary btn-sm',
                            'title' => '编辑',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i> 删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'title' => '删除',
                            'data' => [
                                'confirm' => '确定要删除此 Post 吗？',
                              
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>


 
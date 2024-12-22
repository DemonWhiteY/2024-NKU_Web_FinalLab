<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = '留言管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], // 序号

            'id',
            'content:ntext',
            'author_name',
            [
                'attribute' => 'rating',
                'value' => function ($model) {
                    return $model->getRatingText();
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'created_at',
                'value' => function ($model) {
                    return $model->getFormattedCreatedAt();
                },
            ],

            // 操作按钮
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-eye"></i> 查看', $url, [
                            'class' => 'btn btn-info btn-sm',
                            'title' => '查看详情',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i> 删除', $url, [
                            'class' => 'btn btn-danger btn-sm',
                            'title' => '删除',
                            'data' => [
                                'confirm' => '确定要删除此留言吗？',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

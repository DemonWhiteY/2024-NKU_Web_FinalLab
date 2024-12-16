<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$this->title = '评论管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="comment-index">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('创建评论', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php Pjax::begin(); ?>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($searchModel, 'post_id') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'user_id') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'content') ?>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-hover table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'post_id',
            'user_id',
            'content',
            'created_at:datetime', // 显示创建时间
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{view} {update} {delete}', // 显示查看、编辑、删除按钮
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'class' => 'btn btn-info btn-sm',
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'class' => 'btn btn-warning btn-sm',
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'class' => 'btn btn-danger btn-sm',
                            'data-method' => 'post',
                            'data-confirm' => '确定要删除这条评论吗？',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

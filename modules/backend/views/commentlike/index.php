<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-13
 * This is the main layout of Backend-Comment
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\widgets\ActiveForm;

$this->title = '评论点赞管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="comment-like-index">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php Pjax::begin(); ?>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['index'],
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($searchModel, 'comment_id') ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($searchModel, 'user_id') ?>
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
            'comment_id',
            'user_id',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{delete}', // 显示删除按钮
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'class' => 'btn btn-danger btn-sm',
                            'data-method' => 'post',
                            'data-confirm' => '确定要删除这条评论点赞吗？',
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

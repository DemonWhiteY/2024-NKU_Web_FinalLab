<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Post Likes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-like-index">
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Create Post Like', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <!-- 搜索表单 -->
    <div class="row">
        <div class="col-md-12">
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
                    <div class="form-group">
                        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <style>
        .post-like-index {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .post-like-index .text-center {
            text-align: center;
        }
        .post-like-index h1 {
            margin-bottom: 20px;
        }
        .post-like-index .btn {
            margin-bottom: 20px;
        }
        .post-like-index .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }
        .post-like-index .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .post-like-index .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .post-like-index .table {
            margin-top: 20px;
        }
    </style>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel, // 确保 filterModel 已传递
        'tableOptions' => ['class' => 'table table-hover table-bordered'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'], // 序号列

            'id',        // PostLike ID
            'post_id',   // 关联的 Post ID
            'user_id',   // 关联的 User ID

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => '操作',
                'template' => '{delete}', // 只显示删除按钮
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        return Html::a('<i class="fas fa-trash"></i> 删除', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger btn-sm',
                            'data-method' => 'post', // 使用 POST 方法发送请求
                            'data-confirm' => '确定要删除该项吗？', // 删除确认提示
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>

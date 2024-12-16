<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <div class="page-header">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
    </div>


    <!-- 用户列表-->
    <?php Pjax::begin(); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table table-striped table-bordered'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'username',
                'email:email',
                [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        return $model->status == 10 ? 'Active' : 'Inactive';  // 显示状态
                    },
                ],

                [
                    'attribute' => 'role',
                    'value' => function ($model) {
                        // 假设role的值是1或0，您可以根据实际情况调整这里的显示文本
                        return $model->role == 0 ? 'Admin' : 'User';
                    },
                    'filter' => false, // 如果不需要在搜索框中过滤role，可以设置为false
                ],

                // 操作按钮（查看、编辑、删除）
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}', // 定义操作按钮
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-eye"></i> View', $url, [
                                'title' => 'View',
                                'class' => 'btn btn-info btn-sm',
                                'data-toggle' => 'tooltip',
                                'style' => 'margin-right: 5px;',  // 按钮之间的间距
                            ]);
                        },
                        'update' => function ($url, $model, $key) {
                            return Html::a('<i class="fas fa-pencil-alt"></i> Edit', $url, [
                                'title' => 'Update',
                                'class' => 'btn btn-primary btn-sm',
                                'data-toggle' => 'tooltip',
                                'style' => 'margin-right: 5px;',  // 按钮之间的间距
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            // 检查用户的 role 是否为 1
                            if ($model->role == 1) {
                                return Html::a('<i class="fas fa-trash-alt"></i> Delete', ['delete', 'id' => $model->id], [
                                    'title' => 'Delete',
                                    'class' => 'btn btn-danger btn-sm',
                                    'data-toggle' => 'tooltip',
                                    'data-method' => 'post',  // 确保使用 post 方法
                                    'style' => 'margin-right: 5px;',  // 按钮之间的间距
                                ]);
                            } else {
                                // 如果 role 不是 1，返回一个不可操作的按钮
                                return Html::button('<i class="fas fa-trash-alt"></i> Delete', [
                                    'class' => 'btn btn-danger btn-sm disabled',  // 禁用按钮
                                    'title' => 'Cannot delete user with role 0',  // 提示不能删除
                                    'disabled' => true,  // 禁用删除按钮
                                ]);
                            }
                        },
                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return ['update', 'id' => $model->id];
                    },
                ],
            ],
        ]); ?>
    </div>

    <?php Pjax::end(); ?>
</div>

<!-- 页面顶部和底部的空白 -->
<div class="clearfix"></div>

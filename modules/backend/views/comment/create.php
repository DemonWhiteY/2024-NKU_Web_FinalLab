<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-12
 * This is the main layout of Backend-Comment.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '创建评论';
$this->params['breadcrumbs'][] = ['label' => '评论管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="comment-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'post_id')->textInput() ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('创建', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

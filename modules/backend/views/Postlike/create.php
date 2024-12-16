<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Create Post Like';
$this->params['breadcrumbs'][] = ['label' => 'Post Likes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-like-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="post-like-form">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'post_id')->textInput() ?>
        <?= $form->field($model, 'user_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

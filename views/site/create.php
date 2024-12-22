<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>创建新记录</h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'content')->textarea() ?>



<div class="form-group">
    <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
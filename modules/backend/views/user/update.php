<?php
/**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-14
 * This is the main layout of Backend-User.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = '用户修改: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => '/User Management/', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="user-update container">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'form-horizontal'], // 设置为水平表单
            ]); ?>

            <!-- Username -->
            <div class="form-group">
                <?= $form->field($model, 'username')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control',
                    'placeholder' => 'Enter username',
                ])->label('Username') ?>
            </div>

            <!-- Email -->
            <div class="form-group">
                <?= $form->field($model, 'email')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control',
                    'placeholder' => 'Enter email address',
                ])->label('Email') ?>
            </div>

            <!-- Status -->
            <div class="form-group">
                <?= $form->field($model, 'status')->dropDownList([
                    10 => 'Active',
                    0 => 'Inactive',
                ], [
                    'class' => 'form-control',
                    'prompt' => 'Select Status'
                ])->label('Status') ?>
            </div>

            <!-- Role -->
            <div class="form-group">
                <?= $form->field($model, 'role')->dropDownList([
                    0 => 'Admin',
                    1 => 'User',
                ], [
                    'class' => 'form-control',
                    'prompt' => 'Select Role'
                ])->label('Role') ?>
            </div>

            <!-- Submit Button -->
            <div class="form-group text-center">
                <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-lg']) ?>
                <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-secondary btn-lg']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<style>
    .user-update .form-group {
        margin-bottom: 20px;
    }

    .user-update .form-control {
        border-radius: 4px;
        box-shadow: none;
        font-size: 14px;
    }

    .user-update .btn {
        margin-top: 10px;
    }

    .user-update .btn-lg {
        padding: 10px 20px;
        font-size: 16px;
    }

    .user-update h1 {
        margin-bottom: 20px;
    }

    .user-update .row {
        margin-top: 30px;
    }

    .user-update .col-md-8, .user-update .col-lg-6 {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .user-update .btn-secondary {
        margin-left: 10px;
    }
</style>
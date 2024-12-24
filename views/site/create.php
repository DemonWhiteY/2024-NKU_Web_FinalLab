<?php
/**
 * 该文件主要实现了一个创建新记录的表单，是基于 Yii2 框架的视图文件。
 * 
 * 本页面的标题为“创建新记录”，用于让用户能够输入新记录的相关信息并提交。
 * 表单通过 `ActiveForm` 小部件进行创建，能够简化表单的构建和处理过程。
 * 
 * 具体功能包括：
 * 1. 创建一个输入框，让用户填写记录的名称（name）。此输入框由 `$form->field($model, 'name')->textInput()` 指定，确保用户输入的名称符合预期格式。
 * 2. 创建一个多行文本框，用于用户输入记录的具体内容（content）。通过 `$form->field($model, 'content')->textarea()` 实现，使得用户可以输入较长的文本信息。
 * 3. 提供一个提交按钮，用户在填写完所有必要信息后，可以点击该按钮提交表单。按钮使用 `Html::submitButton` 进行生成，样式应用了 Bootstrap 的成功按钮样式（btn btn-success），增强了用户界面的友好性和交互性。
 * 
 * 该表单的提交操作将会将输入的数据发送到服务器，并由相应的控制器处理。用户输入的名称和内容会被存储在模型中，这样在表单提交后，可以通过模型进行验证和数据存储。
 * 
 * 本示例体现了 Yii2 MVC 框架的优势，借助于 ActiveForm 和模型的结合，能够有效地管理用户输入，进行数据校验，并维护良好的代码结构。
 * 
 * 使用此表单功能的场景包括但不限于记录管理系统、内容管理系统等，适合需要用户提交信息的应用场景。
 */
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
<?php
/**
 * 该代码片段是一个Yii2框架下的联系表单视图文件，用于处理用户向网站发送联系信息的功能。
 * 
 * 在这个视图中，首先使用了Yii的视图组件（yii\web\View）和表单组件（yii\bootstrap5\ActiveForm）来构建一个响应式的联系表单。
 * 视图的标题被设置为“Contact”，同时将其添加到面包屑导航中，以便用户能够清晰地了解当前页面的位置。
 * 
 * 代码中包含了一个条件判断，首先检查会话中是否存在名为'contactFormSubmitted'的闪存消息。
 * 如果存在，说明表单已成功提交，页面将显示一条成功消息，告知用户他们的联系请求已经发送，并提醒开发者在调试模式下可以查看邮件内容。
 * 如果应用处于开发模式，邮件不会真正发送，而是被保存为文件，这有助于开发者进行测试和调试。
 * 
 * 如果表单尚未提交，则会呈现一个填写联系信息的表单，包括姓名、电子邮件、主题、内容和验证码字段。表单使用了Yii的ActiveForm组件，提供了用户友好的输入界面。
 * 验证码字段使用了Captcha小部件，以防止恶意提交。用户填写完表单后，可以点击“提交”按钮将信息发送到服务器。
 * 
 * 整体设计旨在提供简洁明了的用户体验，同时确保用户可以方便地与网站管理员进行联系。这段代码展示了Yii2框架的强大功能，利用了其内置的表单处理和验证机制，提升了开发效率和用户体验。
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\ContactForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

        <p>
            Note that if you turn on the Yii debugger, you should be able
            to view the mail message on the mail panel of the debugger.
            <?php if (Yii::$app->mailer->useFileTransport): ?>
                Because the application is in development mode, the email is not sent but saved as
                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
                application component to be false to enable email sending.
            <?php endif; ?>
        </p>

    <?php else: ?>

        <p>
            If you have business inquiries or other questions, please fill out the following form to contact us.
            Thank you.
        </p>

        <div class="row">
            <div class="col-lg-5">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
</div>

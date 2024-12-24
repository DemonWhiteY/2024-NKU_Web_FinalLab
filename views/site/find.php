<?php
/**
 * 登录页面视图模板
 *
 * 本文件是一个使用 Yii2 框架构建的登录页面视图模板，主要用于用户登录功能的实现。
 * 页面包括了用户输入电子邮件和验证码的表单，提供发送验证码和登录的按钮。
 * 
 * 模版主要由以下几个部分组成：
 * 1. 页面标题区域：使用背景图片展示页面标题“登录”，并提供面包屑导航，指导用户返回主页。
 * 2. 登录表单区域：包含一个表单，用户可以输入其电子邮件和验证码。表单使用 Yii2 的 ActiveForm 组件，确保输入的有效性和易用性。
 *    - 电子邮件输入框：默认聚焦，方便用户快速输入。
 *    - 验证码输入框：用户输入验证码后，可以点击“发送验证码”按钮获取新的验证码。
 *    - 记住我复选框：用户可以选择是否在下次访问时自动登录。
 *    - 提供了“验证码登录”和“没有账号？注册一个”的链接，方便新用户注册。
 * 3. 联系信息区域：展示了联系方式，包括电话、电子邮件和地址，方便用户与网站管理员联系。
 * 4. 订阅区域：鼓励用户订阅以获取最新的物流服务信息，增强用户粘性。
 * 
 * 页面设计上采用了响应式布局，确保在不同设备上的良好展示效果。主要使用了 Bootstrap 5 框架的组件，提升了页面的美观性和用户体验。
 * 
 * 注意：示例登录信息（admin/admin 和 demo/demo）仅供演示使用，实际应用中应注意安全性，避免使用简单的用户名和密码。
 * 本文件的使用需要与相应的控制器和模型相结合，以实现完整的登录功能。
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\EMailForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url


?>


<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="assets/img/photos/bg2.webp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">Login</h2>
                        <div class="bread-crumbs"><a href="index.html"> Home </a><span class="breadcrumb-sep"> //
                            </span><span class="active"> Login</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
    <section class="contact-area">
        <div class="contact-page-wrap">
            <div class="container container-info">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-title">
                            <h2 class="title">登陆</h2>
                            <p>Lorem Ipsum is simply dummy text the printing galley of type <br>and scrambed make
                                type specimen.</p>
                        </div>
                        <div class="col-lg-12">

                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'fieldConfig' => [
                                    'template' => "{label}\n{input}\n{error}",
                                    'labelOptions' => ['class' => 'col-lg-3 col-form-label mr-lg-3'],
                                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                                ],
                            ]); ?>

                            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                            <div class="row">
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'code')->textInput() ?>
                                </div>

                                <div class="col-lg-4">
                                    <div class="row mb-5"></div>
                                    <div>
                                        <?= Html::submitButton('发送验证码 <i
                                            class="icofont-rounded-double-right mr-0"></i></button>', ['class' => 'btn btn-theme', 'name' => 'send']) ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-5">
                                <?= $form->field($model, 'rememberMe')->checkbox([
                                    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                ]) ?>
                            </div>
                            <div class="col-lg-5">
                                <a href="<?= Url::to(['site/abou']) ?>">验证码登陆/</a>
                                <a href="<?= Url::to(['site/abou']) ?>">没有账号？注册一个</a>
                            </div>





                            <div class="form-group">
                                <div>
                                    <?= Html::submitButton('登陆 <i
                                            class="icofont-rounded-double-right mr-0"></i></button>', ['class' => 'btn btn-theme', 'name' => 'login']) ?>
                                </div>


                            </div>

                            <?php ActiveForm::end(); ?>

                            <div style="color:#999;">
                                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                                To modify the username/password, please check out the code
                                <code>app\models\User::$users</code>.
                            </div>

                        </div>
                        <!-- Message Notification -->
                        <div class="form-message"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-info">
                            <div class="row">
                                <div class="col-md-4 col-lg-12">
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <img src="static/picture/telephone.webp" alt="Icon" width="43" height="43">
                                        </div>
                                        <div class="content">
                                            <h4>Phone</h4>
                                            <a href="tel://+0058467846">(00) 58 467 846</a>
                                            <a href="tel://+88678413975">(88) 678 413 975</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-12">
                                    <div class="contact-info-item">
                                        <div class="icon">
                                            <img src="static/picture/envelope.webp" alt="Icon" width="45" height="33">
                                        </div>
                                        <div class="content">
                                            <h4>E-mail</h4>
                                            <a href="mailto://example@gmail.com">example@gmail.com</a>
                                            <a href="mailto://example@gmail.com">example@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-12">
                                    <div class="contact-info-item mb-0">
                                        <div class="icon">
                                            <img src="static/picture/placeholder.webp" alt="Icon" width="30"
                                                height="40">
                                        </div>
                                        <div class="content">
                                            <h4>Location</h4>
                                            <p>20 Henry Dr <br class="d-none d-lg-block">Northfield, New Jersey <br
                                                    class="d-none d-lg-block">(NJ), 08225</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Contact Area ==-->

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area divider-default-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8 col-md-7">
                    <div class="content">
                        <h2 class="title">Stay connect with for<br> daily logistic service update.</h2>
                    </div>
                </div>
                <div class="col-sm-4 col-md-5">
                    <div class="divider-btn">
                        <a class="btn-theme btn-white" href="index.html">Subscribe Now <i
                                class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-group">
            <div class="shape-style4">
                <img src="static/picture/42.webp" alt="Image" width="560" height="250">
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->
</main>
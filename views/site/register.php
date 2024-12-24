<?php
/**
 * @file Register.php
 * @brief 注册页面的视图文件，用于用户注册功能的展示和处理。
 * 
 * 本文件是基于Yii框架的一个视图文件，主要用于用户注册功能的实现。它包含了一个注册表单，允许用户输入用户名、密码、确认密码、邮箱地址以及验证码。在用户完成输入后，表单将通过POST请求提交到服务器进行处理。 
 * 
 * 页面主要分为几个部分：
 * 1. **页面标题区域**：通过一张背景图片展示注册页面的标题，提供清晰的导航路径，帮助用户快速定位。
 * 2. **注册区域**：包括一个注册表单，使用`yii\bootstrap5\ActiveForm`组件构建表单，确保表单字段的布局和样式符合Bootstrap 5规范。表单包括用户名、密码、确认密码、邮箱和验证码字段，并为每个字段提供了相应的错误提示。
 * 3. **联系信息区域**：展示了公司的联系方式，包括电话、电子邮件和地址，方便用户在遇到问题时进行联系。
 * 4. **分隔区域**：用于展示公司的服务更新信息，并提供一个订阅按钮，鼓励用户保持联系，获取最新的物流服务动态。
 * 
 * 该视图文件通过Yii框架的功能实现了视图与模型的分离，使得代码结构清晰，易于维护。用户在填写和提交注册信息时，将通过`$model`对象与后端的逻辑进行交互。此外，界面友好的设计和响应式布局确保了在不同设备上的良好用户体验。
 * 
 * 使用此文件时，开发者需确保已正确配置相关的模型类（如`RegisterForm`），并在控制器中处理注册逻辑，确保数据的有效性和安全性。
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\RegisterForm $model */
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
                        <h2 class="title">注册</h2>
                        <div class="bread-crumbs"><a href="index.html"> 主页</a><span class="breadcrumb-sep"> //
                            </span><span class="active">注册</span></div>
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
                            <h2 class="title">注册</h2>
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

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>


                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
                            <?= $form->field($model, 'email')->textInput() ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <?= $form->field($model, 'VerificationCode')->textInput() ?>
                                </div>

                                <div class="col-lg-4">
                                    <div class="row mb-5"></div>
                                    <div>
                                        <?= Html::submitButton('发送验证码 <i
                                            class="icofont-rounded-double-right mr-0"></i></button>', ['class' => 'btn btn-theme', 'name' => 'send']) ?>
                                    </div>
                                </div>

                            </div>








                            <div class="form-group">
                                <div>
                                    <?= Html::submitButton('注册 <i
                                            class="icofont-rounded-double-right mr-0"></i></button>', ['class' => 'btn btn-theme', 'name' => 'register']) ?>
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
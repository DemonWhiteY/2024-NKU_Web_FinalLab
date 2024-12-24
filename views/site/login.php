<?php
/**
 * 该PHP文件用于实现用户登录页面的前端展示，基于Yii框架开发，结合Bootstrap 5样式库进行页面布局和样式设计。
 * 
 * 页面主要结构由多个部分组成，包括：
 * 1. **页面标题区域**：展示页面的标题和面包屑导航，用户可以清楚地看到当前所在位置，并且能够方便地返回主页。
 * 2. **登录表单区域**：该部分包含用户登录所需的输入字段，包括用户名、密码和记住我选项。使用Yii的ActiveForm组件来生成表单，并对表单字段进行配置，确保表单的美观性和可用性。
 * 3. **联系方式**：在表单旁边提供公司的联系电话、电子邮件和地址等信息，以便用户在登录遇到问题时能快速获取帮助。
 * 4. **信息提示**：提供了系统默认的用户名和密码，用户可以使用这些信息进行测试登录，并指导用户如何修改这些信息。
 * 5. **连结和注册**：在登录表单的下方，提供了验证码登录和注册新用户的链接，方便用户进行相关操作。
 * 6. **底部分隔区域**：展示一些与服务相关的内容和订阅按钮，促进用户与平台的互动。
 * 
 * 整个页面设计旨在提供良好的用户体验，确保用户能够顺利登录，同时获取必要的帮助和信息。通过使用现代的前端技术，页面在视觉上也非常吸引人，适应各种设备和屏幕尺寸。
 * 
 * 注意：在实际部署中，需要确保后端逻辑与前端表单提交相连接，以处理用户的登录请求并返回相应的反馈信息。
 */

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

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
                        <h2 class="title">登陆</h2>
                        <div class="bread-crumbs"><a href="index.html"> 主页 </a><span class="breadcrumb-sep"> //
                            </span><span class="active">登陆</span></div>
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

                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <div class="col-lg-5">
                                <?= $form->field($model, 'rememberMe')->checkbox([
                                    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                ]) ?>
                            </div>
                            <div class="col-lg-5">
                                <a href="<?= Url::to(['site/find']) ?>">验证码登陆/</a>
                                <a href="<?= Url::to(['site/register']) ?>">没有账号？注册一个</a>
                            </div>
                            <div class="form-group">
                                <div>
                                    <?= Html::submitButton('登陆 <i
                                            class="icofont-rounded-double-right mr-0"></i></button>', ['class' => 'btn btn-theme', 'name' => 'login-button']) ?>
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
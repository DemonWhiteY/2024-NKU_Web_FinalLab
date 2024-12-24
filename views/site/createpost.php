<?php
/**
 * 该文件是一个 Yii2 框架的视图文件，用于创建和发布新文章的页面。页面主要包含一个表单，用户可以在此表单中填写文章的标题和内容，并提交以发布文章。整个页面的布局采用 Bootstrap 5 框架进行样式设计，确保其响应式特性和良好的用户体验。
 *
 * 页面顶部是一个标题区域，显示当前页面的标题“发布文章”和面包屑导航，方便用户了解当前所处的位置，并能够快速返回主页。接下来是一个创建新文章的部分，其中包含一个表单，用户需要输入作者 ID（自动隐藏输入）、文章标题和文章内容。在用户提交表单时，系统将处理这些输入并完成文章的创建。
 *
 * 表单部分使用了 Yii2 提供的 ActiveForm 小部件，使得表单的构建和验证变得更加简单和高效。用户输入的每个字段都有相应的提示信息，确保用户能清晰地理解需要填写的内容。表单底部有一个提交按钮，用户点击后便可将填写的内容提交到服务器。
 *
 * 页面底部是一个分隔区域，提供了一些额外的信息和行动号召，鼓励用户订阅以获取物流服务的最新信息。这一部分旨在提升用户与平台的互动性，增加用户粘性。
 *
 * 该视图文件的设计旨在提供简洁、友好的用户界面，同时利用 Yii2 的功能来管理和处理用户提交的数据，确保文章发布过程的顺利进行。通过良好的视觉布局和用户体验设计，用户可以轻松地发布他们的文章，分享他们的故事。
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
                        <h2 class="title">发布文章</h2>
                        <div class="bread-crumbs">
                            <a href="index.html">主页</a>
                            <span class="breadcrumb-sep"> // </span>
                            <span class="active">发布文章</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->
</main>



    <section class="about-area">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-8">
        <div class="section-title text-center mt-5 pt-4">
    <h2 class="title">创建新文章</h2>
    <p>在这里书写你的故事</p>
</div>
            
            <div class="post-form">
                <?php $form = ActiveForm::begin(['options' => ['class' => 'post-form-wrapper']]); ?>
                    <?= $form->field($model, 'author_id')->hiddenInput([
                        'value' => Yii::$app->user->isGuest ? null : Yii::$app->user->id
                    ])->label(false) ?>
                    <div class="form-group">
                        <?= $form->field($model, 'name')->textInput([
                            'class' => 'form-control',
                            'placeholder' => '请输入文章标题'
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <?= $form->field($model, 'content')->textarea([
                            'class' => 'form-control',
                            'rows' => 10,
                            'placeholder' => '请输入文章内容'
                        ]) ?>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-theme">
                            发布文章 <i class="icofont-rounded-double-right"></i>
                        </button>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        </div>
    </div>
    </section>

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
<?php

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
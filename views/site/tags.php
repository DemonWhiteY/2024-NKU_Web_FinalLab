<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $tags app\models\Tag[] */
?>
<style>
    .site-tags {
        text-align: center;
        /* 使标题居中 */
    }

    .tag-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        /* 标签之间的间距 */
        margin-top: 20px;
    }

    .tag-button {
        margin: 5px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 16px;
    }
</style>
<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="static/picture/new/4.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">标签</h2>
                        <div class="bread-crumbs"><a href="index.html"> 主页 </a><span class="breadcrumb-sep"> //
                            </span><span class="active">标签</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>


    <div class="site-tags">


        <?php if (!empty($tags)): ?>
            <div class="tag-buttons">
                <?php foreach ($tags as $tag): ?>
                    <!-- 创建可点击按钮 -->
                    <div class="tag-button">

                        <?= Html::a(Html::encode($tag->name), ['site/viewtag', 'id' => $tag->id], ['class' => 'btn btn-primary']) ?>


                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>没有标签可显示。</p>
        <?php endif; ?>
    </div>


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
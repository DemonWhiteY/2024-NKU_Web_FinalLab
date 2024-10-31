<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception$exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <main class="main-content">
        <!--== Start Page Title Area ==-->
        <section class="page-title-area bg-img" data-bg-img="assets/img/photos/bg2.webp">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 m-auto">
                        <div class="page-title-content text-center">
                            <h2 class="title">404</h2>
                            <div class="bread-crumbs"><a href="index.html"> Home </a><span class="breadcrumb-sep"> //
                                </span><span class="active"> Page</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay3"></div>
        </section>
        <!--== End Page Title Area ==-->

        <!--== Start Cart Area Wrapper ==-->
        <section class="page-not-found-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-1 order-md-0">
                        <div class="error-thumb">
                            <img src="static/picture/error.webp" alt="Image" width="710" height="473">
                        </div>
                    </div>
                    <div class="col-md-6 order-0 order-md-1">
                        <div class="error-content">
                            <img src="static/picture/404.webp" alt="Image" width="380" height="149">
                            <h4>Sorry, This page is not found.</h4>
                            <p>That necessitates a robust ecommerce platform that optimizes your store & products</p>
                            <a class="btn-theme" href="index.html"><i class="icofont-rounded-double-left"></i>Back To
                                Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Cart Area Wrapper ==-->

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

</div>
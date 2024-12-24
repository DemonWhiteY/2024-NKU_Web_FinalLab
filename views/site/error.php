<?php
/**
 * 此文件是一个 PHP 视图文件，负责展示一个 404 错误页面的内容。
 * 在 web 应用程序中，404 错误页面用于告知用户请求的页面未找到，通常是由于用户输入的 URL 不正确或页面已被删除。
 * 该页面使用 Yii2 框架进行开发，主要结构包括：
 * 
 * 1. 页面标题区域：展示了 404 错误的标题和面包屑导航，方便用户了解当前页面的位置，并提供返回主页的链接。
 * 2. 错误内容区域：该部分向用户表明“抱歉，未找到该页面”，并附带一张相关的图片，增强用户体验，并减轻用户因页面未找到而产生的沮丧情绪。同时，提供一个回到主页的按钮，帮助用户迅速返回网站的首页。
 * 3. 订阅信息区域：鼓励用户与该网站保持联系，以获取日常物流服务更新，这体现了网站对用户的关怀和信息的重视，同时也提供了一个潜在的用户互动机会。
 * 4. 该视图中使用到的一些 CSS 类和图像文件是为了增强页面的视觉效果和用户体验。
 * 
 * 在实际使用中，当用户访问不存在的页面时，应用会调用此视图进行渲染，帮助用户理解发生了什么并引导他们进行下一步操作。
 * 此页面的设计注重用户体验，确保即使在出错的情况下，用户也能轻松找到返回的路径并继续浏览网站。
 * 
 * 该视图文件的变量包括：
 * - `@var yii\web\View $this`：当前视图对象。
 * - `@var string $name`：动态生成的错误名称（通常为“404”）。
 * - `@var string $message`：错误信息，虽然在该页面未直接使用。
 * - `@var Exception $exception`：包含错误细节的异常对象，用于调试。
 */
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
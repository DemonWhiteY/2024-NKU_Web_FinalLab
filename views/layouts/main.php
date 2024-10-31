<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">



<head>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <!--== Start Header Wrapper ==-->
    <header class="header-wrapper">
        <div class="header-area header-default header-transparent sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-4 col-sm-6 col-lg-2">
                        <div class="header-logo-area">
                            <a href="">
                                <img class="logo-main" src="static/picture/logo.webp" alt="Logo" width="161"
                                    height="48">
                                <img class="logo-light" src="static/picture/logo-light.webp" alt="Logo" width="161"
                                    height="48">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="header-navigation-area">
                            <ul class="main-menu nav position-relative">
                                <li><a href="<?= Url::to(['site/index']) ?>">主页</a></li>
                                <li class="has-submenu"><a href="services.html">产品</a>
                                    <ul class="submenu-nav">
                                        <li><a href="services.html">产品</a></li>
                                        <li><a href="service-details.html">Service Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu"><a href="projects.html">案例</a>
                                    <ul class="submenu-nav">
                                        <li><a href="projects.html">Portfolio</a></li>
                                        <li><a href="project-details.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu"><a href="">订购</a>
                                    <ul class="submenu-nav">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="coming-soon.html">Coming soon</a></li>
                                        <li><a href="page-not-found.html">404</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu"><a href="blog.html">Blog</a>
                                    <ul class="submenu-nav">
                                        <li><a href="blog.html">Blog 3 Column</a></li>
                                        <li><a href="blog-4-column.html">Blog 4 Column</a></li>
                                        <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                        <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="blog.html">Blog No Sidebar</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">联系我们</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-lg-3">
                        <div class="header-action-area">
                            <div class="header-lang-dropdown">
                                <button type="button" class="btn-lang dropdown-toggle" id="dropdownLang"
                                    data-bs-toggle="dropdown" aria-expanded="false">EN</button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownLang">
                                    <li class="dropdown-item active">EN</li>
                                    <li class="dropdown-item">BN</li>
                                    <li class="dropdown-item">FR</li>
                                </ul>
                            </div>
                            <div class="header-action-btn">
                                <a class="btn-theme" href="<?= Url::to(['site/login']) ?>"><span>登陆</span></a>
                            </div>
                            <button class="btn-menu d-lg-none" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                                <span class="icon-line"></span>
                                <span class="icon-line"></span>
                                <span class="icon-line"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--== End Header Wrapper ==-->

    <main id="main" class="flex-shrink-0" role="main">
        <div>
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer-area default-style">
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="widget-item">
                            <h4 class="widget-title">Latest Post</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-1">Latest Post</h4>
                            <div id="dividerId-1" class="collapse widget-collapse-body">
                                <div class="widget-blog-wrap">
                                    <div class="blog-post-item">
                                        <div class="content">
                                            <h4 class="title"><i class="icon icofont-minus"></i> <a
                                                    href="blog-details.html">With WooLentor's drag and drop
                                                    interface</a></h4>
                                            <div class="meta-date"><a href="blog.html"><i class="icofont-calendar"></i>
                                                    28/05/2022</a></div>
                                        </div>
                                    </div>
                                    <div class="blog-post-item">
                                        <div class="content">
                                            <h4 class="title"><i class="icon icofont-minus"></i> <a
                                                    href="blog-details.html">Lorem has been industry standard ever
                                                    since.</a></h4>
                                            <div class="meta-date"><a href="blog.html"><i class="icofont-calendar"></i>
                                                    31/05/2022</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 offset-lg-0 col-xl-3 offset-xl-1">
                        <div class="widget-item">
                            <h4 class="widget-title">All Services</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-2">All Services</h4>
                            <div id="dividerId-2" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>Commercial
                                                Movers</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>Air Freight
                                                Services</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>Drone
                                                Services</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>Road Freight
                                                Services</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>Warehousing
                                                Services</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="widget-item ml-40 ml-lg-20 md-ml-0">
                            <h4 class="widget-title">Important</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-3">Important</h4>
                            <div id="dividerId-3" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href="about.html"><i class="icofont-minus"></i>About Maskat</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Price & Planning</a></li>
                                        <li><a href="contact.html"><i class="icofont-minus"></i>Client Support</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Privacy & Policy</a></li>
                                        <li><a href="contact.html"><i class="icofont-minus"></i>Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xl-2">
                        <div class="widget-item ml-35 lg-ml-0">
                            <h4 class="widget-title">Follow Us</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-4">Follow Us</h4>
                            <div id="dividerId-4" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href=""><i class="icofont-minus"></i>Facebook</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Twitter</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Instragram</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Youtube</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>Medium</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-shape bg-img" data-bg-img="assets/img/photos/footer1.webp"></div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="widget-copyright">
                                <p>Copyright &copy; 2022.Company name All rights reserved.<a target="_blank"
                                        href="https://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--== End Footer Area Wrapper ==-->

    <?php $this->endBody() ?>
    <!--=== Modernizr Min Js ===-->
    <script src="js/modernizr.js"></script>
    <!--=== jQuery Min Js ===-->
    <script src="js/jquery-main.js"></script>
    <!--=== jQuery Migration Min Js ===-->
    <script src="js/jquery-migrate.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="js/popper.min.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="js/bootstrap.min.js"></script>
    <!--=== jquery Swiper Min Js ===-->
    <script src="js/swiper.min.js"></script>
    <!--=== jquery Countdown Js ===-->
    <script src="js/jquery.countdown.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="js/isotope.pkgd.min.js"></script>

    <!--=== Custom Js ===-->
    <script src="js/custom.js"></script>
</body>

</html>
<?php $this->endPage() ?>
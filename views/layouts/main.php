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
                                <img class="logo-main" src="static/picture/nku.webp" alt="Logo" width="161" height="48">
                                <img class="logo-light" src="static/picture/nkulogo.webp" alt="Logo" width="280"
                                    height="48">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="header-navigation-area">
                            <ul class="main-menu nav position-relative">
                                <li><a href="<?= Url::to(['site/index']) ?>">主页</a></li>
                                <!-- <li class="has-submenu"><a href="services.html">产品</a>
                                    <ul class="submenu-nav">
                                        <li><a href="services.html">产品</a></li>
                                        <li><a href="service-details.html">Service Details</a></li>
                                    </ul>
                                </li> -->
                                <li class="has-submenu"><a
                                        href="<?= Url::to(['employees/employee', 'id' => 1]) ?>">成员</a>
                                    <ul class="submenu-nav">
                                        <li><a href="<?= Url::to(['employees/employee', 'id' => 0]) ?>">张明昆</a>
                                        </li>
                                        <li><a href="<?= Url::to(['employees/employee', 'id' => 1]) ?>">闫恒瑞</a>
                                        </li>
                                        <li><a href="<?= Url::to(['employees/employee', 'id' => 2]) ?>">胡进喆</a>
                                        </li>
                                        <li><a href="<?= Url::to(['employees/employee', 'id' => 3]) ?>">王博</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li class="has-submenu"><a href="">订购</a>
                                    <ul class="submenu-nav">
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="coming-soon.html">Coming soon</a></li>
                                        <li><a href="page-not-found.html">404</a></li>
                                    </ul>
                                </li> -->
                                <li class="has-submenu"><a href="<?= Url::to(['site/viewpost']) ?>">帖子</a>
                                    <ul class="submenu-nav">
                                        <li><a href="<?= Url::to(['site/createpost']) ?>">发帖子</a></li>
                                        <li><a href="<?= Url::to(['site/viewpost']) ?>">帖子广场</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu"><a href="<?= Url::to(['site/viewpost']) ?>">测试</a>
                                    <ul class="submenu-nav">
                                        <li><a href="<?= Url::to(['site/create']) ?>">test1</a></li>
                                        <li><a href="<?= Url::to(['site/view']) ?>">test2</a></li>
                                    </ul>
                                </li>
                                <?php if (!Yii::$app->user->isGuest): ?>

                                    <li class="has-submenu"><a href="services.html">
                                            欢迎！<?= Yii::$app->user->identity->username ?>
                                        </a>
                                        <ul class="submenu-nav">
                                            <li><a href="<?= \yii\helpers\Url::to(['site/logout']) ?>" data-method="post"
                                                    class="btn btn-danger">
                                                    登出
                                                </a></li>
                                            <li><a href="service-details.html">修改信息</a></li>
                                            <li><a href="service-details.html">反馈问题</a></li>
                                        </ul>
                                    </li>

                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                    <div class="col-8 col-sm-6 col-lg-3">
                        <div class="header-action-area">

                            <?php if (Yii::$app->user->isGuest): ?>
                                <!-- If the user is not logged in, show the login button -->
                                <div class="header-action-btn">
                                    <a class="btn-theme color_defult"
                                        href="<?= Url::to(['site/login']) ?>"><span>登陆</span></a>
                                </div>
                                <div class="header-action-btn">
                                    <a class="btn-theme color_light"
                                        href="<?= Url::to(['site/register']) ?>"><span>注册</span></a>
                                </div>
                            <?php endif; ?>
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
                            <h4 class="widget-title">最新博客</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-1">Latest Post</h4>
                            <div id="dividerId-1" class="collapse widget-collapse-body">
                                <div class="widget-blog-wrap">
                                    <div class="blog-post-item">
                                        <div class="content">
                                            <h4 class="title"><i class="icon icofont-minus"></i> <a
                                                    href="blog-details.html">豆腐脑甜的好吃还是咸的好吃</a></h4>
                                            <div class="meta-date"><a href="blog.html"><i class="icofont-calendar"></i>
                                                    28/05/2024</a></div>
                                        </div>
                                    </div>
                                    <div class="blog-post-item">
                                        <div class="content">
                                            <h4 class="title"><i class="icon icofont-minus"></i> <a
                                                    href="blog-details.html">图社区发现算法--Leiden算法</a></h4>
                                            <div class="meta-date"><a href="blog.html"><i class="icofont-calendar"></i>
                                                    31/05/2024</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 offset-lg-0 col-xl-3 offset-xl-1">
                        <div class="widget-item">
                            <h4 class="widget-title">团队组成</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-2">All Services</h4>
                            <div id="dividerId-2" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>组长：张明昆</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>成员：闫恒瑞</a></li>

                                        <li><a href="service-details.html"><i class="icofont-minus"></i>成员：胡进喆</a></li>
                                        <li><a href="service-details.html"><i class="icofont-minus"></i>成员：王博</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 col-xl-3">
                        <div class="widget-item ml-40 ml-lg-20 md-ml-0">
                            <h4 class="widget-title">帮助</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-3">Important</h4>
                            <div id="dividerId-3" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href="about.html"><i class="icofont-minus"></i>登录/注册问题</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>博客相关问题</a></li>
                                        <li><a href="contact.html"><i class="icofont-minus"></i>其他问题</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2 col-xl-2">
                        <div class="widget-item ml-35 lg-ml-0">
                            <h4 class="widget-title">联系我们</h4>
                            <h4 class="widget-title widget-collapsed-title collapsed" data-bs-toggle="collapse"
                                data-bs-target="#dividerId-4">Follow Us</h4>
                            <div id="dividerId-4" class="collapse widget-collapse-body">
                                <nav class="widget-menu-wrap">
                                    <ul class="nav-menu nav">
                                        <li><a href=""><i class="icofont-minus"></i>Email：2211585@mail.nankai.edu.cn</a>
                                        </li>
                                        <li><a href=""><i class="icofont-minus"></i>Wechat：zm131827307</a></li>
                                        <li><a href=""><i class="icofont-minus"></i>QQ：1597360653</a></li>
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
                                <p>Copyright &copy; 2024 OurTeam.</p>
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

    <!-- jQery -->
    <script src="static/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="static/js/bootstrap.bundle.min.js"></script>
    <!-- Owl Carousel -->
    <script src="static/js/owl.carousel.min.js"></script>
    <!-- Typed -->
    <script src="static/js/typed.min.js"></script>
    <!-- Ajax Contact Form -->
    <script src="static/js/ajax-form.js"></script>
    <!-- Color Switcher -->
    <script src="static/js/switcher.min.js"></script>
    <!-- Theme -->
    <script src="static/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>

</html>
<?php $this->endPage() ?>
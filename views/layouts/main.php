<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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

    <header id="header">
        <?php


        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar-expand-md navbar-light bg-light fixed-top']
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto'],
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Services', 'url' => ['/site/services']],
                ['label' => 'Portfolio', 'url' => ['/site/portfolio']],
                [
                    'label' => 'Pages',
                    'items' => [
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'Coming Soon', 'url' => ['/site/coming-soon']],
                        ['label' => '404', 'url' => ['/site/error']],
                    ],
                ],
                [
                    'label' => 'Blog',
                    'items' => [
                        ['label' => 'Blog 3 Column', 'url' => ['/blog/index']],
                        ['label' => 'Blog 4 Column', 'url' => ['/blog/4-column']],
                        // 添加其他博客链接...
                    ],
                ],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ]
        ]);

        echo '<div class="header-lang-dropdown">';
        echo '<button type="button" class="btn btn-link dropdown-toggle" id="dropdownLang" data-bs-toggle="dropdown" aria-expanded="false">EN</button>';
        echo '<ul class="dropdown-menu" aria-labelledby="dropdownLang">';
        echo '<li><a class="dropdown-item" href="#">EN</a></li>';
        echo '<li><a class="dropdown-item" href="#">BN</a></li>';
        echo '<li><a class="dropdown-item" href="#">FR</a></li>';
        echo '</ul></div>';

        echo '<div class="header-action-btn">';
        echo Html::a('Get A Quote', ['/site/contact'], ['class' => 'btn btn-primary']);
        echo '</div>';



        NavBar::end();
        ?>
    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div>
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
            </div>
        </div>
    </footer>

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
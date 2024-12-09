<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\BackAsset;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <!-- Add custom styles -->
<style>
    /* Sidebar Styles */
    .sidebar {
        background-color: #2c3e50;
        color: #ecf0f1;
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 20px;
        padding-left: 20px;
        padding-right: 20px;
        z-index: 1000;
    }

    .sidebar-header h4 {
        font-size: 24px;
        font-weight: bold;
        color: #ecf0f1;
        margin-bottom: 30px;
    }

    .sidebar .nav-item {
        margin-bottom: 20px;
    }

    .sidebar .nav-link {
        color: #bdc3c7;
        font-size: 16px;
        text-transform: capitalize;
        padding: 12px;
        display: flex;
        align-items: center;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .sidebar .nav-link:hover {
        background-color: #34495e;
        color: #ecf0f1;
    }

    .sidebar .nav-link.active {
        background-color: #1abc9c;
        color: #fff;
        font-weight: bold;
    }

    .sidebar .nav-link i {
        margin-right: 15px;
        font-size: 18px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
            padding-left: 10px;
            padding-right: 10px;
        }

        .sidebar-header h4 {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            font-size: 14px;
        }

        .sidebar .nav-item {
            margin-bottom: 15px;
        }
    }
</style>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
        animation: gradient-bg 10s ease infinite;
    }

    @keyframes gradient-bg {
        0% {
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
        }
        25% {
            background: linear-gradient(135deg, #D4FC79, #C5E1FF); /* 过渡色 */
        }
        50% {
            background: linear-gradient(135deg, #85FFBD, #FFFB7D); /* 过渡色 */
        }
        75% {
            background: linear-gradient(135deg, #FFACD9, #D4E4FF); /* 过渡色 */
        }
        100% {
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
        }
    }

    .bg-light {
        background: rgba(173, 216, 230, 0.6) !important; /* Light blue with transparency */
    }

    .container-fluid {
        padding: 0;
        height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .navbar-light {
        background-color: rgba(255, 255, 255, 0.9) !important;
    }

    .nav-link {
        color: #333 !important;
        font-weight: 500;
    }

    .nav-link:hover {
        color: #0056b3 !important;
    }

    .breadcrumb {
        background-color: rgba(255, 255, 255, 0.8) !important;
        border-radius: 4px;
        padding: 8px 16px;
    }

    .alert {
        border-radius: 4px;
    }

    .container {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Sidebar Styles */
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        background: rgba(173, 216, 230, 0.8); /* Light blue */
        padding: 20px;
        color: #333;
    }

    .sidebar h4 {
        margin-top: 0;
    }

    .sidebar .nav-link {
        color: #333 !important;
    }

    .sidebar .nav-link.active {
        font-weight: bold;
        color: #0056b3;
    }

    .main-content {
        margin-left: 270px;
        padding: 20px;
        flex-grow: 1;
        background-color: rgba(255, 255, 255, 0.9);
    }
</style>

</head>

<body>
    <?php $this->beginBody() ?>

            <!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-header">
        <h4>后台管理</h4>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="<?= \yii\helpers\Url::to(['backend/index']) ?>">
                <i class="fa fa-tachometer-alt"></i> 总体后台
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= \yii\helpers\Url::to(['backend/user-management']) ?>">
                <i class="fa fa-users"></i> 用户管理
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-cogs"></i> 设置
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= \yii\helpers\Url::to(['backend/homework']) ?>">
                <i class="fa fa-book"></i> 作业详情
            </a>
        </li>
    </ul>
</div>





            <!-- Main content area -->
            <div class="main-content">
                <?php
                NavBar::begin([
                    'brandLabel' => 'Team Dashboard',
                    'brandUrl' => Yii::$app->homeUrl,
                    'options' => [
                        'class' => 'navbar navbar-expand-lg navbar-light bg-light fixed-top',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav'],
                    'items' => [
                        ['label' => '首页', 'url' => ['/site/index']],
                        ['label' => '关于', 'url' => ['/site/about']],
                    ],
                ]);
                NavBar::end();
                ?>

                <div class="container mt-4 pt-5 ms-0">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="js/backend/jquery.min.js"></script>
    <script src="js/backend/bootstrap.bundle.min.js"></script>
    <script src="js/backend/metisMenu.min.js"></script>
    <script src="js/backend/simplebar.min.js"></script>
    <script src="js/backend/waves.min.js"></script>

    <!-- apexcharts -->
    <script src="js/backend/apexcharts.min.js"></script>

    <!-- jquery.vectormap map -->
    <script src="js/backend/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/backend/jquery-jvectormap-us-merc-en.js"></script>

    <!-- Required datatable js -->
    <script src="js/backend/jquery.dataTables.min.js"></script>
    <script src="js/backend/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="js/backend/dataTables.responsive.min.js"></script>
    <script src="js/backend/responsive.bootstrap4.min.js"></script>

    <script src="js/backend/dashboard.init.js"></script>

    <!-- App js -->
    <script src="js/backend/app.js"></script>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

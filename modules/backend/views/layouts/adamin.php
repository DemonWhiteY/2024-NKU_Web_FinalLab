<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\BackAsset;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;


//BackAsset::register($this);
/* @var $this yii\web\View */
/* @var $content string */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="container-fluid">
        <div class="row">
            <!-- 侧边栏 -->
            <div class="col-md-2 col-lg-2 p-3 bg-light">
                <h4>后台管理</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">用户管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">设置</a>
                    </li>
                </ul>
            </div>

            <!-- 主内容区 -->
            <div class="col-md-10 col-lg-10 p-4">
                <?php
                NavBar::begin([
                    'brandLabel' => 'My Company',
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
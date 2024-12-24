<?php
 

 /**
 * Team: 喵喵大魔王队
 * Coding by 胡进喆 2213045
 * Date: 2024-12-10
 * This is the main layout of Backend web.
 */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
$this->title = 'Homework';
?>
<?= Html::cssFile('@web/css/font-awesome.min.css') ?>
<?= Html::cssFile('@web/css/magnific-popup.css') ?>
<?= Html::cssFile('@web/css/nice-select.css') ?>
<?= Html::cssFile('@web/css/animate.min.css') ?>
<?= Html::cssFile('@web/css/owl.carousel.css') ?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Personal</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="../../../backend/web/css/main.css">
    <style>
        /* Add some custom styles for overall page aesthetics */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .section-gap {
            padding: 70px 0;
        }

        .title {
            margin-bottom: 40px;
        }

        .menu-content h1 {
            font-size: 36px;
            font-weight: 600;
            color: #333;
        }

        .menu-content p {
            font-size: 18px;
            color: #777;
        }

        .single-services {
            border: 1px solid #e4e4e4;
            border-radius: 8px;
            padding: 30px;
            background-color: #fff;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .single-services:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .single-services h4 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-top: 15px;
        }

        .single-services p {
            font-size: 14px;
            color: #666;
            margin: 10px 0;
        }

        .price-area .single-price {
            background: #fff;
            border: 1px solid #e4e4e4;
            border-radius: 8px;
            text-align: center;
            padding: 30px;
            transition: transform 0.3s ease-in-out;
        }

        .price-area .single-price:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .price-btn {
            background-color: #FFDEE9;
            color: #fff;
            font-weight: 600;
            text-transform: uppercase;
            padding: 12px 30px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .price-btn:hover {
            background-color: #777;
        }

        .counter {
            font-size: 48px;
            font-weight: 700;
            color: #333;
        }

        .facts-area .single-fact {
            text-align: center;
            margin-bottom: 30px;
        }

        .facts-area .single-fact p {
            font-size: 16px;
            color: #777;
        }

        .facts-area .single-fact h1 {
            font-size: 36px;
            color: #4CAF50;
        }

        .price-area .package-list ul {
            list-style: none;
            padding: 0;
            margin: 10px 0;
        }

        .price-area .package-list ul li {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .single-services, .single-price {
                margin-bottom: 30px;
            }

            .menu-content h1 {
                font-size: 30px;
            }

            .title h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <section class="services-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content col-lg-7">
                    <div class="title text-center">
                        <h1>团队作业模块</h1>
                        <p>The team homework download for team 喵喵大魔王队</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Individual files section -->
                <div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-home"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队.zip']) ?>">
            <h4>下载全部团队作业文件</h4>
        </a>
        <p>Include All Teamwork Files</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-home"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_需求文档(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>需求文档</h4>
        </a>
        <p>Made by 胡进喆</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-file-empty"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_设计文档(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>设计文档</h4>
        </a>
        <p>Made by 胡进喆</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-picture"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_实现文档(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>实现文档</h4>
        </a>
        <p>Made by 胡进喆、张明昆、闫恒瑞、王博</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-tablet"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_用户手册(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>用户手册</h4>
        </a>
        <p>Made by 张明昆</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-enter"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_部署文档(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>部署文档</h4>
        </a>
        <p>Made by 闫恒瑞</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-pie-chart"></span>
        <a href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'team','fileName' => '喵喵大魔王队_项目展示PPT(2213045_2211585_2212043_2211642).pdf']) ?>">
            <h4>项目展示PPT</h4>
        </a>
        <p>Made by 张明昆</p>
    </div>
</div>

<div class="col-lg-4 col-md-6">
    <div class="single-services">
        <span class="lnr lnr-rocket"></span>
        <a href="#"><h4>More...</h4></a>
        <p>Complementing...</p>
    </div>
</div>

    </section>

    <!-- Team Facts Section -->
    <section class="facts-area section-gap" id="facts-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">435231</h1>
                    <p>Lines of Code</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">16</h1>
                    <p>Commits</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">6</h1>
                    <p>Meetings</p>
                </div>
                <div class="col-lg-3 col-md-6 single-fact">
                    <h1 class="counter">4</h1>
                    <p>Splendid Team Workers</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Personal Homework Section -->
    <section class="price-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1>个人作业模块</h1>
                        <p>Personal homework download</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Homework File -->
                

                <div class="col-lg-3 col-md-6 single-price">
    <div class="top-part">
        <h1 class="package-no">2211585</h1>
        <p class="mt-10">个人作业</p>
    </div>
    <div class="package-list">
        <ul>
            <li>张明昆</li>
        </ul>
    </div>
    <div class="bottom-part">
        <a class="price-btn" 
           href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'personal', 'fileName' => '2211585张明昆个人作业.zip']) ?>" 
           download="2211585张明昆个人作业.zip">点击此处下载个人文件</a>
    </div>
</div>

<div class="col-lg-3 col-md-6 single-price">
    <div class="top-part">
        <h1 class="package-no">2213043</h1>
        <p class="mt-10">个人作业</p>
    </div>
    <div class="package-list">
        <ul>
            <li>闫恒瑞</li>
        </ul>
    </div>
    <div class="bottom-part">
        <a class="price-btn" 
           href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'personal', 'fileName' => '2213043闫恒瑞个人作业.zip']) ?>" 
           download="2213043闫恒瑞个人作业.zip">点击此处下载个人文件</a>
    </div>
</div>

<div class="col-lg-3 col-md-6 single-price">
    <div class="top-part">
        <h1 class="package-no">2211642</h1>
        <p class="mt-10">个人作业</p>
    </div>
    <div class="package-list">
        <ul>
            <li>王博</li>
        </ul>
    </div>
    <div class="bottom-part">
        <a class="price-btn" 
           href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'personal', 'fileName' => '2211642王博个人作业.zip']) ?>" 
           download="2211642王博个人作业.zip">点击此处下载个人文件</a>
    </div>
</div>

<div class="col-lg-3 col-md-6 single-price">
    <div class="top-part">
        <h1 class="package-no">2213045</h1>
        <p class="mt-10">个人作业</p>
    </div>
    <div class="package-list">
        <ul>
            <li>胡进喆</li>
        </ul>
    </div>
    <div class="bottom-part">
        <a class="price-btn" 
           href="<?= \yii\helpers\Url::to(['backend/download-file', 'type' => 'personal', 'fileName' => '2213045胡进喆个人作业.zip']) ?>" 
           download="2213045胡进喆个人作业.zip">点击此处下载个人文件</a>
    </div>
</div>


              
    </section>
</body>
</html>

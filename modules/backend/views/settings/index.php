<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '设置页面';
?>
<div class="container mt-5 pt-5 ms-0">

    <!-- 第一板块 - 感谢你的参访 -->
    <div class="thank-you-section">
        <div class="content-box text-center">
            <h1 class="title">感谢你的参访！</h1>
            <p class="description">感谢你访问我们的页面！我们很高兴你能来到这里。</p>
        </div>
    </div>

    <!-- 第二板块 - 如有问题请联系我们 -->
    <div class="contact-section">
        <div class="content-box text-center">
            <h2 class="title">如有问题请联系我们</h2>
            <p class="description">如果你在使用过程中遇到任何问题，欢迎随时联系我们，我们会尽快为您解决。个人邮箱：1347836313@qq.com</p>
            <a href="mailto:support@example.com" class="btn-contact">联系邮箱</a>
        </div>
    </div>

    <!-- 第三板块 - 喵喵大魔王队坠强 -->
    <div class="cat-section">
        <div class="content-box text-center">
            <h2 class="title">喵喵大魔王队 </h2>
            <p class="description">猫咪们一直在努力为您服务！感谢您对喵喵大魔王的支持！</p>
            
            <div class="cat-animation-container">
                <div class="cat-animation">
                    <img src="https://media.giphy.com/media/MDJ9IbxxvDUQM/giphy.gif" alt="Cute Cat 1" class="cat-img" />
                </div>
                <div class="cat-animation">
                    <img src="https://media.giphy.com/media/7NoNw4pMNTvgc/giphy.gif?cid=ecf05e47y1g5wnyep4s9qgsleao2kmz7fbigifvgurb5ota6&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Cute Cat 2" class="cat-img" />
                </div>
                <div class="cat-animation">
                    <img src="https://media.giphy.com/media/GeimqsH0TLDt4tScGw/giphy.gif?cid=790b7611nitpft3bes942mm52eydtq6ptsjuui2r1q9ohceg&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="Cute Cat 3" class="cat-img" />
                </div>
                <div class="cat-animation">
                    <img src="https://media.giphy.com/media/7YCA4XbA0ArQuWEfqJ/giphy.gif?cid=ecf05e47gd4nyuusbf2ajmgp9ianawl555ighxz6qjd6rbxx&ep=v1_gifs_search&rid=giphy.gif&ct=g" alt="Cute Cat 4" class="cat-img" />
                </div>
            </div>
        </div>
    </div>

    <!-- CSS样式 -->
    <style>
        body {
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC); /* 温暖的渐变背景 */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            padding: 20px;
            width: 100%;
        }

        /* 内容框样式 */
        .content-box {
            background: rgba(255, 255, 255, 0.8); /* 半透明背景 */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            animation: fadeInUp 1s ease-out;
        }

        /* 标题样式 */
        .title {
            font-size: 36px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
            animation: textColorChange 5s infinite;
        }

        /* 描述文字样式 */
        .description {
            font-size: 18px;
            color: #34495e;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        /* 联系按钮样式 */
        .btn-contact {
            background-color: #1abc9c;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn-contact:hover {
            background-color: #16a085;
        }

        /* 动画效果 */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes textColorChange {
            0% {
                color: #1abc9c;
            }
            50% {
                color: #3498db;
            }
            100% {
                color: #e74c3c;
            }
        }

        /* 小猫动画 */
        .cat-animation-container {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            animation: float 4s ease-in-out infinite;
            transform-origin: center center;
        }

        /* 每个猫咪动画的样式 */
        .cat-animation {
            animation: float 4s ease-in-out infinite;
            margin: 0 10px;
        }

        /* 小猫浮动效果 */
        @keyframes float {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
        }

        .cat-img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* 各板块间距及美观调整 */
        .thank-you-section, .contact-section, .cat-section {
            margin-bottom: 50px;
        }

        .thank-you-section {
            animation: fadeInUp 1.5s ease-out;
        }

        .contact-section {
            animation: fadeInUp 2s ease-out;
        }

        .cat-section {
            animation: fadeInUp 2.5s ease-out;
        }

        /* 响应式设计 */
        @media (max-width: 768px) {
            .content-box {
                padding: 20px;
            }

            .title {
                font-size: 28px;
            }

            .description {
                font-size: 16px;
            }

            .cat-img {
                width: 120px;
            }

            .cat-animation-container {
                flex-direction: column;
                align-items: center;
            }

            .cat-animation {
                margin: 10px 0;
            }
        }
    </style>
</div>

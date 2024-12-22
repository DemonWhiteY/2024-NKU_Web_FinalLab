<style>
    .PicComment {
        background-color: #f0f0f0;
        /* 浅灰色背景 */
        padding: 20px;
        /* 给内容添加一些内边距，使其与背景有一定距离 */
        border-radius: 8px;
        /* 可选：添加圆角效果 */
    }

    .centered-text {
        display: flex;
        justify-content: center;
        /* 水平居中 */
        align-items: center;
        /* 垂直居中 */
        height: 80%;
        /* 使容器高度占满父容器 */
        font-size: 90px;
        /* 设置字体大小，可根据需要调整 */
        color: #00006F;
        /* 设置字体颜色，这里设置为白色 */
        /* 如果背景图是深色，确保字体颜色与背景形成对比 */
    }
</style>


<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>

<div height="300px"></div>


<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area slider-default">
        <div class="home-slider-content">
            <div class="swiper-container home-slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <!-- Start Slide Item -->
                        <div class="home-slider-item">
                            <div class="slider-content-area bg-img"
                                style="background-image: url('static/picture/new/main.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6">
                                            <div class="content">
                                                <div class="inner-content">
                                                    <div class="wrap-one">
                                                        <h2>AI交流分享社区</h2>
                                                    </div>
                                                    <div class="wrap-two">
                                                        <p>AI Shared Cummunity</p>
                                                    </div>
                                                    <!-- <div class="wrap-three">
                                                        <a href="contact.html" class="btn-theme">Booking Now</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="thumb">
                                                <div class="bg-thumb bg-img" data-bg-img="static/picture/robot.png">


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-logo bg-img" data-bg-img="assets/img/shape/6.webp"></div>
                                </div>
                                <div class="bg-overlay"></div>
                            </div>
                        </div>
                        <!-- End Slide Item -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Tracking Area Wrapper ==-->
    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tracking-form-wrap">
                        <form class="tracking-searchbox">
                            <div class="track-dropdown">
                                <select class="form-control select-dropdown">
                                    <option selected="">Shipment Type</option>
                                    <option value="lan1">Shipment One</option>
                                    <option value="lan2">Shipment Two</option>
                                    <option value="lan3">Shipment Three</option>
                                </select>
                            </div>
                            <div class="track-dropdown style-two">
                                <select class="form-control select-dropdown">
                                    <option selected="">Product Type</option>
                                    <option value="lan1">Product One</option>
                                    <option value="lan2">Product Two</option>
                                    <option value="lan3">Product Three</option>
                                </select>
                            </div>
                            <input id="tracking-input" class="form-control" type="text" placeholder="关键词">

                            <button class="btn btn-theme" type="button" id="search-btn">
                                <?= Html::a(Html::encode("查询"), ['site/searchPost'], [

                                    'id' => 'dynamic-link'
                                ]) ?>
                                <i class="icon icofont-long-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Tracking Area Wrapper ==-->

    <!--== Start About Area Wrapper ==-->
    <section class="about-area about-default-area">
        <div class="container">
            <div class="row row-gutter-0">
                <div class="col-md-6 col-lg-4">
                    <div class="about-content">
                        <div class="section-title">
                            <h4 class="subtitle">ABOUT US</h4>
                            <h2 class="title">南开大学2024秋互联网数据库开发小组
                            </h2>
                            <p>张明昆：计算机学院2022级本科生--2211585 </p>
                            <p>闫恒瑞：计算机学院2022级本科生--2212043</p>
                            <p>胡进喆：计算机学院2022级本科生--2213045</p>
                            <p>王博：计算机学院2022级本科生--2211642</p>

                            <a href="Main/about.html" class="btn-theme">Team Members</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="about-thumb">
                        <img src="static/picture/new/7.png" alt="Image" width="350" height="300">
                    </div>
                    <div class="about-thumb">
                        <img src="static/picture/new/8.png" alt="Image" width="350" height="300">
                    </div>
                    <div class="about-thumb">
                        <img src="static/picture/new/9.png" alt="Image" width="350" height="30">
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="featured-wrp">
                        <div class="featured-item">
                            <h4 class="title"><a
                                    href="<?= Url::to(['post/detail', 'id' => 3]) ?>">人工智能时代：程序员的核心竞争力重塑</a></h4>
                            <p>人工智能的迅猛发展，正以前所未有的速度改变着各行各业。程序员，作为这一变革的直接参与者与见证者，面临着前所未有的机遇与挑战...</p>
                        </div>
                        <div class="featured-item">
                            <h4 class="title"><a href="<?= Url::to(['post/detail', 'id' => 4]) ?>">什么是大语言模型？</a></h4>
                            <p>在当今AI时代，大语言模型正以前所未有的速度重塑我们的世界。作为NLP领域的明星，它们不仅理解语言，更创造语言，开启了智能交互的新纪元...</p>
                        </div>
                        <div class="featured-item">
                            <h4 class="title"><a href="<?= Url::to(['post/detail', 'id' => 5]) ?>">人工智能：重塑未来的力量</a></h4>
                            <p>从医疗领域的病例诊断到企业的智能决策，再到日常生活中的智能产品，人工智能的影响无处不在...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End About Area Wrapper ==-->

    <!--== Start Service Area Wrapper ==-->
    <section class="service-area service-default-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="section-title text-center">
                        <h4 class="subtitle">SHARE CONTENT</h4>
                        <h2 class="title">人工智能领域热点</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-container service-slider-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a
                                            href="https://blog.csdn.net/DFCED/article/details/136107612?ops_request_misc=%257B%2522request%255Fid%2522%253A%2522efcc36b03f3ac45158a4d6b8a6899516%2522%252C%2522scm%2522%253A%252220140713.130102334..%2522%257D&request_id=efcc36b03f3ac45158a4d6b8a6899516&biz_id=0&utm_medium=distribute.pc_search_result.none-task-blog-2~all~top_positive~default-1-136107612-null-null.142^v100^pc_search_result_base8&utm_term=%E7%94%9F%E6%88%90%E5%BC%8F%E4%BA%BA%E5%B7%A5%E6%99%BA%E8%83%BD&spm=1018.2226.3001.4187"><img
                                                src="static/picture/new/openai.jpg" alt="Image" width="270"
                                                height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="https://blog.csdn.net/DFCED/article/details/136107612?ops_request_misc=%257B%2522request%255Fid%2522%253A%2522efcc36b03f3ac45158a4d6b8a6899516%2522%252C%2522scm%2522%253A%252220140713.130102334..%2522%257D&request_id=efcc36b03f3ac45158a4d6b8a6899516&biz_id=0&utm_medium=distribute.pc_search_result.none-task-blog-2~all~top_positive~default-1-136107612-null-null.142^v100^pc_search_result_base8&utm_term=%E7%94%9F%E6%88%90%E5%BC%8F%E4%BA%BA%E5%B7%A5%E6%99%BA%E8%83%BD&spm=1018.2226.3001.4187">生成式人工智能</a>
                                        </h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a href="https://blog.csdn.net/2301_76168381/article/details/143714755"><img
                                                src="static/picture/new/yiyao.png" alt="Image" width="270"
                                                height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="https://blog.csdn.net/2301_76168381/article/details/143714755">生物医学大模型</a>
                                        </h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a href="https://www.tsinghua.edu.cn/info/1182/110485.htm"><img
                                                src="static/picture/new/naoji.png" alt="Image" width="270"
                                                height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="https://www.tsinghua.edu.cn/info/1182/110485.htm">侵入式脑机接口</a></h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a
                                            href="https://game.academy.163.com/course/careerArticle?course=610&isMaster=0"><img
                                                src="static/picture/new/DlJ6ETJl.jpg" alt="Image" width="270"
                                                height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a
                                                href="https://game.academy.163.com/course/careerArticle?course=610&isMaster=0">AI+游戏</a>
                                        </h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <!-- <p class="get-started">We are ready to give 24/7 support for your cutomer. <a
                            href="services.html">Get Started</a></p> -->
                </div>
            </div>
            <div class="shape-group">
                <div class="shape-style2">
                    <img src="static/picture/21.webp" alt="Image" width="353" height="918">
                </div>
                <div class="shape-style3">
                    <img src="static/picture/31.webp" alt="Image" width="353" height="918">
                </div>
            </div>
        </div>
    </section>
    <!--== End Service Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->
    <!-- <section class="divider-area divider-style1-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="divider-wrap">
                        <div class="column-left">
                            <div class="content">
                                <p>Strist is trusted logistic ompany. You can contact for any logistic service.</p>
                            </div>
                        </div>
                        <div class="column-right">
                            <div class="content">
                                <h2 class="title">88 95 46 37</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!--== End Divider Area Wrapper ==-->

    <!--== Start Team Area ==-->
    <section class="team-area team-default-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="section-title text-center">
                        <h4 class="subtitle">TEAM MEMBERS</h4>
                        <h2 class="title">喵喵大魔王组</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="team-slider-content">
                        <div class="swiper-container team-slider-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="team-member">
                                        <a href="<?= Url::to(['employees/employee', 'id' => 0]) ?>">
                                            <div class="thumb">
                                                <img src="static/picture/zmk.jpg" alt="Image" width="161" height="199">
                                            </div>
                                            <div class="content">
                                                <div class="member-info">
                                                    <h4 class="name">张明昆</h4>

                                                    <h6 class="designation">组长</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member">
                                        <a href="<?= Url::to(['employees/employee', 'id' => 1]) ?>">
                                            <div class="thumb">
                                                <img src="static/picture/yhr.jpg" alt="Image" width="161" height="199">
                                            </div>
                                            <div class="content">
                                                <div class="member-info">
                                                    <h4 class="name">闫恒瑞</h4>

                                                    <h6 class="designation">成员</h6>
                                                </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="team-member">
                                    <a href="<?= Url::to(['employees/employee', 'id' => 2]) ?>">
                                        <div class="thumb">
                                            <img src="static/picture/hjz.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">胡进喆</h4>

                                                <h6 class="designation">成员</h6>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="swiper-slide">
                                <div class="team-member">
                                    <a href="<?= Url::to(['employees/employee', 'id' => 3]) ?>">
                                        <div class="thumb">
                                            <img src="static/picture/wb.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">王博</h4>

                                                <h6 class="designation">成员</h6>
                                            </div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--== End Team Area ==-->

    <!--== Start Project Area ==-->

    <!--== End Project Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-default-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="section-title">
                        <h4 class="subtitle">OUR CHARTS</h4>
                        <h2 class="title">图表展示</h2>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="PicItem">
                    <div class="PicComment">
                        <h3 class="title">月相</h3>
                        <p>输入年份、位置或经纬度即可查看月相</p>
                    </div>
                    <div class="NewPic">
                        <?php include('d3demo3.php'); ?>
                    </div>
                </div>

                <!--== Start Blog Post Item ==-->
                <div class="PicItem">
                    <div class="PicComment">
                        <h3 class="title">动态时钟</h3>
                        <p>从月份精确到秒的动态时钟</p>
                    </div>
                    <div class="NewPic">
                        <?php include('d3demo1.php'); ?>
                    </div>
                </div>
                <!--== End Blog Post Item ==-->



            </div>
        </div>
        <div class="shape-group">
            <div class="shape-style1">
                <img src="static/picture/110.webp" alt="Image" width="185" height="185">
            </div>
        </div>
    </section>
    <!--== End Blog Area Wrapper ==-->

    <!--== Start Testimonial Area Wrapper ==-->
    <section class="testimonial-area testimonial-default-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="section-title text-center">
                        <h4 class="subtitle">MESSAGE BOARD</h4>
                        <h2 class="title">个人留言板</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="swiper-container testimonial-slider-container">
                        <div class="swiper-wrapper">
                            <?php if (!empty($feedbacks)): ?>
                                <?php foreach ($feedbacks as $feedback): ?>
                                    <div class="swiper-slide">
                                        <!--== Start Testimonial Item ==-->
                                        <div class="testimonial-item">
                                            <div class="content">
                                                <p>"<?= Html::encode($feedback->content) ?>"</p>
                                                <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                                    width="252" height="191">
                                            </div>
                                            <div class="client-info">
                                                <div class="desc">
                                                    <h5><?= Yii::$app->formatter->asDate($feedback->created_at) ?></h5>
                                                    <h4><?= Html::encode($feedback->author_name) ?></h4>
                                                </div>
                                                <div class="rating">
                                                    <?php
                                                    for ($i = 1; $i <= 5; $i++) {
                                                        if ($i <= $feedback->rating) {
                                                            echo '<span class="rating-color icofont-star"></span>';
                                                        } else {
                                                            echo '<span class="icofont-star"></span>';
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!--== End Testimonial Item ==-->
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <div class="content">
                                            <p>"暂无留言"</p>
                                            <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                                width="252" height="191">
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->

    <script>
        document.getElementById('search-btn').addEventListener('click', function () {
            // 获取输入框的值
            var key = document.getElementById('tracking-input').value;

            // 如果没有输入值，提示用户
            if (!key) {
                alert('请输入搜索内容！');
                return;
            }

            // 动态更新链接地址
            var dynamicLink = document.getElementById('dynamic-link');
            dynamicLink.href = '<?= \yii\helpers\Url::to(['site/searchpost']) ?>' + '&' + 'key=' + encodeURIComponent(key);

            // 触发点击事件
            dynamicLink.click();
        });
    </script>

    ?>

    <!--== Start Divider Area Wrapper ==-->

    <!--== End Divider Area Wrapper ==-->


</main>
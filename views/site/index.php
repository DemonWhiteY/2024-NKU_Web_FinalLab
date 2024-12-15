<?php

/** @var yii\web\View $this */

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
                                style="background-image: url('static/picture/xuemo.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-6">
                                            <div class="content">
                                                <div class="inner-content">
                                                    <div class="wrap-one">
                                                        <h2>欢迎来到我们的团队主页</h2>
                                                    </div>
                                                    <div class="wrap-two">
                                                        <p>Welcome to our team homepage.</p>
                                                    </div>
                                                    <!-- <div class="wrap-three">
                                                        <a href="contact.html" class="btn-theme">Booking Now</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="thumb">
                                                <div class="bg-thumb bg-img" data-bg-img="assets/img/slider/2.webp">
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
                            <input class="form-control" type="text" placeholder="Tracking Number">
                            <button class="btn btn-theme" type="button">Track Now <i
                                    class="icon icofont-long-arrow-right"></i></button>
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
                        <img src="static/picture/mountain.jpg" alt="Image" width="350" height="570">
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="featured-wrp">
                        <div class="featured-item">
                            <h4 class="title"><a href="about.html">专业能力</a></h4>
                            <p>It long estabhed fact that reader readab content page when looking point using that
                                less</p>
                        </div>
                        <div class="featured-item">
                            <h4 class="title"><a href="about.html">参赛经历</a></h4>
                            <p>It long estabhed fact that reader readab content page when looking point using that
                                less</p>
                        </div>
                        <div class="featured-item">
                            <h4 class="title"><a href="about.html">爱好广泛</a></h4>
                            <p>It long estabhed fact that reader readab content page when looking point using that
                                less</p>
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
                        <h4 class="subtitle">ABOUT US</h4>
                        <h2 class="title">个人风采</h2>
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
                                        <a href="service-details.html"><img src="static/picture/guduyaogun.jpg"
                                                alt="Image" width="270" height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="service-details.html">二刺螈</a></h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a href="service-details.html"><img src="static/picture/huaxue.jpg" alt="Image"
                                                width="270" height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="service-details.html">运动</a></h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a href="service-details.html"><img src="static/picture/code.png" alt="Image"
                                                width="270" height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="service-details.html">码！</a></h4>
                                    </div>
                                </div>
                                <!-- End Service Item -->
                            </div>
                            <div class="swiper-slide">
                                <!-- Start Service Item -->
                                <div class="service-item">
                                    <div class="thumb">
                                        <a href="service-details.html"><img src="static/picture/travel.jpg" alt="Image"
                                                width="270" height="308"></a>
                                    </div>
                                    <div class="content">
                                        <h4 class="title"><a href="service-details.html">旅行&摄影</a></h4>
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
                                        <div class="thumb">
                                            <img src="static/picture/zmk.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">张明昆</h4>
                                                <h6 class="designation">组长</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member">
                                        <div class="thumb">
                                            <img src="static/picture/yhr.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">闫恒瑞</h4>
                                                <h6 class="designation">成员</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member">
                                        <div class="thumb">
                                            <img src="static/picture/hjz.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">胡进喆</h4>
                                                <h6 class="designation">成员</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="team-member">
                                        <div class="thumb">
                                            <img src="static/picture/wb.jpg" alt="Image" width="161" height="199">
                                        </div>
                                        <div class="content">
                                            <div class="member-info">
                                                <h4 class="name">王博</h4>
                                                <h6 class="designation">成员</h6>
                                            </div>
                                        </div>
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
                        <h4 class="subtitle">OUR LATEST BLOG POST</h4>
                        <h2 class="title">最新博客</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <!--== Start Blog Post Item ==-->
                    <div class="post-item mb-sm-50">
                        <div class="thumb">
                            <img src="static/picture/doufunao.jpg" alt="Image" width="420" height="370">
                        </div>
                        <div class="content">
                            <a href="blog.html" class="meta-tag"><span class="post-date"></span>10 Dec. 2024</a>
                            <h3 class="title"><a href="blog-details.html">豆腐脑甜的好吃还是咸的好吃</a></h3>
                            <p>我觉得北方人爱吃咸的，南方人爱吃甜的</p>
                            <a class="btn-link" href="blog-details.html">Read More</a>
                        </div>
                    </div>
                    <!--== End Blog Post Item ==-->
                </div>
                <div class="col-md-6">
                    <!--== Start Blog Post Item ==-->
                    <div class="post-item">
                        <div class="thumb">
                            <img src="static/picture/leiden.png" alt="Image" width="420" height="370">
                        </div>
                        <div class="content">
                            <a href="blog.html" class="meta-tag"><span class="post-date"></span>2 Dec. 2024</a>
                            <h3 class="title"><a href="blog-details.html">图社区发现算法--Leiden算法</a></h3>
                            <p>Leiden算法出自2019年的论文《From Louvain to Leiden: guaranteeing well-connected
                                communities》，它是Louvain算法的改进社区发现算法，相比Louvain得到的社区质量更高，因为其移动策略速度也更快。Leiden算法也是以论文作者所在城市来命名的。
                            </p>
                            <a class="btn-link" href="blog-details.html">Read More</a>
                        </div>
                    </div>
                    <!--== End Blog Post Item ==-->
                </div>
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
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p>“这是一条留言”.</p>
                                        <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                            width="252" height="191">
                                    </div>
                                    <div class="client-info">
                                        <div class="desc">
                                            <h5>2024.12.10</h5>
                                            <h4>张明昆</h4>
                                        </div>

                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p>“There are many varioution of Lorem Ipsum. lorem has been industry
                                            standard dummy text sinces when unknowns printer took galley type and
                                            scram make type specimen simply dummy text”.</p>
                                        <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                            width="252" height="191">
                                    </div>
                                    <div class="client-info">
                                        <div class="desc">
                                            <h5>Founder of Eleren</h5>
                                            <h4>Elisa Marshall</h4>
                                        </div>
                                        <div class="rating">
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="icofont-star"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p>“Lorem Ipsum simply dummy text printing typesetting industry lorem has
                                            been industry standard dummy text sinces when unknowns printer took
                                            galley type and scram make type specimen book”.</p>
                                        <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                            width="252" height="191">
                                    </div>
                                    <div class="client-info">
                                        <div class="desc">
                                            <h5>Founder of Musion</h5>
                                            <h4>Shoshana Horsley</h4>
                                        </div>
                                        <div class="rating">
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="icofont-star"></span>
                                            <span class="icofont-star"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                            <div class="swiper-slide">
                                <!--== Start Testimonial Item ==-->
                                <div class="testimonial-item">
                                    <div class="content">
                                        <p>“Lorem Ipsum simply dummy text printing typesetting industry lorem has
                                            been industry standard dummy text sinces when unknowns printer took
                                            galley type and scram make type specimen book”.</p>
                                        <img class="quote-icon" src="static/picture/quote-icon.webp" alt="Icon"
                                            width="252" height="191">
                                    </div>
                                    <div class="client-info">
                                        <div class="desc">
                                            <h5>Founder of Musion</h5>
                                            <h4>Elisa Marshall</h4>
                                        </div>
                                        <div class="rating">
                                            <span class="rating-color icofont-star"></span>
                                            <span class="rating-color icofont-star"></span>
                                            <span class="icofont-star"></span>
                                            <span class="icofont-star"></span>
                                            <span class="icofont-star"></span>
                                        </div>
                                    </div>
                                </div>
                                <!--== End Testimonial Item ==-->
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Testimonial Area Wrapper ==-->

    <!--== Start Divider Area Wrapper ==-->

    <!--== End Divider Area Wrapper ==-->


</main>
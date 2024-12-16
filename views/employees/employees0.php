<?php
use yii\helpers\Html;
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img=<?= Html::encode($model->fron_src) ?>>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">TeamMember</h2>
                        <div class="bread-crumbs"><a href="index.html"> Home </a><span class="breadcrumb-sep"> //
                            </span><span class="active"> TeamMember</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>

    <div class="gstar-main">
        <div class="member">
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <!-- Personal Info -->
                        <div class="col-xl-4">
                            <div class="gstar-personal-info">
                                <div class="gstar-personal-info-wrap">
                                    <!-- Img -->
                                    <div class="gstar-personal-info-img mb-24 text-center">
                                        <span class="rounded-pill d-inline-block p-2 position-relative">
                                            <img src=<?= Html::encode($model->pic_src) ?> class="img-fluid rounded-pill"
                                                title="I'm Olivia Alexandra" alt="Profile Image">
                                            <!-- Available Link -->
                                            <a href="contact.html" class="available-link"></a>
                                        </span>
                                    </div>
                                    <!-- Img End -->


                                    <h4 class="gstar-personal-info-name text-2xl fw-600 mb-1 text-center">
                                        <?= Html::encode($model->name) ?>
                                    </h4>
                                    <p class="text-center mb-4"><span class="typed text-base fw-400"></span></p>
                                    <!-- Social -->
                                    <ul class="social-icons text-center mb-32">
                                        <li class="social-icon-fb"><a href="#"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                        </li>
                                        <li class="social-icon-x"><a href="#"><i class="fa fa-twitter-x"></i></a>
                                        </li>
                                        <li class="social-icon-instagram"><a href="#"><i
                                                    class="fa-brands fa-instagram"></i></a>
                                        </li>
                                        <li class="social-icon-linkedin"><a href="#"><i
                                                    class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                    <!-- Social End -->

                                    <!-- Contact -->
                                    <div class="gstar-personal-info-contact-item d-flex align-items-center mb-3">
                                        <div class="icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                                        <div class="text ml-12">
                                            <span class="text-sm fw-400 mb-1 d-block">Phone</span>
                                            <strong
                                                class="text-base fw-500 mb-0 d-block"><?= Html::encode($model->phone) ?></strong>
                                        </div>
                                    </div>
                                    <div class="gstar-personal-info-contact-item d-flex align-items-center mb-3">
                                        <div class="icon"><i class="fa-solid fa-envelope-open-text"></i></div>
                                        <div class="text ml-12">
                                            <span class="text-sm fw-400 mb-1 d-block">Email</span>
                                            <strong
                                                class="text-base fw-500 mb-0 d-block"><?= Html::encode($model->email) ?></strong>
                                        </div>
                                    </div>
                                    <div class="gstar-personal-info-contact-item d-flex align-items-center mb-0">
                                        <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
                                        <div class="text ml-12">
                                            <span class="text-sm fw-400 mb-1 d-block">Location</span>
                                            <strong
                                                class="text-base fw-500 mb-0 d-block"><?= Html::encode($model->address) ?></strong>
                                        </div>
                                    </div>
                                    <!-- Contact End -->
                                </div>
                            </div>
                        </div>
                        <!-- Personal Info End -->

                        <div class="col-xl-8">
                            <div class="gstar-page-content-wrap">
                                <div class="section-inner-wrapper pl-32 pr-32 pt-32">
                                    <!-- Page Title -->
                                    <div class="page-title">
                                        <h3 class="text-2xl fw-600 text-uppercase mb-0">About Me</h3>
                                    </div>
                                    <!-- Page Title End -->

                                    <h1 class="about-head text-7xl fw-400 mb-4">Hello<span class="hand">👋</span>I’m
                                        <span><?= Html::encode($model->tickname) ?></span>
                                    </h1>
                                    <p class="about-paragraph">Hi!
                                        I'm <?= Html::encode($model->tickname) ?>,<?= Html::encode($model->bio) ?></p>
                                </div>

                                <!-- Fun Facts -->
                                <div class="section-inner-wrapper pl-32 pr-32">
                                    <div class="fun-facts mt-40 mb-40">
                                        <div class="row">
                                            <div class="col-6 col-md-3">
                                                <div class="fun-fact-box text-center">
                                                    <h4 class="text-6xl fw-600 mb-0">10+</h4>
                                                    <p>Years Experiance</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="fun-fact-box text-center">
                                                    <h4 class="text-6xl fw-600 mb-0">85+</h4>
                                                    <p>Projects</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="fun-fact-box text-center">
                                                    <h4 class="text-6xl fw-600 mb-0">6500+</h4>
                                                    <p>lines code</p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3">
                                                <div class="fun-fact-box text-center">
                                                    <h4 class="text-6xl fw-600 mb-0">45</h4>
                                                    <p>Get Awards</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fun Facts End -->

                                <!-- Most Recent Work -->
                                <div class="section-inner-wrapper pl-32 pr-32">
                                    <div class="most-recent-work mb-40">
                                        <h4 class="text-xl fw-600 mb-24">Most Recent Work</h4>
                                        <div class="row g-3">
                                            <!-- Work #01 -->
                                            <div class="col-md-6">
                                                <div class="recent-work-box p-3 rounded">
                                                    <a href=<?= Html::encode($model->project1_github_link) ?>
                                                        class="text-base mb-4 d-inline-block"><i
                                                            class="fa-regular fa-file-zipper me-1"></i>
                                                        <?= Html::encode($model->project1_name) ?></a>
                                                    <ul class="work-technology">
                                                        <li class="css">css</li>
                                                        <li class="html">ASM</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Work #02 -->
                                            <div class="col-md-6">
                                                <div class="recent-work-box p-3 rounded">
                                                    <a href=<?= Html::encode($model->project2_github_link) ?>
                                                        class="text-base mb-4 d-inline-block"><i
                                                            class="fa-regular fa-file-zipper me-1"></i>
                                                        <?= Html::encode($model->project2_name) ?></a>
                                                    <ul class="work-technology">
                                                        <li class="css">css</li>
                                                        <li class="html">HTML</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Work #03 -->
                                            <div class="col-md-6">
                                                <div class="recent-work-box p-3 rounded">
                                                    <a href=<?= Html::encode($model->project3_github_link) ?>
                                                        class="text-base mb-4 d-inline-block"><i
                                                            class="fa-regular fa-file-zipper me-1"></i>
                                                        <?= Html::encode($model->project3_name) ?></a>
                                                    <ul class="work-technology">
                                                        <li class="blender">Blender</li>
                                                        <li class="unreal-engine">Unreal Engine</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Work #04 -->
                                            <div class="col-md-6">
                                                <div class="recent-work-box p-3 rounded">

                                                    <a href=<a href=<?= Html::encode($model->project4_github_link) ?>
                                                        class="text-base mb-4 d-inline-block"><i
                                                            class="fa-regular fa-file-zipper me-1"></i>
                                                        <?= Html::encode($model->project4_name) ?></a>
                                                    <ul class="work-technology">
                                                        <li class="figma">Figma</li>
                                                        <li class="adobe-XD">Adobe XD</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Most Recent Work End -->


                                <!-- Interest -->
                                <div class="section-inner-wrapper pl-32 pr-32">
                                    <div class="interest mb-40">
                                        <h4 class="text-xl fw-600 mb-24">Interest</h4>
                                        <div class="row g-3">
                                            <!-- Interest #01 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/music.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Music</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #02 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/lorem.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Lorem Ipsum</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #03 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/development.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Development</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #04 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/graphic.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Graphic Design</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #05 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/photography.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Photography</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #06 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/analysis.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Analysis</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #07 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/colors.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Dolor Sitema</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #08 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/cell-tower.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Verdo Park</strong>
                                                </div>
                                            </div>
                                            <!-- Interest #09 -->
                                            <div class="col-md-4">
                                                <div class="interest-box p-3">
                                                    <img class="img-fluid" src="static/picture/motion-graphic.png"
                                                        alt="Interest Icon">
                                                    <strong class="text-base fw-600 ms-1">Motion Graphic</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Interest End -->



                                <!-- Footer Copyright -->
                                <div class="footer footer-s-1 pt-28 pb-28 pl-16 pr-16 copyright text-center">
                                    <p>Copyright &copy; 2024.Company name All rights reserved.<a target="_blank"
                                            href="https://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
                                    </p>
                                </div>
                                <!-- Footer Copyright End -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- Main End -->
    </div>
    <!-- Page Content End -->

    <!-- Color Switcher -->
    <div class="color-switcher">
        <div class="switcher-btn">
            <i class="fa-light fa-gear fa-spin"></i>
        </div>
        <h3>Color Switcher</h3>
        <div class="theme-buttons-container">
            <ul>
                <li class="theme-button saladGreen" data-bs-toggle="tooltip" title="Salad Green (Default)"
                    data-path="assets/css/skins/color-saladGreen.css"></li>
                <li class="theme-button orange" data-bs-toggle="tooltip" title="Orange"
                    data-path="assets/css/skins/color-orange.css"></li>
                <li class="theme-button yellow" data-bs-toggle="tooltip" title="Yellow"
                    data-path="assets/css/skins/color-yellow.css"></li>
                <li class="theme-button skyBlue" data-bs-toggle="tooltip" title="Sky Blue"
                    data-path="assets/css/skins/color-skyBlue.css"></li>
                <li class="theme-button green" data-bs-toggle="tooltip" title="Green"
                    data-path="assets/css/skins/color-green.css"></li>
                <li class="theme-button gray" data-bs-toggle="tooltip" title="Gray"
                    data-path="assets/css/skins/color-gray.css"></li>
                <li class="theme-button softBlue" data-bs-toggle="tooltip" title="Soft Blue"
                    data-path="assets/css/skins/color-softBlue.css"></li>
                <li class="theme-button fluorescentRed" data-bs-toggle="tooltip" title="Fluorescent Red"
                    data-path="assets/css/skins/color-fluorescentRed.css"></li>
                <li class="theme-button pink" data-bs-toggle="tooltip" title="Pink"
                    data-path="assets/css/skins/color-pink.css"></li>
                <li class="theme-button steelPink" data-bs-toggle="tooltip" title="Steel Pink"
                    data-path="assets/css/skins/color-steelPink.css"></li>
            </ul>
        </div>


    </div>

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
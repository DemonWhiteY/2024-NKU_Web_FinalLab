<?php
/**
 * 帖子列表视图
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */
/**
 * 帖子列表视图
 *
 * 本文件是用 Yii2 框架构建的帖子列表页面视图，主要用于展示网站上各类帖子的列表。 
 * 该页面通过 ActiveDataProvider 提供的数据，动态生成帖子列表，并支持分页功能。 
 * 在页面的顶部设置了页面标题区域，包含主标题和面包屑导航，方便用户进行页面导航和返回。
 *
 * 主要功能包括：
 * 1. 页面标题显示：通过设置 `$this->title` 变量来定义页面的主标题为“帖子列表”。
 * 2. 帖子展示：使用 `foreach` 循环遍历从数据提供者中获取的帖子模型，并为每个帖子生成一个链接，用户点击后可查看帖子详情。每个帖子的标题和内容经过 HTML 编码，确保内容安全，同时限制内容长度显示，避免页面过长。
 * 3. 分页功能：利用 Yii2 提供的 `LinkPager` 组件实现帖子列表的分页，提升用户体验。
 * 4. 额外内容区域：在帖子列表下方，提供了一个信息提示区域，旨在增强用户与网站的互动，例如鼓励用户订阅相关的服务更新。
 *
 * 本视图文件使用了 HTML 和 CSS 进行布局和样式设计，确保页面在不同设备上的响应式表现。
 * 此外，视图中还包含了一些静态资源的引用，例如背景图片和按钮图标，增强了页面的视觉效果。
 *
 * 该视图文件是 MVC 架构中的视图部分，负责与用户交互的界面展示，确保信息的有效传达与用户操作的便捷性。
 * 适用于需要展示多个帖子的博客或论坛类网站，能够为用户提供良好的浏览体验。
 * 
 * @var yii\web\View $this 当前视图对象
 * @var yii\data\ActiveDataProvider $dataProvider 数据提供者，包含帖子模型数据
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = '帖子列表';
?>

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="assets/img/photos/bg2.webp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">帖子广场</h2>
                        <div class="bread-crumbs"><a href="index.html"> 主页 </a><span class="breadcrumb-sep"> //
                            </span><span class="active">帖子广场</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->



    <section class="about-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- 页面标题 -->
                <div class="section-title text-center mt-5 pt-4">
                    <h1><?= Html::encode($this->title) ?></h1>
                </div>

                <!-- 帖子列表 -->
                <div class="featured-wrp">
                    <?php foreach ($dataProvider->getModels() as $post): ?>
                        <!-- 添加链接，先用简单的 test 路由测试 -->
                        <a href="<?= Url::to(['post/detail', 'id' => $post->id]) ?>" style="text-decoration: none; color: inherit;">
                            <div class="featured-item mb-4 p-4 bg-light rounded shadow-sm">
                                <h4 class="title">
                                    <?= Html::encode($post->name) ?>
                                </h4>
                                <p>
                                    <?= Html::encode(mb_substr($post->content, 0, 200, 'UTF-8')) ?>
                                    <?php if (mb_strlen($post->content, 'UTF-8') > 200): ?>...<?php endif; ?>
                                </p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>

                <!-- 分页 -->
                <div class="text-center mt-4">
                    <?= LinkPager::widget([
                        'pagination' => $dataProvider->pagination,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    </section>

    <!--== Start Divider Area Wrapper ==-->
    <section class="divider-area divider-default-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-8 col-md-7">
                    <div class="content">
                        <h2 class="title">Stay connect with for<br> daily logistic service update.</h2>
                    </div>
                </div>
                <div class="col-sm-4 col-md-5">
                    <div class="divider-btn">
                        <a class="btn-theme btn-white" href="index.html">Subscribe Now <i
                                class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-group">
            <div class="shape-style4">
                <img src="static/picture/42.webp" alt="Image" width="560" height="250">
            </div>
        </div>
    </section>
    <!--== End Divider Area Wrapper ==-->
</main>
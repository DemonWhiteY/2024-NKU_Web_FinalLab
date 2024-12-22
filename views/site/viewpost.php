<style>
.about-area .container {
    width: 100%; /* 使容器宽度占满整个页面 */
    padding: 0; /* 移除内边距 */
}

.about-area .row {
    width: 100%; /* 使行宽度占满整个页面 */
}
.new-col-lg-8 {
    flex: 0 0 auto;
    width: 100%;
  }

</style>
<?php
/**
 * 帖子列表视图
 *
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 */

use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = '帖子列表';
?>

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="static/picture/new/3.png">
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
            <div class="new-col-lg-8">
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
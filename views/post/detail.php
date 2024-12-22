<style>

.new-col-lg-8 {
    flex: 0 0 auto;
    width: 100%;
  }

</style>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = $post->name;
?>




<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="assets/img/photos/bg2.webp">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">帖子详情</h2>
                        <div class="bread-crumbs">
                            <a href="index.html">主页</a>
                            <span class="breadcrumb-sep"> // </span>
                            <span class="active">帖子详情</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->
</main>


<div class="container">
    <div class="row justify-content-center">
        <div class="new-col-lg-8">
            <!-- 返回按钮 -->
            <div class="mb-3 mt-3">
                <?= Html::a('返回列表', ['site/index'], ['class' => 'btn btn-secondary']) ?>
            </div>
            
            <!-- 帖子内容 -->
            <div class="featured-item p-4 bg-light rounded shadow-sm mb-4">
                <h2><?= Html::encode($post->name) ?></h2>
                <div class="mt-4">
                    <?= Html::encode($post->content) ?>
                </div>
            </div>
            <?= Html::beginForm(['post/like', 'id' => $post->id], 'post') ?>
                <?= Html::submitButton('点赞 (' . $post->getLikeCount() . ')', ['class' => 'btn btn-primary']) ?>
            <?= Html::endForm() ?>

            <!-- 评论表单 -->
            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="comment-form mb-4">
                    <h4>发表评论</h4>
                    <?php $form = ActiveForm::begin(); ?>
                    
                    <?= $form->field($newComment, 'content')->textarea(['rows' => 3])->label(false) ?>

                    <div class="form-group">
                        <?= Html::submitButton('提交评论', ['class' => 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    请<?= Html::a('登录', ['site/login']) ?>后发表评论
                </div>
            <?php endif; ?>

            <!-- 评论列表 -->
            <div class="comments">
                <h4>全部评论 (<?= count($comments) ?>)</h4>
                <?php foreach ($comments as $comment): ?>
                    <div class="comment-item p-3 mb-3 bg-light rounded">
                        <div class="d-flex justify-content-between">
                            <strong><?= Html::encode($comment->user->username) ?></strong>
                            <small class="text-muted"><?= Yii::$app->formatter->asDatetime($comment->created_at) ?></small>
                        </div>
                        <div class="mt-2">
                            <?= Html::encode($comment->content) ?>
                        </div>
                    </div>
                    <?= Html::beginForm(['comment/like', 'id' => $comment->id], 'post') ?>
                        <?= Html::submitButton('点赞 (' . $comment->getLikeCount() . ')', ['class' => 'btn btn-sm btn-primary']) ?>
                    <?= Html::endForm() ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
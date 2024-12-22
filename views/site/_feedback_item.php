<?php
use yii\helpers\Html;
?>

<div class="feedback-item">
    <div class="row">
        <div class="col-sm-8">
            <span class="author-name"><?= Html::encode($model->author_name) ?></span>
        </div>
        <div class="col-sm-4 text-right">
            <span class="rating-stars">
                <?= str_repeat('★', $model->rating) . str_repeat('☆', 5 - $model->rating) ?>
            </span>
        </div>
    </div>
    <div class="feedback-content">
        <?= Html::encode($model->content) ?>
    </div>
    <div class="feedback-time text-right">
        <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
    </div>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

$this->title = "留言详情：" . $model->author_name;
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <p class="text-center">
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除此留言吗？',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'content:ntext',
            'author_name',
            [
                'attribute' => 'rating',
                'value' => $model->getRatingText(),
            ],
            [
                'attribute' => 'created_at',
                'value' => $model->getFormattedCreatedAt(),
            ],
        ],
    ]) ?>
</div>

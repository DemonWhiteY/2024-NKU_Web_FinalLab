<?php


// 引入必要的库
$this->registerJsFile('https://d3js.org/d3.v7.min.js');
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/d3-cloud/1.2.5/d3.layout.cloud.min.js');
?>

<style>
    /* 主容器样式 */
    .feedback-section {
        padding: 40px 20px;
        background-color: #f9f9f9;
    }

    /* 留言表单 */
    .feedback-form {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* 表单标题 */
    .feedback-form .panel-heading {
        background-color: #007bff;
        color: #ffffff;
        border-radius: 8px 8px 0 0;
        text-align: center;
    }

    .feedback-form .panel-title {
        margin: 0;
        font-size: 18px;
    }

    /* 表单输入框样式 */
    .form-control {
        border-radius: 5px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #007bff;
    }

    /* 提交按钮 */
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 10px;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    /* 留言列表 */
    .feedback-list {
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    /* 留言项样式 */
    .feedback-item {
        padding-bottom: 20px;
        border-bottom: 1px solid #f1f1f1;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .feedback-item:last-child {
        border-bottom: none;
    }

    .author-name {
        font-weight: bold;
        color: #333;
    }

    .feedback-time {
        color: #999;
        font-size: 0.9em;
    }

    .rating-stars {
        color: #ffd700;
        font-size: 1.2em;
    }

    /* 响应式设计 */
    @media (max-width: 768px) {
        .feedback-section {
            padding: 20px;
        }

        .feedback-form,
        .feedback-list {
            padding: 15px;
        }

        .col-lg-4,
        .col-lg-8 {
            width: 100%;
            margin-bottom: 20px;
        }
    }
</style>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="static/picture/new/1.png">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 m-auto">
                    <div class="page-title-content text-center">
                        <h2 class="title">留言板</h2>
                        <div class="bread-crumbs">
                            <a href="index.html">主页</a>
                            <span class="breadcrumb-sep"> // </span>
                            <span class="active">留言板</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-overlay3"></div>
    </section>
    <!--== End Page Title Area ==-->
</main>

<div class="feedback-section">
    <div class="col">
        <div class="row">
            <!-- 左侧留言表单 -->
            <div class="col-lg-4">
                <div class="feedback-form panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">发表留言</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['id' => 'feedback-form']); ?>

                        <?= $form->field($model, 'author_name')->textInput([
                            'maxlength' => true,
                            'placeholder' => '请输入您的姓名',
                            'class' => 'form-control'
                        ]) ?>

                        <?= $form->field($model, 'content')->textarea([
                            'rows' => 6,
                            'placeholder' => '请输入留言内容',
                            'class' => 'form-control'
                        ]) ?>

                        <?= $form->field($model, 'rating')->dropDownList([
                            5 => '5星 - 非常满意',
                            4 => '4星 - 满意',
                            3 => '3星 - 一般',
                            2 => '2星 - 不满意',
                            1 => '1星 - 非常不满意',
                        ], ['class' => 'form-control']) ?>

                        <div class="form-group">
                            <?= Html::submitButton('提交留言', [
                                'class' => 'btn btn-primary btn-block',
                                'name' => 'feedback-button'
                            ]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>

            <!-- 右侧留言列表 -->
            <div class="col-lg-8">
                <div class="feedback-list panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">留言列表</h3>
                    </div>
                    <div class="panel-body">
                        <?= ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemOptions' => ['class' => 'feedback-item'],
                            'itemView' => '_feedback_item',
                            'summary' => false,
                            'pager' => [
                                'maxButtonCount' => 5,
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
// 添加一些CSS样式
$this->registerCss("
    .feedback-item {
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .feedback-item:last-child {
        border-bottom: none;
    }
    .author-name {
        color: #666;
        font-weight: bold;
    }
    .feedback-time {
        color: #999;
        font-size: 0.9em;
    }
    .rating-stars {
        color: #ffd700;
    }
");
?>
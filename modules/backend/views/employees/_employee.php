<?php 
use yii\helpers\Html;

/* @var $model app\models\Employees */
?>

<div class="employee-card" style="display: flex; justify-content: flex-start; padding: 20px; border: 1px solid #ddd; margin-bottom: 20px; border-radius: 8px; background-color: #f9f9f9; box-sizing: border-box;">
    <!-- 头像部分 -->
    <div class="employee-img" style="flex: 0 0 180px; text-align: center;">
        <?= Html::img('@web/' . $model->pic_src, ['class' => 'img-fluid', 'alt' => $model->name, 'style' => 'border-radius: 50%; width: 180px; height: 180px; object-fit: cover;']) ?>
    </div>
    <!-- 员工信息部分 -->
    <div class="employee-info" style="flex: 1; padding-left: 20px; display: flex; flex-direction: column;">
        <h3 class="employee-name" style="font-size: 26px; font-weight: bold; margin-bottom: 10px;"><?= Html::encode($model->name) ?></h3>
        
        <p class="employee-tickname" style="font-size: 16px; margin-bottom: 5px;"><strong>Nickname:</strong> <?= Html::encode($model->tickname) ?></p>
        <p class="employee-phone" style="font-size: 16px; margin-bottom: 5px;"><strong>Phone:</strong> <?= Html::encode($model->phone) ?></p>
        <p class="employee-address" style="font-size: 16px; margin-bottom: 5px;"><strong>Address:</strong> <?= Html::encode($model->address) ?></p>
        <p class="employee-email" style="font-size: 16px; margin-bottom: 5px;"><strong>Email:</strong> <?= Html::encode($model->email) ?></p>
        <p class="employee-bio" style="font-size: 16px; margin-bottom: 10px;"><strong>Bio:</strong> <?= Html::encode($model->bio) ?></p>

        <!-- 项目链接部分 -->
        <div class="employee-projects" style="margin-top: 15px; font-size: 16px;">
            <p><strong>Projects:</strong></p>
            <?php if ($model->project1_name): ?>
                <p><strong><?= Html::encode($model->project1_name) ?>:</strong> <?= Html::a('Github Link', 'https://'.$model->project1_github_link, ['target' => '_blank', 'style' => 'color: #007bff;']) ?></p>
            <?php endif; ?>
            <?php if ($model->project2_name): ?>
                <p><strong><?= Html::encode($model->project2_name) ?>:</strong> <?= Html::a('Github Link', 'https://'.$model->project2_github_link, ['target' => '_blank', 'style' => 'color: #007bff;']) ?></p>
            <?php endif; ?>
            <?php if ($model->project3_name): ?>
                <p><strong><?= Html::encode($model->project3_name) ?>:</strong> <?= Html::a('Github Link', 'https://'.$model->project3_github_link, ['target' => '_blank', 'style' => 'color: #007bff;']) ?></p>
            <?php endif; ?>
            <?php if ($model->project4_name): ?>
                <p><strong><?= Html::encode($model->project4_name) ?>:</strong> <?= Html::a('Github Link', 'https://'.$model->project4_github_link, ['target' => '_blank', 'style' => 'color: #007bff;']) ?></p>
            <?php endif; ?>
        </div>

        <!-- 操作按钮 -->
        <div style="margin-top: 20px;">
            <?= Html::a('Update', ['employees/update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm', 'style' => 'padding: 8px 15px;']) ?>
        </div>
    </div>
</div>

<style>
    /* 响应式设计：保证在小屏设备下布局美观 */
    @media (max-width: 768px) {
        .employee-card {
            flex-direction: column;
            padding: 15px;
        }

        .employee-img {
            margin-bottom: 15px;
            flex: 0 0 120px;
        }

        .employee-info {
            padding-left: 0;
        }
    }
</style>

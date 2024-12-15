<?php
use yii\helpers\Html;
?>

<h1>测试数据列表</h1>

<?= Html::a('创建新记录', ['create'], ['class' => 'btn btn-success']) ?>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>名称</th>
        <th>内容</th>
        <th>创建时间</th>
    </tr>
    <?php foreach ($tests as $test): ?>
    <tr>
        <td><?= $test->id ?></td>
        <td><?= Html::encode($test->name) ?></td>
        <td><?= Html::encode($test->content) ?></td>
        <td><?= $test->created_at ?></td>
    </tr>
    <?php endforeach; ?>
</table>
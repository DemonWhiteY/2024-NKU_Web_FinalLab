<?php
namespace app\models;

use yii\db\ActiveRecord;

class Test extends ActiveRecord
{
    // 指定表名
    public static function tableName()
    {
        return 'test';
    }

    // 定义验证规则
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    // 定义属性标签
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'content' => '内容',
            'created_at' => '创建时间',
        ];
    }
}
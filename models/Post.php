<?php
namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    // 指定表名
    public static function tableName()
    {
        return 'post';
    }

    // 定义验证规则
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['content'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['author_id'], 'integer'],
            [['create_at'], 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => false,  // 如果不需要更新时间，就设为 false
                'value' => function() {
                    return date('Y-m-d H:i:s');
                }
            ],
        ];
    }

    // 定义属性标签
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'content' => '内容',
            'create_at' => '创建时间',
            'author_id' => '作者',
        ];
    }

    public function getLikeCount()
    {
        return PostLike::find()
            ->where(['post_id' => $this->id])
            ->count();
    }

    public function isLikedBy($userId)
    {
        return PostLike::find()
            ->where(['post_id' => $this->id, 'user_id' => $userId])
            ->exists();
    }
}
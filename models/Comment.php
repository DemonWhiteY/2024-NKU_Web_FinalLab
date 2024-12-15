<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\CommentLike;
class Comment extends ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return [
            [['post_id', 'user_id', 'content'], 'required'],
            [['post_id', 'user_id'], 'integer'],
            [['content'], 'string'],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::class, 'targetAttribute' => ['post_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => '帖子ID',
            'user_id' => '用户ID',
            'content' => '评论内容',
            'created_at' => '创建时间',
        ];
    }

    // 获取关联的帖子
    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }

    // 获取关联的用户
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

// models/Comment.php

    public function getLikeCount()
    {
        return CommentLike::find()
            ->where(['comment_id' => $this->id])
            ->count();
    }

    public function isLikedBy($userId)
    {
        return CommentLike::find()
            ->where(['comment_id' => $this->id, 'user_id' => $userId])
            ->exists(); 
    }
}
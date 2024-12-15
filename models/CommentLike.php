<?php
namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class CommentLike extends ActiveRecord
{
    public static function tableName()
    {
        return 'comment_like';
    }

    public function rules()
    {
        return [
            [['comment_id', 'user_id'], 'required'],
            [['comment_id', 'user_id'], 'integer'],
            [['comment_id', 'user_id'], 'unique', 'targetAttribute' => ['comment_id', 'user_id']],
        ];
    }
}
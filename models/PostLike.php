<?php
namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class PostLike extends ActiveRecord
{
    public static function tableName()
    {
        return 'post_like';
    }

    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'required'],
            [['post_id', 'user_id'], 'integer'],
            [['post_id', 'user_id'], 'unique', 'targetAttribute' => ['post_id', 'user_id']],
        ];
    }
}
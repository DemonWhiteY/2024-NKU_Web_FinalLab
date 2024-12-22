<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $content 留言内容
 * @property string $author_name 留言人姓名
 * @property int $rating 评分
 * @property int $created_at 创建时间
 */
class Feedback extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback'; // 替换为你的实际表名
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'author_name'], 'required'],
            [['content'], 'string'],
            [['rating', 'created_at'], 'integer'],
            [['author_name'], 'string', 'max' => 50],
            [['rating'], 'default', 'value' => 5],
            [['rating'], 'integer', 'min' => 1, 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '留言内容',
            'author_name' => '留言人姓名',
            'rating' => '评分',
            'created_at' => '创建时间',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * 获取格式化后的创建时间
     * @return string
     */
    public function getFormattedCreatedAt()
    {
        return date('Y-m-d H:i:s', $this->created_at);
    }

    /**
     * 获取评分显示文本
     * @return string
     */
    public function getRatingText()
    {
        return $this->rating . '星';
    }
}
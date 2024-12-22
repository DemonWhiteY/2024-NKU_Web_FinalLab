<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public $tagString;
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
            [['tagString'], 'safe'],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::class,
                'createdAtAttribute' => 'create_at',
                'updatedAtAttribute' => false,  // 如果不需要更新时间，就设为 false
                'value' => function () {
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
    public function getTags()
    {
        return $this->hasMany(Tags::class, ['id' => 'tag_id'])
            ->viaTable('post_tag', ['post_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // 处理 tagNames 并同步到数据库
            $this->saveTags(explode(',', $this->tagString));

            return true;
        }
        return false;
    }

    public function saveTags($tags)
    {

        foreach ($tags as $tagName) {
            $tagName = trim($tagName);
            if ($tagName === '') {
                continue;
            }
            $this->id = Post::find()->max('id') + 1;
            $tag = Tags::findOne(['name' => $tagName]) ?: new Tags(['name' => $tagName]);
            $tag->save();

            $posttag = new PostTag();
            $posttag->post_id = $this->id;
            $posttag->tag_id = $tag->id;
            $posttag->save();
            Yii::$app->db->createCommand()->insert('post_tag', [
                'post_id' => $this->id,
                'tag_id' => $tag->id,
            ])->execute();
        }
    }
}
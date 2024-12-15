<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PostLikeSearch extends PostLike
{
    public $post_id;
    public $user_id;

    public function rules()
    {
        return [
            [['post_id', 'user_id'], 'integer'], // 确保字段是整数类型
            [['id'], 'safe'], // 其他字段
        ];
    }

    public function search($params)
    {
        $query = PostLike::find();

        // 加载查询参数并应用过滤条件
        $this->load($params);

        // 如果没有加载参数，返回数据提供器
        if (!$this->validate()) {
            return new ActiveDataProvider([
                'query' => $query,
            ]);
        }

        // 根据查询条件添加过滤
        $query->andFilterWhere(['post_id' => $this->post_id])
              ->andFilterWhere(['user_id' => $this->user_id]);

        return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}

<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class CommentSearch extends Comment
{
    public function rules()
    {
        return [
            [['id', 'post_id', 'user_id'], 'integer'],
            [['content'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Comment::find();

        // 需要给搜索模型加载参数
        $this->load($params);

        // 过滤条件
        if (!$this->validate()) {
            return new ActiveDataProvider([
                'query' => $query,
            ]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'content', $this->content]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20, // 每页显示的条数
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC, // 默认按照创建时间降序排序
                ],
            ],
        ]);
    }
}

<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class CommentLikeSearch extends CommentLike
{
    public function rules()
    {
        return [
            [['comment_id', 'user_id'], 'integer'],
        ];
    }

    public function search($params)
    {
        $query = CommentLike::find();

        // 需要给搜索模型加载参数
        $this->load($params);

        // 过滤条件
        if (!$this->validate()) {
            return new ActiveDataProvider([
                'query' => $query,
            ]);
        }

        $query->andFilterWhere([
            'comment_id' => $this->comment_id,
            'user_id' => $this->user_id,
        ]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20, // 每页显示的条数
            ],
            'sort' => [
                'defaultOrder' => [
                    'comment_id' => SORT_ASC, // 默认按照评论ID升序排序
                ],
            ],
        ]);
    }
}

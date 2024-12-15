<?php
// controllers/CommentController.php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Comment;
use app\models\CommentLike;
use yii\web\NotFoundHttpException;

class CommentController extends Controller
{
    public function actionLike($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', '请先登录');
            return $this->redirect(['site/login']);
        }

        $comment = Comment::findOne($id);
        if ($comment === null) {
            throw new NotFoundHttpException('评论不存在');
        }

        $userId = Yii::$app->user->id;
        $existingLike = CommentLike::findOne([
            'comment_id' => $id,
            'user_id' => $userId,
        ]);

        if ($existingLike) {
            $existingLike->delete();
            Yii::$app->session->setFlash('success', '取消点赞成功');
        } else {
            $like = new CommentLike();
            $like->comment_id = $id;
            $like->user_id = $userId;
            $like->save();
            Yii::$app->session->setFlash('success', '点赞成功');
        }

        // 返回到帖子详情页
        return $this->redirect(['post/detail', 'id' => $comment->post_id]);
    }
}
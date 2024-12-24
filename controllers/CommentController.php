<?php
// controllers/CommentController.php
// controllers/CommentController.php
// 注释：该控制器用于处理与评论相关的操作，包括点赞和取消点赞功能。
// 如果用户未登录，将重定向到登录页面；
// 若评论不存在，将抛出404错误；
// 用户可以对评论进行点赞或取消点赞，操作后会返回到相应的帖子详情页，并显示操作结果的提示信息。
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
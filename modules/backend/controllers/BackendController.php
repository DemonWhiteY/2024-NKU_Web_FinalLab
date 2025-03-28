<?php

namespace app\modules\backend\controllers;

use yii\web\Controller;
use app\models\User;

use app\models\Post;
use app\models\PostLike;
use app\models\Comment;
use app\models\CommentLike;
use app\models\Feedback;
use yii\web\NotFoundHttpException;
/**
 * Default controller for the `backend` module
 */
class BackendController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'adamin';

        // 统计用户总数
        $totalUsers = User::find()->count();

        $totalPosts = Post::find()->count();
        // 统计点赞总数
        $totalPostLikes = PostLike::find()->count();
        // 统计文章总数
        $totalComments = Comment::find()->count();
        // 统计点赞总数
        $totalCommentLikes = CommentLike::find()->count();

        $totalFeedbacks = FeedBack::find()->count();

        // 渲染 index 视图，并传递 totalUsers 变量
        return $this->render('index', [
            'totalUsers' => $totalUsers,  // 用户总数
            'totalPosts' => $totalPosts,  // 文章总数
            'totalPostLikes' => $totalPostLikes,  // 点赞总数
            'totalComments' => $totalComments,  // 评论总数
            'totalCommentLikes' => $totalCommentLikes,  // 点赞总数
            'totalFeedbacks' => $totalFeedbacks,  // 反馈总数
        ]);
    }

    /**
     * 团队作业页面
     * @return string
     */
    public function actionHomework()
    {
        $this->layout = 'adamin';  // 使用后台管理布局
        return $this->render('homework');  // 渲染 user-management 视图
    }

    public function actionDownloadFile($type, $fileName)
    {
        // 定义根目录，根据类型切换路径
        $basePath = \Yii::getAlias('@app') . '/data/';
        if ($type === 'team') {
            $filePath = $basePath . 'team/' . $fileName;
        } elseif ($type === 'personal') {
            $filePath = $basePath . 'personal/' . $fileName;
        } else {
            throw new \yii\web\BadRequestHttpException('Invalid file type!');
        }

        // 检查文件是否存在
        if (!file_exists($filePath)) {
            throw new \yii\web\NotFoundHttpException('File not found!');
        }

        // 返回文件响应
        return \Yii::$app->response->sendFile($filePath, $fileName);
    }



}

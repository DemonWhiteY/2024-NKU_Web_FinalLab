<?php
namespace app\controllers;

use Yii;
use app\models\Comment;
use yii\web\Controller;
use app\models\Post;
use app\models\PostLike;
use yii\web\Response;

class PostController extends Controller
{
    // 显示列表
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->orderBy(['create_at' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 10, // 每页显示10条
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    // 创建新记录
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', '添加成功！');
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionDetail($id)
    {
        $post = Post::findOne($id);
        if ($post === null) {
            throw new NotFoundHttpException('帖子不存在');
        }
    
        // 创建新的评论模型
        $comment = new Comment();
        
        // 处理评论提交
        if ($comment->load(Yii::$app->request->post())) {
            $comment->post_id = $id;
            $comment->user_id = Yii::$app->user->id;
            if ($comment->save()) {
                Yii::$app->session->setFlash('success', '评论成功！');
                return $this->refresh();
            }
        }
    
        // 获取这个帖子的所有评论
        $comments = Comment::find()
            ->where(['post_id' => $id])
            ->with(['user'])  // 预加载用户信息
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
    
        return $this->render('detail', [
            'post' => $post,
            'newComment' => $comment,
            'comments' => $comments,
        ]);
    }

    public function actionLike($id)
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('error', '请先登录');
            return $this->redirect(['site/login']);
        }
    
        $post = Post::findOne($id);
        if ($post === null) {
            throw new NotFoundHttpException('帖子不存在');
        }
    
        $userId = Yii::$app->user->id;
        $existingLike = PostLike::findOne([
            'post_id' => $id,
            'user_id' => $userId,
        ]);
    
        if ($existingLike) {
            $existingLike->delete();
            Yii::$app->session->setFlash('success', '取消点赞成功');
        } else {
            $like = new PostLike();
            $like->post_id = $id;
            $like->user_id = $userId;
            $like->save();
            Yii::$app->session->setFlash('success', '点赞成功');
        }
    
        return $this->redirect(['post/detail', 'id' => $id]);
    }
}
<?php
namespace app\controllers;
/**
 * PostController类负责处理与帖子相关的操作，包括帖子列表的显示、帖子的创建、查看帖子详情及评论功能，以及用户对帖子的点赞和取消点赞功能。
 *
 * 该控制器主要功能如下：
 * 1. actionIndex()：显示所有帖子列表，采用分页方式，每页显示10条帖子，按照创建时间降序排列，便于用户快速浏览最新的帖子。
 * 2. actionCreate()：处理新帖子的创建。通过表单提交的数据来创建新的帖子，并在成功后给予用户成功的提示，同时重定向回帖子列表页面。
 * 3. actionDetail($id)：处理查看指定帖子的详细信息，包括显示帖子内容及其评论。此方法首先查找对应ID的帖子，如果帖子不存在则抛出404异常。同时，允许用户在帖子下发表评论，并在评论成功后刷新页面以显示最新的评论。
 * 4. actionLike($id)：处理用户对帖子的点赞功能。首先检查用户是否已登录，如果未登录则重定向至登录页面。然后查找指定ID的帖子，并检查用户是否已对该帖子进行过点赞。如果已点赞，则执行取消点赞操作，否则执行点赞操作。操作成功后，给予相应的提示信息。
 *
 * 该控制器使用Yii框架提供的功能，包括模型的操作、会话管理及视图渲染等，以实现MVC架构中的控制器逻辑。此外，使用了ActiveDataProvider来支持数据的分页功能，提升用户体验。
 *
 * 本控制器提供了用户交互所需的基本功能，为用户提供友好的帖子管理界面，用户可以方便地创建、查看、评论及点赞帖子，从而增强用户参与感和互动性。
 */

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
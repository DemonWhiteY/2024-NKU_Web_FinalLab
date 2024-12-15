<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">团队主页后台</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start Team Authors Row -->
            <div class="row mt-5">
                <!-- 团队作者：胡进喆 -->
                <!-- 团队作者：胡进喆 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <!-- 使用 Yii 路径来引用图像 -->
                                <div class="avatar-sm">
                                    <img src="<?= Yii::getAlias('@web/static/picture/hjz.jpg') ?>" alt="胡进喆" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">胡进喆</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- 团队作者：闫恒瑞 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm">
                                    <img src="<?= Yii::getAlias('@web/static/picture/yhr.jpg') ?>" alt="闫恒瑞" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">闫恒瑞</h5>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 团队作者：张明昆 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm">
                                    <img src="<?= Yii::getAlias('@web/static/picture/zmk.jpg') ?>" alt="张明昆" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">张明昆</h5>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 团队作者：王博 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover bg-danger text-white">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="avatar-sm">
                                    <img src="<?= Yii::getAlias('@web/static/picture/wb.jpg') ?>" class="img-fluid rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-0">王博</h5>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Team Authors Row -->

            <!-- Stats Row -->
            <div class="row">
                <!-- 用户总人数显示卡片 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">当前用户总人数</p>
                                    <h4 class="mb-2"><?= $totalUsers ?></h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i> Stable
                                        </span>Compared to previous period
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-primary text-white rounded-3">
                                        <i class="ri-user-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 网站总帖子量卡片 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">网站总帖子量</p>
                                    <h4 class="mb-2"><?= $totalPosts ?></h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i> Stable
                                        </span>Compared to previous period
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-success text-white rounded-3">
                                        <i class="mdi mdi-forum font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 帖子总点赞量卡片 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">帖子总点赞量</p>
                                    <h4 class="mb-2"><?= $totalPostLikes ?></h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i> Stable
                                        </span>Compared to previous period
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-warning text-white rounded-3">
                                        <i class="mdi mdi-thumb-up font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 网站总评论量卡片 -->
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">网站总评论量</p>
                                    <h4 class="mb-2"><?= $totalComments ?></h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i> Stable
                                        </span>Compared to previous period
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-info text-white rounded-3">
                                        <i class="mdi mdi-comment-text-outline font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Stats Row -->

            <!-- 评论总点赞量卡片 -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-muted mb-2">评论总点赞量</p>
                                    <h4 class="mb-2"><?= $totalCommentLikes ?></h4>
                                    <p class="text-muted mb-0">
                                        <span class="text-success fw-bold font-size-12 me-2">
                                            <i class="ri-arrow-right-up-line me-1 align-middle"></i> Stable
                                        </span>Compared to previous period
                                    </p>
                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-danger text-white rounded-3">
                                        <i class="mdi mdi-thumb-up font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end container-fluid -->
    </div> <!-- end page-content -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2022. Company name All rights reserved.
                    <a target="_blank" href="https://sc.chinaz.com/moban/">Website Templates</a>
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div> <!-- End Main Content -->

<!-- Parallax Background -->
<div class="parallax"></div>

<!-- Dynamic Background Style -->
<style>
body {
    background: linear-gradient(135deg, #6e7e8e, #3c4f65);
    background-attachment: fixed;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.card-hover {
    transition: transform 0.3s ease-in-out;
}

.card-hover:hover {
    transform: translateY(-10px);
}

.page-title-box {
    border-bottom: 2px solid #f1f1f1;
    margin-bottom: 20px;
    padding-bottom: 10px;
}

.card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    background-color: #fff;
}

.card-body {
    padding: 20px;
}

.avatar-title {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 48px;
    width: 48px;
}

.text-muted {
    color: #6c757d;
}

.text-truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.footer {
    background-color: #f8f9fa;
    padding: 10px 0;
}
</style>

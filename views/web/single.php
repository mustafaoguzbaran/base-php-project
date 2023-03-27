<?php
?>
<?php use Mobar\Models\Category;
use Mobar\Models\Comments;
use Mobar\Models\Posts;

require "views/layouts/header.php"; ?>
<?php
$fetchPostContentData = new Posts();
$categoryName = new Category();
$commentProcess = new Comments()

?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $fetchPostContentData->fetchPostContentData('post_title'); ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $fetchPostContentData->fetchPostContentData('post_created_time') ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light"
                       href="#!"><?php echo $categoryName->fetchCategoryDataId($fetchPostContentData->fetchPostContentData('post_category')); ?></a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded"
                                          src="<?php echo $fetchPostContentData->fetchPostContentData('post_img') ?>"
                                          alt="..."/></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?php echo $fetchPostContentData->fetchPostContentData('post_content') ?></p>

                </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="postdetail?post_id=<?php echo $fetchPostContentData->fetchPostContentData('post_id') ?>" method="post">
                            <textarea name="comment_detail" class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                            <button type="submit" style="margin: 10px" name="push_comment" class="btn btn-primary">Push Comment</button>
                        </form>

<?php foreach($commentProcess->fetchComment() as $value){ ?>

                                <div class="fw-bold"><?php echo $value['commenter_name'] ?></div>
                              <?php echo $value['comment_detail'] ?>

<?php } ?>




                    </div>
                </div>
            </section>
        </div>
<?php $commentProcess->pushComment(); ?>
        <?php require_once "views/layouts/sidebar.php"; ?>
        <?php require_once "views/layouts/footer.php"; ?>

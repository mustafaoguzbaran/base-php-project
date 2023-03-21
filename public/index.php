<?php


use Mobar\Models\Posts;

require_once "views/layouts/header.php";



$host = $_SERVER['HTTP_HOST'];
$protocol = isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? "https" : "http";
$postData = new Posts();
?>
    <!-- Page content-->
    <div class="container">
    <div class="row">
    <!-- Blog entries-->
    <div class="col-lg-8">
        <!-- Featured blog post-->
        <?php

        $fetchData = $postData->fetchPostAllData();

        foreach($fetchData as $value){
            ?>
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="<?php echo $value['post_img'] ?>"
                                  alt="..."/></a>
                <div class="card-body">
                    <div class="small text-muted"><?php echo $value['post_created_time'] ?></div>
                    <div class="small text-muted"><?php echo $value['post_category'] ?></div>
                    <h2 class="card-title"><?php echo $value['post_title'] ?></h2>
                    <p class="card-text"><?php echo $value['post_desc'] ?></p>
                    <a class="btn btn-primary"
                       href="postdetail?post_id=<?php echo $value['post_id'] ?>">Read more →</a>
                </div>
            </div>
        <?php } ?>
        <!-- Nested row for non-featured blog posts-->

        <!-- Pagination-->
        <nav aria-label="Pagination">
            <hr class="my-0"/>
            <ul class="pagination justify-content-center my-4">
                <?php $sayici = 1; while($sayici <= $postData->counter()) { ?>
                    <li class="page-item" aria-current="page"><a class="page-link" href="anasayfa?=<?php echo $sayici; ?>"><?php echo $sayici; ?></a></li>
                <?php $sayici += 1; } ?>
            </ul>
        </nav>
    </div>

<?php require_once "views/layouts/sidebar.php" ?>
<?php echo $postData->counter() ?>
<?php require_once "views/layouts/footer.php"; ?>
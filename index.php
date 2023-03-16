<?php

require "vendor/autoload.php";

require_once "src/web/ui/header.php";

use Mobar\Models\Posts;

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
                           href="single.php?post_id=<?php echo $value['post_id'] ?>">Read more →</a>
                    </div>
                </div>
            <?php } ?>
            <!-- Nested row for non-featured blog posts-->

            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0"/>
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <?php require_once "src/web/ui/sidebar.php"; ?>

        <?php require_once "src/web/ui/footer.php"; ?>



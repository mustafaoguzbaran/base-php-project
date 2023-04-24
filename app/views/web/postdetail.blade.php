@include('layouts.header')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo $post['post_title'] ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2"><?php echo $post['post_created_time'] ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light"
                       href="#!"><?php echo $post['post_category'] ?></a>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded"
                                          src="<?php echo $post['post_img'] ?>"
                                          alt="..."/></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?php echo $post['post_content'] ?></p>

                </section>
            </article>
            <!-- Comments section-->
            <section class="mb-5">
                <div class="card bg-light">
                    <div class="card-body">
                        <!-- Comment form-->
                        <form class="mb-4" action="postdetail?post_id=<?php echo $post['post_id'] ?>" method="post">
                            <input name="commenter_name" class="form-control" placeholder="Name Surname">
                            <textarea name="comment_detail" class="form-control" rows="3"
                                      placeholder="Join the discussion and leave a comment!"></textarea>
                            <button type="submit" style="margin: 10px" name="push_comment" class="btn btn-primary">Push
                                Comment
                            </button>
                        </form>

                    </div>
                </div>
            </section>
        </div>
@include('layouts.sidebar')
@include('layouts.footer')

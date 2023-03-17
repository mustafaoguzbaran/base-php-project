<?php use Mobar\Models\Posts;

require_once "header.php";
$fetchData = new Posts();
$fetchData ->deletePostData();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <center>
            <table style="text-align: center; margin: 250px">
                <tr>
                    <th>Post Title</th>
                    <th>Post Created Time</th>
                    <th>Post Desc</th>
                    <th>Post Category</th>
                    <th>Operations</th>
                </tr>
<?php
foreach($fetchData->fetchPostAllData() as $value){
?>
                <tr>
                    <td><?php echo $value['post_title'] ?></td>
                    <td><?php echo $value['post_created_time'] ?></td>
                    <td><?php echo $value['post_desc'] ?></td>
                    <td><?php echo $value['post_category'] ?></td>
                    <td><a href="<?php $_SERVER['PHP_SELF'] ?>?post_id=<?php echo $value['post_id'] ?>"><button type="button">Delete</button></a>
                    <a href="post_update.php?post_id=<?php echo $value['post_id'] ?>"><button type="button">Update</button></a>

                    </td>

                </tr>
                <?php } ?>
            </table>
            </center>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>

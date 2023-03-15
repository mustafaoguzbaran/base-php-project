<?php require_once "header.php"; ?>
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
$sorgu = $conn ->prepare("SELECT * FROM posts");
$sorgu -> execute();
while($veriCek = $sorgu -> fetch(PDO::FETCH_ASSOC)){
?>
                <tr>
                    <td><?php echo $veriCek['post_title'] ?></td>
                    <td><?php echo $veriCek['post_created_time'] ?></td>
                    <td><?php echo $veriCek['post_desc'] ?></td>
                    <td><?php echo $veriCek['post_category'] ?></td>
                    <td><a href="../../config/post_delete.php?post_id=<?php echo $veriCek['post_id'] ?>"><button type="button">Delete</button></a>
                    <a href="post_update.php?post_id=<?php echo $veriCek['post_id'] ?>"><button type="button">Update</button></a>

                    </td>

                </tr>
                <?php } ?>
            </table>
            </center>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>

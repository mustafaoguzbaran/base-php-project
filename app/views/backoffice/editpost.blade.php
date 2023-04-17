@include('layouts.header')
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
                    foreach($editPost as $value){
                        ?>
                    <tr>
                        <td><?php echo $value['post_title'] ?></td>
                        <td><?php echo $value['post_created_time'] ?></td>
                        <td><?php echo $value['post_desc'] ?></td>
                        <td><?php echo $value['post_category'] ?></td>
                        <td><a href="/backoffice/deletepost/<?php echo $value['post_id'] ?>"><button type="button">Delete</button></a>
                            <a href="postupdate/<?php echo $value['post_id'] ?>"><button type="button">Update</button></a>

                        </td>

                    </tr>
                    <?php } ?>
                </table>
            </center>
        </div>
    </div>
</div>
@include('layouts.footer')
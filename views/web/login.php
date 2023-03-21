<?php

use Mobar\Models\User;

require_once "views/layouts/header.php";
$check = new User();
if(isset($_SESSION['username']) == null){?>
    <div class="container" style="padding: 210px">
        <form method="post" action="logincheck">
            <div class="form-group">
                <label>Nick Name</label>
                <input type="text" name="username_login" class="form-control">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password_login" class="form-control" >
            </div>
            <button type="submit" style="margin: 10px" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>
    <?php $check->login() ?>
    <?php require "views/layouts/footer.php"; ?>
<?php }else{
    Header("Location: anasayfa");
}
?>

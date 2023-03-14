<?php
require_once "header.php";
?>
<div class="container" style="padding: 210px">
    <form method="post" action="../../config/sitesettings.php">
        <div class="form-group">
            <label>Logo İsmi</label>
            <input type="text" name="logo" value="<?php echo $headerSettingsVeriCek['logo']; ?>" class="form-control">
        </div>
        <div class="form-group">
            <label>Site Header Title</label>
            <input type="text" name="site_header_title" value="<?php echo $headerSettingsVeriCek['header_title'] ?>" class="form-control" >
        </div>
        <div class="form-group">
            <label>Site Header Desc</label>
            <input type="text" name="site_header_desc" value="<?php echo $headerSettingsVeriCek['header_desc'] ?>" class="form-control" >
        </div>
        <button type="submit" style="margin: 10px" name="update-site" class="btn btn-primary">Siteyi Güncelle</button>
    </form>
</div>

<?php
require_once "footer.php";
?>



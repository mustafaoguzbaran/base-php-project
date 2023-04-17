@include('layouts.header')
<div class="container" style="padding: 210px">
    <form method="post" action="updatesettings">
        <div class="form-group">
            <label>Logo İsmi</label>
            <input type="text" name="logo" value="<?php echo $settings['logo'] ?> " class="form-control">
        </div>
        <div class="form-group">
            <label>Site Header Title</label>
            <input type="text" name="site_header_title" value="<?php echo $settings['header_title'] ?>" class="form-control" >
        </div>
        <div class="form-group">
            <label>Site Header Desc</label>
            <input type="text" name="site_header_desc" value="<?php echo $settings['header_desc'] ?>" class="form-control" >
        </div>
        <div class="form-group">
            <label>Side Title</label>
            <input type="text" name="side_title" value="<?php echo $settings['side_title'] ?>" class="form-control" >
        </div>
        <div class="form-group">
            <label>Side Desc</label>
            <input type="text" name="side_desc" value="<?php echo $settings['side_desc'] ?>" class="form-control" >
        </div>
        <button type="submit" style="margin: 10px" name="update-site" class="btn btn-primary">Siteyi Güncelle</button>
    </form>
</div>
@include('layouts.footer')

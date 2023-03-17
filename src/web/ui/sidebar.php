<?php use Mobar\Models\Category;
use Mobar\Models\Settings;

$fetchSideCategoryData = new Category();
$fetchSideSettingData = new Settings();
?>
<!-- Side widgets-->
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
            </div>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <ul class="list-unstyled mb-0 d-flex flex-wrap">
                        <?php
                        foreach($fetchSideCategoryData->fetchCategoryData() as $value) {
                            ?>
                        <li class="w-50"><?php echo $value['category_name']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header"><?php echo $fetchSideSettingData->settingsFetch('side_title') ?></div>
        <div class="card-body"><?php echo $fetchSideSettingData->settingsFetch('side_desc') ?></div>
    </div>
</div>
</div>
</div>
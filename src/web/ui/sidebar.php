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
                        $sorgu = $conn -> prepare("SELECT * FROM categories");
                        $sorgu ->execute();
                        while($veriCek = $sorgu -> fetch(PDO::FETCH_ASSOC)) {
                            ?>
                        <li class="w-50"><?php echo $veriCek['category_name']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <?php
    $sorgu = $conn -> prepare("SELECT * FROM headersettings");
    $sorgu -> execute();
    $veriCek = $sorgu ->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="card mb-4">
        <div class="card-header"><?php echo $veriCek['side_title'] ?></div>
        <div class="card-body"><?php echo $veriCek['side_desc'] ?></div>
    </div>
</div>
</div>
</div>
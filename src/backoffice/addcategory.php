<?php
require_once "header.php";
?>
    <form style="margin: 100px" method="post" action="../../config/category_insert.php">
    <div class="form-group">
        <label>Kategori Ekle</label>
        <input type="text" name="add_category" class="form-control">
    </div>
    <button type="submit" style="margin: 10px" name="insert-category" class="btn btn-primary">Kategori Ekle</button>
    </form>
<div class="container">
    <center>
<h4>Eklenen Kategoriler</h4>
<ul>
    <?php
    $sorgu = $conn -> prepare("SELECT * FROM categories");
    $sorgu -> execute();
    while($veriCek = $sorgu -> fetch(PDO::FETCH_ASSOC)) { ?>
    <li style="list-style-type: none" ><?php echo $veriCek['category_name'] ?></li>
    <?php } ?>
</ul>
    </center>
</div>
<?php  require_once "footer.php"; ?>
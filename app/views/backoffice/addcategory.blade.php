@include('layouts.header')
<form style="margin: 100px" method="post" action="addcategory">
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
            foreach($fetchCategory as $value){
                ?>
            <li style="list-style-type: none" ><?php echo $value['category_name'] ?></li>
            <?php } ?>
        </ul>
    </center>
</div>
@include('layouts.footer')
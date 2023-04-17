@include("layouts.header")
<style>
    .form-group{
        padding: 20px;
    }
</style>
<form style="margin: 100px" method="post" action="/backoffice/postupdate/<?php echo $postUpdate['post_id'] ?>" enctype="multipart/form-data">
    <div class="form-group">
        <label>Post Title</label>
        <input type="text" name="post_title" class="form-control" value="<?php echo $postUpdate['post_title'] ?>">
    </div>
    <div class="form-group">
        <label>Post Desc</label>
        <input type="text" name="post_desc" class="form-control" value="<?php echo $postUpdate['post_desc'] ?>" >
    </div>
    <div class="form-group">
        <input type="hidden" name="post_id" class="form-control" value="<?php echo $postUpdate['post_id'] ?>" >
    </div>
    <div class="form-group">
        <label>Post Image</label>
        <input type="file" name="post_img" class="form-control">
        <img src ="<?php echo $postUpdate['post_img'] ?>" width="300px" height="150px" >
    </div>
    <div class="form-group">
        <label>Categories</label>
        <select name="post_category">
            <?php foreach($categoryFetch as $value) { ?>
            <option value="<?php echo $value['id'] ?>"><?php echo $value['category_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <tinymce-editor
            placeholder = "Test"
            name="post_content"
            api-key="wxsa7u6ldphduiuqwpcg31qi3x13h2f2on9c0b5pz2mzziji"
            height="500"
            menubar="false"
            plugins="advlist autolink lists link image charmap preview anchor
        searchreplace visualblocks code fullscreen
        insertdatetime media table code help wordcount"
            toolbar="undo redo | blocks | bold italic backcolor |
        alignleft aligncenter alignright alignjustify |
        bullist numlist outdent indent | removeformat | help"
            content_style="body
      {
        font-family:Helvetica,Arial,sans-serif;
        font-size:14px
      }"
    >
        <?php echo $postUpdate['post_content'] ?>

    </tinymce-editor>
    <!--
      Sourcing the `tinymce-webcomponent` from jsDelivr,
      which sources TinyMCE from the Tiny Cloud.
    -->
    <button type="submit" style="margin: 10px" name="post_update" class="btn btn-primary">Postu Gönder</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-webcomponent@2/dist/tinymce-webcomponent.min.js"></script>

@include("layouts.footer")
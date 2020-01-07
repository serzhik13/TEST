<form method="post" class="form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$post['id'] ?? ''?>">
    <input type="hidden" name="csrf" value="<?=$_SESSION['csrf']?>">
    <div class="form-group">
        <label for="title">Title:</label>
        <input name="title" type="text" class="form-control" id="title" value="<?=$post['title'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <input name="description" type="text" class="form-control" id="description" value="<?=$post['description'] ?? ''?>">
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" class="form-control" id="content"><?=$post['content'] ?? ''?></textarea>
    </div>
    <div>
        <label for="image">Image:</label>
        <input type="file" name="image">
<!-- <input type="file" name="image[]" multiple>-->
    </div>
    <button class="btn btn-success" type="submit">Save</button>
</form>

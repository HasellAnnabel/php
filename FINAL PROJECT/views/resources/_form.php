<?php
    // Convert resource object into form_fields associative array ONLY if form_fields are not set
    $form_fields = $form_fields ?? [];
    if (count($form_fields) === 0 && isset($resource)) $form_fields = (array) $resource;
?>

<form action="<?= ROOT_PATH ?>/resources/<?= $action ?>" method="post">
    <div class="form-group my-3">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="<?= isset($form_fields["title"]) ?? null ?>">
    </div>

    <div class="form-group my-3">
        <label for="author">Author</label>
        <input type="text" name="author" class="form-control" value="<?= isset($form_fields["author"]) ?? null ?>">
    </div>

    <div class="form-group my-3">
        <label for="isbn">ISBN</label>
        <input type="text" name="isbn" class="form-control" value="<?= isset($form_fields["isbn"]) ?? null ?>">
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
    
</form>
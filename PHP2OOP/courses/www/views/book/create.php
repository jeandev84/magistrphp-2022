<?php if (isset($messages)): ?>
  <?php foreach ($messages as $message):
     $type = $message['type'];
     $text = $message['text'];
  ?>
    <div class="alert alert-<?= $type ?>" role="alert">
        <?= $text ?>
    </div>
  <?php endforeach; ?>
<?php endif; ?>

<form action="/book/create" method="POST">
    <div class="mb-3">
        <label for="title">Название</label>
        <input type="text"  class="form-control" name="title" id="title" value="<?= $bookName ?>">
    </div>
    <div class="mb-3">
        <label for="price">Цена</label>
        <input type="text"  class="form-control" name="price" id="price" value="<?= $bookPrice ?>">
    </div>
    <div class="mb-3">
        <input  class="btn btn-primary mb-3" type="submit">
    </div>
</form>
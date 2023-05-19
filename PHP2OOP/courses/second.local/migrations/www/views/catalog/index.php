<div class="catalog-card d-flex flex-wrap">
     <?php foreach ($books as $idBook => $book):
        $title = $book->title;
        $price = $book->price;
     ?>

     <?php include(__DIR__.'/../../views/book/card.php'); ?>

     <?php endforeach; ?>
</div>
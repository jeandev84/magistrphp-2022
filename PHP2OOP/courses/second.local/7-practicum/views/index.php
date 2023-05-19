<?php
/** @var $titlePage */
/** @var \App\Entity\Book\Book[] $books */
?>
<?php include 'top.php'; ?>
    <h1><?= $titlePage ?></h1>

    <div class="catalog-card d-flex flex-wrap">
    <?php
     foreach($books as $idBook => $book):
        $title = $book->title;
        $price = $book->price;
    ?>
    <?php include 'bookCard.php'; ?>
    <?php endforeach; ?>
    </div>

<?php include 'bottom.php'; ?>
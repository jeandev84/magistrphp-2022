<?php include 'top.php'; ?>
    <h1><?= $titlePage ?></h1>

    <div class="col-md-6 col-lg-6 order-md-last">
        <ul class="list-group mb-3">
          <?php

            $amount = 0;
            
            if(is_array($books))
            foreach($books as $book):
              $amount +=  $book['qty'] * $book['price'];
          ?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0"><?= $book['title']?></h6>
              <small class="text-muted">описание книги 1</small>
            </div>
            <span class="text-muted"><?= $book['qty'] ?>шт. x <?= $book['price']?> руб</span>
            <span class="text-muted"><?= $book['qty'] * $book['price']?> руб</span>
            <a href="/deletefrombasket?id=<?= $book['id']?>" class="btn btn-primary btn-sm" type="submit">Удалить</a>
          </li>
          <?php
          endforeach;
          ?>

          <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Книга 2</h6>              
              <small class="text-muted">описание книги 2</small>
            </div>
            <span class="text-muted">2шт. x 1000 руб</span>
            <span class="text-muted">2000 руб</span>
            <div>
            <a href="/deletefrombasket?id=<?= $idbook?>" class="btn btn-primary btn-sm" type="submit">Удалить</a>
            </div>
          </li> -->


          <li class="list-group-item d-flex justify-content-between">
            <span>Всего</span>
            <strong><?= $amount; ?> руб.</strong>
          </li>
        </ul>

        <form class="card p-2">
          <a href="/order" class="w-100 btn btn-primary btn-lg" type="submit">Оформить заказ</a>
        </form>
      </div>
<?php include 'bottom.php'; ?>
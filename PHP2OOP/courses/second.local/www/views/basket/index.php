<div class="col-md-6 col-lg-6 order-md-last">
    <?php if (! empty($books)): ?>
        <ul class="list-group mb-3">
            <?php

            $amount = 0;

            if (is_array($books) && ! empty($books))

                foreach ($books as $book):
                    $amount += $book['qty'] * $book['price'];
                    ?>

                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">Книга <?= $book['title'] ?></h6>
                            <small class="text-muted">описание книги 1</small>
                        </div>
                        <span class="text-muted"><?= $book['qty'] ?>шт. x <?= $book['price'] ?> руб</span>
                        <span class="text-muted"><?= $book['qty'] * $book['price'] ?> руб</span>
                        <div>
                            <a href="/basket/delete?id=<?= $book['id'] ?>" class="btn btn-primary btn-sm" type="submit">Удалить</a>
                        </div>
                    </li>

                <?php endforeach; ?>



            <!-- <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">Книга 2</h6>
                  <small class="text-muted">описание книги 2</small>
                </div>
                <span class="text-muted">2шт. x 1000 руб</span>
                <span class="text-muted">2000 руб</span>
                <div>
                <a href="/basket/delete?id=1" class="btn btn-primary btn-sm" type="submit">Удалить</a>
                </div>
              </li> -->


            <li class="list-group-item d-flex justify-content-between">
                <span>Всего</span>
                <strong><?= $amount ?> руб.</strong>
            </li>
        </ul>

        <form class="card p-2">
            <a href="/order" class="w-100 btn btn-primary btn-lg" type="submit">Оформить заказ</a>
        </form>

    <?php else: ?>
      <div class="card">
          <div class="card-body">Корзина пусто!</div>
      </div>
    <?php endif; ?>
</div>
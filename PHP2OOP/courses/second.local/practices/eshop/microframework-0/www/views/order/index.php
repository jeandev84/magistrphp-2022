<?= $title ?>
<form action="/order" method="POST">
    <div class="mb-3">
        <label for="name" >Имя и фамилия</label>
        <input type="text"  class="form-control" name="name" id="name" value="">
    </div>
    <div class="mb-3">
        <label for="address" >Адрес</label>
        <input type="text"  class="form-control" name="address" id="address" value="">
    </div>
    <div class="mb-3">
        <label for="email" >Email</label>
        <input type="text"  class="form-control" name="email" id="email" value="">
    </div>
    <div class="mb-3">
        <label for="phone" >Номер телефона</label>
        <input type="text"  class="form-control" name="phone" id="phone" value="">
    </div>

    <div class="row gy-3">
        <div class="col-md-6">
            <label for="cc-name" class="form-label">Имя на карте</label>
            <input type="text" class="form-control" name="cc-name" id="cc-name" placeholder="" required="" value="">
            <small class="text-muted">Полное имя с карты</small>
            <div class="invalid-feedback">
                Должно быть заполнено имя с карты
            </div>
        </div>

        <div class="col-md-6">
            <label for="cc-number" class="form-label">Номер карты</label>
            <input type="text" class="form-control"  name="cc-number" id="cc-number" placeholder="" required="" value="">
            <div class="invalid-feedback">
                Должен быть заполнен номер карты
            </div>
        </div>

        <div class="col-md-3">
            <label for="cc-expiration" class="form-label">Срок действия</label>
            <input type="text" class="form-control"  name="cc-expiration" id="cc-expiration" placeholder="" required="" value="">
            <div class="invalid-feedback">
                Должен быть заполнен срок действия карты
            </div>
        </div>

        <div class="col-md-3">
            <label for="cc-cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" name="cc-cvv" id="cc-cvv" placeholder="" required="" value="">
            <div class="invalid-feedback">
                Должен быть заполнен CVV-код
            </div>
        </div>
    </div>


    <div class="mt-3">
        <input  class="btn btn-primary mb-3" type="submit">
    </div>

</form>
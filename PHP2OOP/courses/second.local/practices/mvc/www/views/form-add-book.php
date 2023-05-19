<?php
/** @var string $title */
/** @var string $message */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

 <h1><?= $title ?></h1>
 <?php if ($message): ?>
    <?= $message?>
 <?php endif; ?>
 <form action="/?action=addbook" method="POST">
     <div>
         <input type="text" name="title">
     </div>
     <div>
         <input type="text" name="price">
     </div>
     <div>
         <input type="submit" value="Создать">
     </div>
 </form>
</body>
</html>
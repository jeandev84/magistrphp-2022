<?php

//исходный массив
$weeks = [
  'Понедельник', 
  'Вторник', 
  'Среда', 
  'Четверг', 
  'Пятница', 
  'Суббота', 
  'Воскресение', 
];

?>


<?php
#вариант 1

echo "<select>";
echo "<option value=0>", $weeks[0];
echo "<option value=1>", $weeks[1];
echo "<option value=2>", $weeks[2];
echo "<option value=3>", $weeks[3];
echo "</select>";
echo "<hr/>";

?>

<?php
#вариант 2

$my = "<select>";
$my .= "<option value=0>" . $weeks[0];
$my .= "<option value=1>" . $weeks[1];
$my .= "<option value=2>" . $weeks[2];
$my .= "<option value=3>" . $weeks[3];
$my .= "</select>";
echo $my .= "<hr/>";

?>


<!-- вариант 3 -->
<select>
  <option value=<?= 0 ?> ><?= $weeks[0] ?>
  <option value=<?= 1 ?> ><?= $weeks[1] ?>
  <option value=<?= 2 ?> ><?= $weeks[2] ?>
  <option value=<?= 3 ?> ><?= $weeks[3] ?>
</select>
<hr />

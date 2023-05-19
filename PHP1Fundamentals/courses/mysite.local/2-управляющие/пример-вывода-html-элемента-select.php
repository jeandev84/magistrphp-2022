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
for($i = 0, $length = count($weeks); $i < $length; $i++ )
  echo "<option value=$i>", $weeks[$i];
echo "</select>";
echo "<hr/>";

?>

<?php
#вариант 2

$i = 0;
$my = "<select>";
while( $i < count($weeks) ){
  $my .= "<option value=$i>" . $weeks[$i];
  $i++;
}
$my .= "</select>";
echo $my .= "<hr/>";

?>


<!-- вариант 3 -->
<select>
  <?php foreach($weeks as $k => $v): ?>
  <option value=<?= $k ?> ><?= $v ?>
  <?php endforeach; ?>
</select>
<hr />

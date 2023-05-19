<?php

$elements = [
  "name",
  "age",
  "salary",
];
sort($elements);
$salt = "#43hdgJHgjhd_=-=*&&*(^3";
$secret = md5('form - protection' . implode(",", $elements));

$arr = array_keys($_POST);
unset($arr[3]);

sort($arr);

if( $_SERVER["REQUEST_METHOD"] == "POST")
if( md5('form - protection '. implode(",", $arr)) == "df634dec22da74d38c979976e757b459" ){
	echo "Форма под контролем - все поля на месте";
} else 
	echo "В форме были изменены поля";


echo "<form method=POST >";
foreach($elements as $element){
	echo "<input name=$element ><br>"	;
}
echo "<input type=hidden name=secret value=$secret  >";
echo "<input type=submit >";
echo "</form>"
?>


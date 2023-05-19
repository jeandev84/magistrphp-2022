<style>
  * {
     font-family: sans-serif;
  }
  td{
   padding: 5px 10px
  }
</style>
<?php

define("WEEKS",6);
define("DAY_WEEKS",7);
   

$year = 2020;

for($month = 1; $month <= 12; $month++){

$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
setlocale(LC_ALL, 'rus' );

$months = [ 1=>"Январь", "Февраль", "Март",
   "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь",
   "Октябрь", "Ноябрь", "Декабрь" ];

echo '<table class="table">';
echo '<caption><h4>', $months[$month] , ' ', $year ,'</h4></caption>';

$i = 0;

$k = 1 - (getdate(mktime(0,0,0,$month,1,$year))['wday'] + 6) % 7;
while($i < WEEKS){
 echo "<tr>";
 $j = 0;
    while($j < DAY_WEEKS ){
     echo "<td>";
     if ($k > 0 && $k < 32) echo $k;
      $k++; 
      $j++;
     }
  $i++;
}
echo '</table><br />';

}
?>
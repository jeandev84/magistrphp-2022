<?php

define("WEEKS",6);
define("DAY_WEEKS",7);
   
//  echo "<pre>", print_r(getdate(mktime(0,0,0,$month,1,$year))),"</pre>";
$date = getdate(time());
$month = (int) $date['mon']; 

// $month += 2;
$year = (int) $date['year'];
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
setlocale(LC_ALL, 'rus' );

$months = [ 1=>"Январь", "Февраль", "Март",
   "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь",
   "Октябрь", "Ноябрь", "Декабрь" ];

echo '<table class="table">';
echo '<caption>', $months[$month] , ' ', $year ,'</caption>';

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
echo '</table>';
?>
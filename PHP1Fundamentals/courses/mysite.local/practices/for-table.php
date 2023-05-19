<?php

// Ввести таблицу
// 1 2 3 4 .. 10
// 2 4 6 8 .. 20

echo '<table border="1">';
for ($i = 1; $i <= 10; $i++) {
    echo '<tr>';
    for ($j = 1; $j <= 10; $j++) {
        echo '<td>';
        echo $i * $j;
        echo '</td>';
    }
    echo '<tr>';
}

echo '</table>';

?>

<!--
<table>
    <tr>
        <td>1x1</td>
        <td>1x2</td>
        <td>1x3</td>
    </tr>
    <tr>
        <td>2x1</td>
        <td>2x2</td>
        <td>2x3</td>
    </tr>
    <tr>
        <td>3x1</td>
        <td>3x2</td>
        <td>3x3</td>
    </tr>

    ...
</table>
-->


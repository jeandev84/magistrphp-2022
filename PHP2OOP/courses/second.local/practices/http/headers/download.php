<?php

header('Content-Disposition: attachment; filename="price.html"'); // Указание на загрузку

echo "<h1>Прайс</h1>";

for ($i = 0; $i < 10; $i++) {
    echo "<div>Товар$i: ", 100 * $i,"</div>";
}
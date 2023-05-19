<?php

// Перезапрос ресурса через 5 сек на другой адресс /product.php?id=123
header("Refresh:5; url=product.php?id=123");

print_r($_GET);
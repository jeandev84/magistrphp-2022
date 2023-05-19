<?php

// Типы фильтров
// https://www.php.net/manual/ru/filter.filters.php

$search_html = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
$search_url = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_ENCODED);
echo "Вы искали $search_html.\n";
echo "<a href='?search=$search_url'>Искать снова.</a>";
?>
<?php

# https://www.php.net/manual/en/function.stream-context-create.php
# https://www.php.net/manual/en/function.file-get-contents.php

/*
$opts = array(
    'http'=>array(
        'method'=>"GET",
        'header'=>"Accept-language: en\r\n" .
            "Cookie: foo=bar\r\n"
    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://www.example.com/', false, $context);
*/


// Create a stream
$opts = array(
    'http'=>array(
        'method'=>"POST",
        'header'=>"Accept-language: en\r\n" . "Cookie: foo=bar\r\n",
        'content' => json_encode(['test' => 'qwerty'])
    )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
// echo $file = file_get_contents('http://localhost:8000/psr7.php', false, $context);

?>

<form action="psr7.php" method="POST">
    <input type="submit" name="test" value="query">
</form>

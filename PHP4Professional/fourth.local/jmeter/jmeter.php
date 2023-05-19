<?php

echo 'Привет, мир!';
file_put_contents('var/log/logs.log', date('H:i:s')."|". json_encode($_GET). "\n", FILE_APPEND);
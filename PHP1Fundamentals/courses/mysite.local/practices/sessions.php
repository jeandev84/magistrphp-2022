<?php

session_start();

// Счетик
$_SESSION['counter']++;

echo $_SESSION['counter'], '<hr />';
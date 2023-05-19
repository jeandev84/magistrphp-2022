<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     move_uploaded_file($_FILES["demo"]["tmp_name"], __DIR__ . '/upload/' . $_FILES["demo"]["name"]);
}
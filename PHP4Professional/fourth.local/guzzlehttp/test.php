<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header('Content-Type: application/json');
    $input = json_decode(file_get_contents('php://input'), true);
    $input['mystest'] = 'Hello:)';
    echo json_encode($input);
    die;
}
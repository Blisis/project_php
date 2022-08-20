<?php
require_once "Global/db.php";
require_once "Global/functii.php";
$database = Database::getInstatnta();

$token = $_GET['token'];

if (checkActivationToken($token, $database)) {
    header('Location: /Proiect/?message=success');
}

echo "Token invalid!";
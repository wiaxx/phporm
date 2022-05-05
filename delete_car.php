<?php
require_once 'DB.php';
$db = new DB();

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    die('Invalid request');
}
$id = isset($_GET['id']) ? $_GET['id'] : null;

$success = $db->delete_car($id);

if($success) {
    header('Location: /sites/car-orm/index.php');
} else {
    echo 'what happend?';
}

<?php
require_once 'DB.php';
require_once 'Bil.php';

$db = new DB();
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = isset($_POST['make']) ? $_POST['make'] : '';
    $model = isset($_POST['model']) ? $_POST['model'] : '';

    $car = new Bil(0, $make, $model);
    $success = $db->update_car($id, $car);

    if($success) {
        header('Location: /sites/car-orm/index.php');
    } else {
        echo 'Something went wrong..';
    }
}

<?php
require_once 'DB.php';
require_once 'Bil.php';

$db = new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $make = isset($_POST['make']) ? $_POST['make'] : '';
    $model = isset($_POST['model']) ? $_POST['model'] : '';

    $car = new Bil(0, $make, $model);
    $db->create_car($car);
}

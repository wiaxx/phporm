<?php
require_once 'DB.php';
$db = new DB();

$id = isset($_GET['id']) ? $_GET['id'] : null;

$car = $db->get_car_by_id($id);
?>

<?php include './templates/header.php' ?>

<div class="car">
    <h1><?= $car ?></h1>
    <p>
        <b>Make:</b>
        <?= $car->make ?>
    </p>
    <p>
        <b>Model:</b>
        <?= $car->model ?>
    </p>
    <form action="delete_car.php?id=<?= $car->id ?>" method="post">
        <input type="submit" value="Delete">
    </form>

    <form action="update_car.php?id=<?= $car->id ?>" method="post" id="savechanges">
        <input type="text" name="make" placeholder="<?= $car->make ?>">
        <input type="text" name="model" placeholder="<?= $car->model ?>">
        <input type="submit" value="Save changes">
    </form>
</div>

<?php include './templates/footer.php' ?>
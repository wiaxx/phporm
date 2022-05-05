<?php require_once './templates/header.php'; ?>
<!-- main content starts here -->
<div class="car-input">
    <h2>Create a new car</h2>
    <form action="" method="post">
        <label for="make">Make:</label>
        <input type="text" name="make" placeholder="Make">
        <label for="model">Model:</label>
        <input type="text" name="model" placeholder="Model">
        <input type="submit" value="Create">
    </form>
</div>

<div class="car-list">
    <h2>List of cars</h2>
    <?php include './templates/create_car.php' ?>
    <?php $cars = $db->get_cars();
    foreach ($cars as $car) {
        echo "<li>
                <a href='car.php?id={$car->id}'>
                {$car}
                </a>
            </li>";
    }
    ?>
</div>
<!-- main content ends here -->
<?php require_once './templates/footer.php' ?>
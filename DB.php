<?php
require_once './Bil.php';

class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = 'root';
    private $db = 'carhusen';

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->conn) {
            die('Connection failed..');
        }
    }

    public function create_car(Bil $car)
    {

        $query = 'INSERT INTO cars (make, model) VALUES (?,?)';
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('ss', $car->make, $car->model);
        $success = $stmt->execute();

        return $success;
    }

    public function get_cars()
    {
        $query = 'SELECT * FROM cars';
        $result = mysqli_query($this->conn, $query);
        $db_cars = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $all_cars = [];

        foreach ($db_cars as $db_car) {
            $db_car_id = $db_car['id'];
            $db_car_make = $db_car['make'];
            $db_car_model = $db_car['model'];

            $car = new Bil($db_car_id, $db_car_make, $db_car_model);
            $all_cars[] = $car;
        }
        return $all_cars;
    }

    public function get_car_by_id($id)
    {
        $query = 'SELECT * FROM cars WHERE id = ?';
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $car = mysqli_fetch_assoc($result);

        $db_car_id = $car['id'];
        $db_car_make = $car['make'];
        $db_car_model = $car['model'];

        $car_by_id = new Bil($db_car_id, $db_car_make, $db_car_model);

        return $car_by_id;
    }

    public function update_car($id, Bil $car)
    {
        $query = 'UPDATE cars SET make = ?, model = ? WHERE id = ?';
        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('ssi', $car->make, $car->model, $id);
        $result = $stmt->execute();

        return $result;
    }

    public function delete_car($id)
    {
        $query = "DELETE FROM cars WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);
        $stmt->bind_param('i', $id);
        $success = $stmt->execute();

        return $success;
    }
}

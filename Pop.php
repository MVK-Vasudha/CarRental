
<?php

if(isset($_POST['start_date']) && isset($_POST['end_date']) && isset($_POST['car_type']) && isset($_POST['car_count'])){
    $startDate = $_POST['start_date'];
    $endDate = $_POST['end_date'];
    $carType = $_POST['car_type'];
    $carCount = $_POST['car_count'];

    $mysqli = new mysqli("localhost", "root", "", "db1");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $query = "SELECT Car_Cost FROM cars WHERE Car_Type = '$carType'";
    $stmt = $mysqli->query($query);
    $row=$stmt->fetch_assoc();
    $row=$row['Car_Cost'];

    if($stmt->num_rows > 0) {
        $startDateObj = new DateTime($startDate);
        $endDateObj = new DateTime($endDate);
        $interval = $startDateObj->diff($endDateObj);
        $numberOfDays = $interval->days;

        $totalCost = $row * $numberOfDays * $carCount;
        echo "<p>Total Cost: $totalCost</p>";
    } else {
        echo "<p>No data found for the selected car type.</p>";
    }

    $stmt->close();
    $mysqli->close();
} else {
    echo "<p>Invalid request.</p>";
}
?>

<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empid = $_POST['empid'];
    $pwd = $_POST['pwd'];

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "employeedb";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "SELECT * FROM employees WHERE empid = '$empid' AND pwd = '$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['empid'] = $empid;
        $_SESSION['name'] = $row['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid employee ID or password.Try again";
        echo "$error";
       
    }

    $conn->close();
}
?>
<?php
session_start();
// if (isset($_SESSION['employeeId'])) {
//     header("Location: dashboard.php");
//     exit();
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $empid = $_POST['empid'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "employeedb";

    
    $conn = new mysqli($servername, $username, $password_db, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    if ($pwd !== $cpwd) {
        $error = "Passwords do not match";
        echo $error;
    } else {
        $sql = "INSERT INTO employees (name, empid, pwd) VALUES ('$name', '$empid', '$pwd')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['name']=$name;
            header("Location: index.html");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    }

    $conn->close();
}
?>
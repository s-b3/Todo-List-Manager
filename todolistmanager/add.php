<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="styles.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .add-task-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .add-task-container h2 {
            text-align: center;
        }

        .add-task-form {
            display: flex;
            flex-direction: column;
        }

        .add-task-form label {
            margin-bottom: 8px;
        }

        .add-task-form input[type="text"],
        .add-task-form input[type="date"],
        .add-task-form textarea {
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .add-task-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-task-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="add-task-container">
        <h2>Add Task</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="add-task-form">
            <label for="taskTitle">Emp ID:</label>
            <input type="text" id="empid" name="empid" required>

            <label for="taskTitle">Task Title:</label>
            <input type="text" id="taskTitle" name="taskTitle" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit" name="submit">Add Task</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $empid=$_POST['empid'];
        $taskTitle = $_POST['taskTitle'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "employeedb";

        $conn = new mysqli($servername, $username, $password_db, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO tasks (empid,title,date,description) VALUES ('$empid','$taskTitle', '$date', '$description')";

        if ($conn->query($sql) === TRUE) {
       
            echo "<center><p>Task added successfully!</p><center>";
            
        } else {
            echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
        }

        $conn->close();
    }
    ?>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Delete Task</title>
    
    <link rel="stylesheet" href="style.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .delete-task-container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .delete-task-form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input[type="text"] {
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #ff6347;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff4837;
        }
    </style>
</head>

<body>
    <div class="delete-task-container">
        <h2>Delete Task</h2>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "employeedb"; 

        
        $conn = new mysqli($servername, $username, $password_db, $dbname);

       
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
           
            $taskId = $_POST['taskId'];
            $sql_delete = "DELETE FROM tasks WHERE slno='$taskId'";

            if ($conn->query($sql_delete) === TRUE) {
                echo '<p>Task deleted successfully!</p>';
           
            } else {
                echo '<p>Error deleting task: ' . $conn->error . '</p>';
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="delete-task-form">
            <label for="taskId">Enter Task ID to Delete:</label>
            <input type="text" id="taskId" name="taskId" required>
            <button type="submit" name="delete">Delete Task</button>
        </form>
    </div>
</body>

</html>

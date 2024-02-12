<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update Task</title>
  
    <link rel="stylesheet" href="styles.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .update-task-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .update-task-container h2 {
            text-align: center;
        }

        .update-task-form {
            display: flex;
            flex-direction: column;
        }

        .update-task-form label {
            margin-bottom: 8px;
        }

        .update-task-form input[type="text"],
        .update-task-form input[type="date"],
        .update-task-form textarea {
            padding: 8px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .update-task-form button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .update-task-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="update-task-container">
        <h2>Update Task</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="update-task-form">
        <label for="taskTitle">Task Number:</label>
                    <input type="text" name="taskId">

                    <label for="taskTitle">Task Title:</label>
                    <input type="text" id="taskTitle" name="taskTitle" required>

                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required></textarea>

                    <button type="submit" name="submit">Update Task</button>
                </form>
        <?php
       
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "employeedb";

        
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
          
            $taskId = $_POST['taskId'];

            
            $sql_select = "SELECT * FROM tasks WHERE id = '$taskId'";
            $result = $conn->query($sql_select);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
                
        <?php
            } else {
                echo 'Task not found!';
            }
        }

        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
          
            $taskId = $_POST['taskId'];
            $taskTitle = $_POST['taskTitle'];
            $date = $_POST['date'];
            $description = $_POST['description'];

           
            $sql_update = "UPDATE tasks SET title='$taskTitle', date='$date', description='$description' WHERE slno='$taskId'";

            if ($conn->query($sql_update) === TRUE) {
                echo '<p>Task updated successfully!</p>';
               
            } else {
                echo '<p>Error updating task: ' . $conn->error . '</p>';
            }
        }

        $conn->close();
        ?>
    </div>
</body>

</html>

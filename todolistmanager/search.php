<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Tasks</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .search-tasks-container {
            max-width: 600px;
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

        .search-tasks-form {
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
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #f9f9f9;
            margin-bottom: 5px;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="search-tasks-container">
        <h2>Search Tasks</h2>
        <?php
        
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "employeedb"; 

       
        $conn = new mysqli($servername, $username, $password_db, $dbname);

      
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
            
            $keyword = $_POST['keyword'];

          
            $sql_search = "SELECT * FROM tasks WHERE title LIKE '%$keyword%' OR description LIKE '%$keyword%'";
            $result = $conn->query($sql_search);

            if ($result && $result->num_rows > 0) {
                echo '<h3>Search Results:</h3>';
                echo '<ul>';
                while ($row = $result->fetch_assoc()) {
                    echo '<li>Task ID: ' . $row['slno'] . ' - Task Title: ' . $row['title'] . ' - Date: ' . $row['date'] . '</li>';
                                    }
                echo '</ul>';
            } else {
                echo '<p>No tasks found matching your search.</p>';
            }
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="search-tasks-form">
            <label for="keyword">Search by Keyword:</label>
            <input type="text" id="keyword" name="keyword" required>
            <button type="submit" name="search">Search</button>
        </form>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
      
        .dashboard-container {
            padding-top: 20px;
            text-align: center;
            margin-top: 50px;
        }
        .options{
            padding-top: 20px;
        }
        .options ul {
            list-style-type: none;
            padding: 0;
        }

        .options li {
            margin-bottom: 20px;
        }

        .options li a {
            display: block;
            width: 300px;
            padding: 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 18px;
            transition: background-color 5s ease;
        }

        .options li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h1>Welcome to your dashboard, <?php session_start(); echo $_SESSION['name']; ?>!</h1>
        <center> <div class="options">
            <ul>
                <li><a href="add.php">Add a New Task</a></li>
                <li><a href="update.php">Update Your Tasks</a></li>
                <li><a href="delete.php">Delete a Task</a></li>
                <li><a href="search.php">Search Tasks</a></li>
            </ul>
        </div></center>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>

</html>

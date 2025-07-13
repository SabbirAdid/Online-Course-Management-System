<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // default username for localhost
$password = "";     // default password is empty
$dbname = "OCMS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role_id = $_POST["role_id"];
    $role_name = $_POST["role_name"];
    $role_desc = $_POST["role_desc"];

    $sql = "INSERT INTO Role (Role_id, Role_Name, Role_desc)
            VALUES ('$role_id', '$role_name', '$role_desc')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>New role inserted successfully.</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Role - OCMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            padding: 50px;
        }

        .form-container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px #aaa;
            max-width: 400px;
            margin: auto;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Create New Role</h2>
    <form method="POST" action="">
        <label for="role_id">Role ID:</label>
        <input type="text" name="role_id" id="role_id" required>

        <label for="role_name">Role Name:</label>
        <input type="text" name="role_name" id="role_name" required>

        <label for="role_desc">Role Description:</label>
        <textarea name="role_desc" id="role_desc" rows="4" required></textarea>

        <input type="submit" value="Create Role">
    </form>
</div>

</body>
</html>

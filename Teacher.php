<?php
// insert_teacher.php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "OCMS";

// Create connection
$con = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tid = $_POST["tid"];
    $name = $_POST["name"];
    $designation = $_POST["designation"];
    $salary = $_POST["salary"];
    $phone = $_POST["phone"];

    $sql = "INSERT INTO Teacher (T_ID, NAME, DESIGNATION, SALARY, PHONE) 
            VALUES ('$tid', '$name', '$designation', '$salary', '$phone')";

    if (mysqli_query($con, $sql)) {
        echo "New teacher added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Teacher</title>
</head>
<body>
    <h2>Insert New Teacher</h2>
    <form method="post" action="">
        <label>Teacher ID:</label>
        <input type="text" name="tid" required><br><br>

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Designation:</label>
        <input type="text" name="designation" required><br><br>

        <label>Salary:</label>
        <input type="number" step="0.01" name="salary" required><br><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br><br>

        <input type="submit" value="Insert">
    </form>
</body>
</html>

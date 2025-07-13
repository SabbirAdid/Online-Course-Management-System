<!DOCTYPE html>
<html>
<head>
    <title>Insert Student Data</title>
</head>
<body>
    <h2>Insert Student Information</h2>
    <form method="POST" action="">
        Student ID: <input type="text" name="S_ID" required><br><br>
        Name: <input type="text" name="NAME" required><br><br>
        Age: <input type="number" name="Age" required><br><br>
        Phone: <input type="text" name="Phone" required><br><br>
        Email: <input type="email" name="Email" required><br><br>
        Address: <input type="text" name="Address" required><br><br>
        <input type="submit" name="submit" value="Insert Student">
    </form>

<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "OCMS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $S_ID = $_POST['S_ID'];
    $NAME = $_POST['NAME'];
    $Age = $_POST['Age'];
    $Phone = $_POST['Phone'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];

    $sql = "INSERT INTO Student (S_ID, NAME, Age, Phone, Email, Address)
            VALUES ('$S_ID', '$NAME', '$Age', '$Phone', '$Email', '$Address')";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green;'>Student record inserted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $conn->close();
}
?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Department Data</title>
</head>
<body>
    <h2>Insert Department Information</h2>
    <form method="POST" action="">
        Department ID (D_ID): <input type="text" name="D_ID" required><br><br>
        Department Name: <input type="text" name="Name" required><br><br>
        Student ID (S_ID): <input type="text" name="S_ID" required><br><br>
        Teacher ID (T_ID): <input type="text" name="T_ID" required><br><br>
        <input type="submit" name="submit" value="Insert Department">
    </form>

<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "OCMS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $D_ID = $_POST['D_ID'];
    $Name = $_POST['Name'];
    $S_ID = $_POST['S_ID'];
    $T_ID = $_POST['T_ID'];

    // Check if Teacher ID exists
    $check_teacher = $conn->query("SELECT * FROM Teacher WHERE T_ID = '$T_ID'");

    if ($check_teacher->num_rows == 0) {
        echo "<p style='color:red;'>Error: Teacher ID $T_ID does not exist. Please insert a valid Teacher first.</p>";
    } else {
        // Now insert into Department
        $sql = "INSERT INTO Department (D_ID, Name, S_ID, T_ID)
                VALUES ('$D_ID', '$Name', '$S_ID', '$T_ID')";

        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Department inserted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error inserting department: " . $conn->error . "</p>";
        }
    }

    $conn->close();
}
?>
</body>
</html>

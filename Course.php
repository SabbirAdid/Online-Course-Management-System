<!DOCTYPE html>
<html>
<head>
    <title>Insert Course Data</title>
</head>
<body>
    <h2>Insert Course Information</h2>
    <form method="POST" action="">
        Course ID (C_ID): <input type="text" name="C_ID" required><br><br>
        Course Name: <input type="text" name="NAME" required><br><br>
        Course Code: <input type="text" name="CODE" required><br><br>
        Department ID (D_ID): <input type="text" name="D_ID" required><br><br>
        Teacher ID (T_ID): <input type="text" name="T_ID" required><br><br>
        Student ID (S_ID): <input type="text" name="S_ID" required><br><br>
        <input type="submit" name="submit" value="Insert Course">
    </form>

<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "root", "", "OCMS");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $C_ID = $_POST['C_ID'];
    $NAME = $_POST['NAME'];
    $CODE = $_POST['CODE'];
    $D_ID = $_POST['D_ID'];
    $T_ID = $_POST['T_ID'];
    $S_ID = $_POST['S_ID'];

    // Check if foreign keys exist
    $check_department = $conn->query("SELECT * FROM Department WHERE D_ID = '$D_ID'");
    $check_teacher = $conn->query("SELECT * FROM Teacher WHERE T_ID = '$T_ID'");
    $check_student = $conn->query("SELECT * FROM Student WHERE S_ID = '$S_ID'");

    if ($check_department->num_rows == 0) {
        echo "<p style='color:red;'>Error: Department ID $D_ID does not exist.</p>";
    } elseif ($check_teacher->num_rows == 0) {
        echo "<p style='color:red;'>Error: Teacher ID $T_ID does not exist.</p>";
    } elseif ($check_student->num_rows == 0) {
        echo "<p style='color:red;'>Error: Student ID $S_ID does not exist.</p>";
    } else {
        $sql = "INSERT INTO Course (C_ID, NAME, CODE, D_ID, T_ID, S_ID)
                VALUES ('$C_ID', '$NAME', '$CODE', '$D_ID', '$T_ID', '$S_ID')";
        if ($conn->query($sql) === TRUE) {
            echo "<p style='color:green;'>Course inserted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error inserting course: " . $conn->error . "</p>";
        }
    }

    $conn->close();
}
?>
</body>
</html>

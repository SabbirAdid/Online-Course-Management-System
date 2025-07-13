<!DOCTYPE html>
<html>
<head>
    <title>Insert Result</title>
</head>
<body>
    <h2>Insert Result Data</h2>
    <form method="POST" action="">
        <label for="result_id">Result ID:</label>
        <input type="text" name="result_id" required><br><br>

        <label for="mark_id">Mark ID:</label>
        <input type="text" name="mark_id" required><br><br>

        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required><br><br>

        <label for="teacher_id">Teacher ID:</label>
        <input type="text" name="teacher_id" required><br><br>

        <input type="submit" name="submit" value="Insert Result">
    </form>

<?php
if (isset($_POST['submit'])) {
    // DB connection variables
    $host = "localhost";
    $user = "root";           // use your MySQL username
    $password = "";           // use your MySQL password
    $dbname = "OCMS";

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect form data
    $result_id = $_POST['result_id'];
    $mark_id = $_POST['mark_id'];
    $student_id = $_POST['student_id'];
    $teacher_id = $_POST['teacher_id'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Result (Result_Id, Mark_ID, S_ID, T_ID) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $result_id, $mark_id, $student_id, $teacher_id);

    // Execute and check
    if ($stmt->execute()) {
        echo "<p style='color:green;'>Result inserted successfully.</p>";
    } else {
        echo "<p style='color:red;'>Error inserting result: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>

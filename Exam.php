<?php
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exam_id = $_POST['exam_id'];
    $course_id = $_POST['course_id'];
    $total_marks = $_POST['total_marks'];
    $student_id = $_POST['student_id'];

    $sql = "INSERT INTO Exam (Exam_ID, Course_ID, Total_marks, S_ID)
            VALUES ('$exam_id', '$course_id', '$total_marks', '$student_id')";

    if (mysqli_query($con, $sql)) {
        echo "<p style='color: green;'>New exam inserted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . mysqli_error($con) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Exam</title>
</head>
<body>
    <h2>Insert Exam Data</h2>
    <form method="POST" action="">
        <label>Exam ID:</label><br>
        <input type="text" name="exam_id" required><br><br>

        <label>Course ID:</label><br>
        <input type="text" name="course_id" required><br><br>

        <label>Total Marks:</label><br>
        <input type="number" name="total_marks" required><br><br>

        <label>Student ID:</label><br>
        <input type="text" name="student_id" required><br><br>

        <input type="submit" value="Insert Exam">
    </form>
</body>
</html>

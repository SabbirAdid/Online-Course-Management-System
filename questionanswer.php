<!DOCTYPE html>
<html>
<head>
    <title>Insert QuestionAnswer</title>
</head>
<body>
    <h2>Insert QuestionAnswer Record</h2>
    <form method="POST" action="">
        <label>QA ID:</label><br>
        <input type="text" name="qa_id" required><br><br>

        <label>Question Text:</label><br>
        <textarea name="question_text" rows="3" cols="40" required></textarea><br><br>

        <label>Answer Text:</label><br>
        <textarea name="answer_text" rows="3" cols="40" required></textarea><br><br>

        <label>Exam ID:</label><br>
        <input type="text" name="exam_id" required><br><br>

        <label>Teacher ID (T_ID):</label><br>
        <input type="text" name="t_id" required><br><br>

        <label>Student ID (S_ID):</label><br>
        <input type="text" name="s_id" required><br><br>

        <label>Type:</label><br>
        <input type="text" name="types" required><br><br>

        <input type="submit" name="submit" value="Insert QuestionAnswer">
    </form>

<?php
if (isset($_POST['submit'])) {
    // Database credentials
    $host = 'localhost';
    $user = 'root'; // Change if needed
    $password = ''; // Change if needed
    $dbname = 'OCMS';

    // Create connection
    $conn = new mysqli($host, $user, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form values
    $qa_id = $_POST['qa_id'];
    $question_text = $_POST['question_text'];
    $answer_text = $_POST['answer_text'];
    $exam_id = $_POST['exam_id'];
    $t_id = $_POST['t_id'];
    $s_id = $_POST['s_id'];
    $types = $_POST['types'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO QuestionAnswer (QA_ID, Question_Text, Answer_Text, Exam_ID, T_ID, S_ID, Types) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $qa_id, $question_text, $answer_text, $exam_id, $t_id, $s_id, $types);

    // Execute and check
    if ($stmt->execute()) {
        echo "<p style='color: green;'>Record inserted successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>

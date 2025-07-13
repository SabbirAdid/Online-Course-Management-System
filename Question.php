<!DOCTYPE html>
<html>
<head>
    <title>Insert Question | OCMS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f2f2f2;
        }
        form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Insert New Question</h2>

<form method="POST" action="">
    <label>Question ID:</label>
    <input type="text" name="question_id" required>

    <label>Question Text:</label>
    <textarea name="question_text" required></textarea>

    <label>Marks:</label>
    <input type="number" name="marks" required>

    <label>Exam ID:</label>
    <input type="text" name="exam_id" required>

    <label>Teacher ID (T_ID):</label>
    <input type="text" name="t_id" required>

    <label>Question Type:</label>
    <select name="types" required>
        <option value="MCQ">MCQ</option>
        <option value="Theory">Theory</option>
        <option value="Practical">Practical</option>
    </select>

    <button type="submit" name="submit">Insert Question</button>
</form>

<?php
if (isset($_POST['submit'])) {
    // Connect to database
    $conn = new mysqli("localhost", "root", "", "OCMS");

    // Check connection
    if ($conn->connect_error) {
        die("<p class='message' style='color:red;'>Connection failed: " . $conn->connect_error . "</p>");
    }

    // Collect and sanitize form data
    $question_id = $conn->real_escape_string($_POST['question_id']);
    $question_text = $conn->real_escape_string($_POST['question_text']);
    $marks = (int) $_POST['marks'];
    $exam_id = $conn->real_escape_string($_POST['exam_id']);
    $t_id = $conn->real_escape_string($_POST['t_id']);
    $types = $conn->real_escape_string($_POST['types']);

    // Check if 'Types' column exists
    $check_column = $conn->query("SHOW COLUMNS FROM Question LIKE 'Types'");
    if ($check_column->num_rows === 0) {
        // Add the column dynamically if it doesn't exist
        $conn->query("ALTER TABLE Question ADD COLUMN Types VARCHAR(50)");
    }

    // Insert data into Question table
    $sql = "INSERT INTO Question (Question_Id, Question_Text, Marks, Exam_Id, T_ID, Types)
            VALUES ('$question_id', '$question_text', $marks, '$exam_id', '$t_id', '$types')";

    if ($conn->query($sql) === TRUE) {
        echo "<p class='message' style='color:green;'>Question inserted successfully!</p>";
    } else {
        echo "<p class='message' style='color:red;'>Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

</body>
</html>

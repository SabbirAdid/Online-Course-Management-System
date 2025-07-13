<!DOCTYPE html>
<html>
<head>
    <title>Insert Marks - OCMS</title>
</head>
<body>
    <h2>Insert Marks Record</h2>
    <form method="POST" action="">
        <label for="mark_id">Mark ID:</label><br>
        <input type="text" name="mark_id" required><br><br>

        <label for="t_id">Teacher ID (T_ID):</label><br>
        <input type="text" name="t_id" required><br><br>

        <label for="s_id">Student ID (S_ID):</label><br>
        <input type="text" name="s_id" required><br><br>

        <label for="qa_id">QuestionAnswer ID (QA_ID):</label><br>
        <input type="text" name="qa_id" required><br><br>

        <input type="submit" name="submit" value="Insert">
    </form>

    <?php
    // PHP block to insert data
    if (isset($_POST['submit'])) {
        $host = "localhost";
        $user = "root"; // change if different
        $password = ""; // change if your MySQL password is set
        $dbname = "OCMS";

        $conn = new mysqli($host, $user, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $mark_id = $_POST['mark_id'];
        $t_id = $_POST['t_id'];
        $s_id = $_POST['s_id'];
        $qa_id = $_POST['qa_id'];

        $sql = "INSERT INTO Marks (Mark_ID, T_ID, S_ID, QA_ID)
                VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $mark_id, $t_id, $s_id, $qa_id);

        if ($stmt->execute()) {
            echo "<p style='color:green;'>Record inserted successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>

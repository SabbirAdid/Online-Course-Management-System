<?php
echo "<!DOCTYPE html>
<html>
<head>
    <title>Main Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
        }
        a {
            text-decoration: none;
            color: #0066cc;
            font-size: 18px;
        }
        a:hover {
            color: #ff6600;
        }
    </style>
</head>
<body>
    <h1>📚 Welcome To Admin Panel</h1>
    <ul>
        <li><a href='student.php' target='_blank'>Student</a></li>
        <li><a href='teacher.php' target='_blank'>Teacher</a></li>
        <li><a href='course.php' target='_blank'>Course</a></li>
        <li><a href='department.php' target='_blank'>Department</a></li>
        <li><a href='exam.php' target='_blank'>Exam</a></li>
        <li><a href='question.php' target='_blank'>Question</a></li>
        <li><a href='questionanswer.php' target='_blank'>QuestionAnswer</a></li>
        <li><a href='marks.php' target='_blank'>Marks</a></li>
        <li><a href='result.php' target='_blank'>Result</a></li>
        <li><a href='role.php' target='_blank'>Role</a></li>
    </ul>
</body>
</html>";
?>

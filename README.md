
# Online Course Management System (OCMS)

## Overview
The **Online Course Management System (OCMS)** is a web-based system designed to manage courses, exams, student data, and results. It provides functionality for students, teachers, and administrators to manage various aspects of an online course environment. The system is developed using PHP for the backend and is organized into multiple modules to handle different aspects of course management.

## Features
- **Course Management**: Allows the creation and management of courses.
- **Department Management**: Manage and assign courses to different departments.
- **Exam Management**: Enables creating, managing, and taking exams.
- **Student Management**: Track student data and performance.
- **Result Management**: Allows generation and management of student results.
- **Role Management**: Define and manage user roles (admin, teacher, student).

## File Structure
The project is organized into several PHP files, each handling a specific functionality of the course management system.

### Key Files:
- `Course.php`: Handles course-related operations (create, update, delete).
- `Department.php`: Manages departments and their associated courses.
- `Exam.php`: Manages exam creation, scheduling, and evaluation.
- `marks.php`: Handles storing and updating student marks.
- `Question.php`: Manages exam questions.
- `questionanswer.php`: Handles question and answer data for exams.
- `result.php`: Generates and displays student results.
- `role.php`: Manages user roles and permissions.
- `student.php`: Manages student information and enrollment.
- `Teacher.php`: Manages teacher-related tasks and information.
- `mainmenu.php`: The main menu, providing access to all features.
- `dbcon.php`: Database connection file, used for connecting to the database.

## Requirements
To run this project locally, ensure you have the following:
- PHP 7.x or higher
- MySQL or any relational database
- A web server like Apache or Nginx

### Steps to Run:
1. **Set up the environment**:
   - Install PHP and MySQL on your machine or use a local server like XAMPP or WAMP.
   - Import the database schema (if provided) into MySQL.

2. **Configure the database connection**:
   - Modify the `dbcon.php` file with your database credentials.

3. **Access the application**:
   - Place the project folder in the web server's root directory.
   - Access the application through the browser by navigating to the local server address (e.g., `http://localhost/ocms/`).

## License
This project is open-source and free to use under the MIT License.

## Acknowledgments
- PHP for backend scripting.
- MySQL for database management.
- Web development community for providing useful resources.

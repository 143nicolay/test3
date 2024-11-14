<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student details from the database
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    $student = $result->fetch_assoc();

    if (!$student) {
        echo "Student not found!";
        exit;
    }

    // Update record after form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $course_section = $_POST['course_section'];

        $update_sql = "UPDATE students SET first_name='$first_name', middle_name='$middle_name', 
                       last_name='$last_name', age='$age', address='$address', course_section='$course_section' 
                       WHERE id=$id";

        if ($conn->query($update_sql) === TRUE) {
            header('Location: index.php'); // Redirect to index page after update
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>
        <form method="POST">
            <label>First Name:</label>
            <input type="text" name="first_name" value="<?= $student['first_name']; ?>" required>

            <label>Middle Name:</label>
            <input type="text" name="middle_name" value="<?= $student['middle_name']; ?>">

            <label>Last Name:</label>
            <input type="text" name="last_name" value="<?= $student['last_name']; ?>" required>

            <label>Age:</label>
            <input type="number" name="age" value="<?= $student['age']; ?>" required>

            <label>Address:</label>
            <textarea name="address" required><?= $student['address']; ?></textarea>

            <label>Course Section:</label>
            <input type="text" name="course_section" value="<?= $student['course_section']; ?>" required>

            <button type="submit" class="btn">Update Student</button>
        </form>
        <a href="index.php" class="btn">Back to List</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>

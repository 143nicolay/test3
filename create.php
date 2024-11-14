<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture form data
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    // Insert data into the database
    $sql = "INSERT INTO students (first_name, middle_name, last_name, age, address, course_section) 
            VALUES ('$first_name', '$middle_name', '$last_name', '$age', '$address', '$course_section')";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect to index page after successful insert
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Create New Student</h1>
        <form method="POST">
            <label>First Name:</label>
            <input type="text" name="first_name" required>

            <label>Middle Name:</label>
            <input type="text" name="middle_name">

            <label>Last Name:</label>
            <input type="text" name="last_name" required>

            <label>Age:</label>
            <input type="number" name="age" required>

            <label>Address:</label>
            <textarea name="address" required></textarea>

            <label>Course Section:</label>
            <input type="text" name="course_section" required>

            <button type="submit" class="btn">Create Student</button>
        </form>
        <a href="index.php" class="btn">Back to List</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>

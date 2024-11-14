<?php
include('db.php');

// Fetch records from the database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>CRUD Application - Students</h1>
        <a href="create.php" class="btn">Add New Student</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Course Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['first_name']; ?></td>
                        <td><?= $row['middle_name']; ?></td>
                        <td><?= $row['last_name']; ?></td>
                        <td><?= $row['age']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td><?= $row['course_section']; ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id']; ?>" class="btn">Edit</a>
                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div

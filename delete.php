<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student from the database
    $sql = "DELETE FROM students WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect after deletion
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
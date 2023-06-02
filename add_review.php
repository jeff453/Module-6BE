<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Insert review into database
    $sql = "INSERT INTO reviews (name, comment, created_at) VALUES ('$name', '$comment', NOW())";
    if ($conn->query($sql) === true) {
        echo "Review added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

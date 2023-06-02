<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve review ID
    $reviewId = $_POST['review_id'];

    // Delete review from the database
    $sql = "DELETE FROM reviews WHERE id=$reviewId";
    if ($conn->query($sql) === true) {
        echo "Review deleted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

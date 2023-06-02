<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $reviewId = $_POST['review_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    // Update review in the database
    $sql = "UPDATE reviews SET name=?, comment=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $name, $comment, $reviewId);

    if ($stmt->execute()) {
        echo "Review updated successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

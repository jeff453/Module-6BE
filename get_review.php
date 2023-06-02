<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['review_id'])) {
    $reviewId = $_GET['review_id'];

    // Retrieve review data from the database
    $sql = "SELECT * FROM reviews WHERE id = $reviewId";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $reviewData = $result->fetch_assoc();
        echo json_encode($reviewData);
    }
}

$conn->close();
?>

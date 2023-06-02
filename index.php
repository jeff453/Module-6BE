<!DOCTYPE html>
<html>
<head>
    <title>Your Jewelry Business</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#"><img src="logo.png" alt="Logo"></a>
            </div>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon"></label>
            <div class="menu-container">
                <ul class="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Products</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section>
        <div>
            <h2>Add Review</h2>
            <form action="add_review.php" method="POST">
                <input type="text" name="name" placeholder="Your Name" required><br>
                <textarea name="comment" placeholder="Your Review" required></textarea><br>
                <input type="submit" value="Submit Review">
            </form>
        </div>

        <div>
            <h2>Reviews</h2>
            <div class="slider">
                <?php
                require_once 'config.php';

                // Retrieve reviews from the database
                $sql = "SELECT * FROM reviews";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $reviewId = $row['id'];
                        $name = $row['name'];
                        $comment = $row['comment'];
                        $createdAt = $row['created_at'];
                        ?>
                        <div class="slide">
                            <p><?php echo $comment; ?></p>
                            <p>- <?php echo $name; ?></p>
                            <p><?php echo $createdAt; ?></p>
                            <div class="actions">
                                <button class="edit-review" data-review-id="<?php echo $reviewId; ?>">Edit</button>
                                <form class="delete-review-form" action="delete_review.php" method="POST">
                                    <input type="hidden" name="review_id" value="<?php echo $reviewId; ?>">
                                    <button type="submit" class="delete-review">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div id="edit-form-<?php echo $reviewId; ?>" class="edit-form">
                            <form action="edit_review.php" method="POST">
                                <input type="hidden" name="review_id" value="<?php echo $reviewId; ?>">
                                <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" required><br>
                                <textarea name="comment" placeholder="Your Review" required><?php echo $comment; ?></textarea><br>
                                <input type="submit" value="Save">
                            </form>
                        </div>
                        <?php
                    }
                } else {
                    echo "No reviews found.";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>

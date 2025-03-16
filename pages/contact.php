<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Library Management</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>

    <header>
        <h1>Contact Us</h1>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a href="books.php">Books</a>
        <a href="users.php">Users</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact.php" class="active">Contact</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>

    <div class="content">
        <h2>Get in Touch</h2>
        <p>We'd love to hear from you! Please use the form below or email us directly at <a
                href="mailto:library@example.com">library@example.com</a>.</p>

        <div class="contact-form-container">
            <h2>Send a Message</h2>
            <form action="contact-submit.php" method="POST">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email address" required>

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" placeholder="Your message..." required></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Library Management System | All Rights Reserved</p>
    </footer>
</body>

</html>
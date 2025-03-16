<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books - Library Management</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>

    <header>
        <h1>Our Book Collection</h1>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a href="books.php" class="active">Books</a>
        <a href="users.php">Users</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>

    <div class="content">
        <h2>Browse Books</h2>
        <p>Explore our extensive collection of books.</p>
        <!-- Add book listing content here -->
    </div>

    <footer>
        <p>&copy; 2025 Library Management System | All Rights Reserved</p>
    </footer>
</body>

</html>
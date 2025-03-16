<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - Library Management</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>

    <header>
        <h1>Library Users</h1>
    </header>

    <nav>
        <a href="../index.php">Home</a>
        <a href="books.php">Books</a>
        <a href="users.php" class="active">Users</a>
        <a href="transactions.php">Transactions</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>

    <div class="content">
        <h2>Manage Users</h2>
        <p>View and manage library members here.</p>
        <!-- User management content goes here -->
    </div>

    <footer>
        <p>&copy; 2025 Library Management System | All Rights Reserved</p>
    </footer>

    <!-- Optionally, add JS if needed -->
    <script src="../assets/js/script.js"></script>
</body>

</html>
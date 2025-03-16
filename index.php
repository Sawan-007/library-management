<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    require_once "pages/process-login.php";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

    <!-- Header Section -->
    <header>
        <h1>Library Management System</h1>
        <p>Welcome to the Library! Libraries are the heart of knowledge and community.</p>
    </header>

    <!-- Navigation Section -->
    <nav>
        <a href="index.php" class="active">Home</a>
        <a href="pages/books.php">Books</a>
        <a href="pages/users.php">Users</a>
        <a href="pages/transactions.php">Transactions</a>
        <a href="pages/contact.php">Contact</a>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="pages/logout.php">Logout</a>
        <?php else: ?>
            <a href="pages/register.php">Register</a>
        <?php endif; ?>
    </nav>

    <!-- alert message -->
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="flash-message success" id="flashMessage">
            <?= $_SESSION['success_message']; ?>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error_message'])): ?>
        <div class="flash-message error" id="flashMessage">
            <?= $_SESSION['error_message']; ?>
        </div>
        <?php unset($_SESSION['error_message']); ?>
    <?php endif; ?>


    <!-- Main Content Section -->
    <div class="content">
        <h2>Welcome to the Library Management System</h2>
        <p>Manage your books, users, and transactions with ease.</p>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <div class="book-search">
                <h3>Search for Books</h3>
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="Search by title or author">
                    <button id="searchButton">Search</button>
                </div>
            </div>
            <!-- Search Results Section -->
            <div id="searchResult" class="search-results"></div>
        <?php else: ?>
            <p>Please log in to search for books.</p>
            <!-- Login Form Section -->
            <div class="login-container">
                <h2>Login</h2>
                <?php if (isset($loginError))
                    echo "<p style='color:red;'>$loginError</p>"; ?>
                <form id="loginForm" action="index.php" method="POST">
                    <input type="hidden" name="login" value="1">
                    <label for="username"><b>Username</b></label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                    <label for="password"><b>Password</b></label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    <button type="submit">Sign In</button>
                    <a href="pages/forgot-password.html" class="forgot-password">Forgot Password?</a>
                </form>
            </div>
        <?php endif; ?>

        <!-- Features Section -->
        <div class="features">
            <div class="feature-card">
                <h3>Book Management</h3>
                <p>Effortlessly add, remove, and edit books in the library collection.</p>
            </div>
            <div class="feature-card">
                <h3>User Management</h3>
                <p>Manage library users and their borrowing activity.</p>
            </div>
            <div class="feature-card">
                <h3>Transaction History</h3>
                <p>Keep track of issued and returned books, and generate reports.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2025 Library Management System | All Rights Reserved</p>
    </footer>

    <!-- Attach JavaScript File -->
    <script src="assets/js/script.js"></script>
</body>

</html>
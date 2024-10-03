<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css" />
    <script src="https://kit.fontawesome.com/804a3d4ad2.js"crossorigin="anonymous"></script>
</head>
<body>
<div class="topnav">
        <a href="index.php">Home</a>
    
        <div class="topnav-right">
        <a href="signup.html">Sign Up</a>
        <a href="login.html">Login</a>
    </div>
    <div class="content_row row">
    <p>
            <?php
                // Check if the username is available in the session (assuming it's stored in session)
                session_start();
                if (isset($_SESSION['username'])) {
                    echo "Login Successful. Welcome, " . htmlspecialchars($_SESSION['username']) . "!";
                } else {
                    echo "Login Successful.";
                }
            ?>
    </p>
    </div>
</body>
</html>
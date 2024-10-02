<?php
require_once "../includes/dbConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve email and password from the form
    $email = $_POST["email_address"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email_address = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        // Successful login
        // Optionally, you can store user information in the session here
        session_start();
        $_SESSION['user_id'] = $user['id']; // Store user ID in session

        // Set a success message
        $_SESSION['success_message'] = "Login successful! Welcome, " . htmlspecialchars($user['username']) . ".";

        // Redirect to viewusers.php
        header("Location: ../viewusers.php");
        exit();
    } else {
        // Invalid credentials, show an error message or redirect to a login error page
        echo "Invalid email or password. Please try again.";
    }
}
?>

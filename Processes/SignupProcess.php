<?php
require_once "../includes/dbConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $username = $_POST["username"];
    $email = $_POST["email_address"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
    $contact = $_POST["contact"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (username, email_address, password, contact) VALUES (:username, :email, :password, :contact)";

    // Prepare the SQL statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":contact", $contact);

    // Execute the statement
    if ($stmt->execute()) {
         // Redirect to login.php after successful registration
         header("Location: ../login.html");
         exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
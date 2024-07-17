<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Database connection
    $connection = mysqli_connect("localhost", "root", "", "gymdb");

    if (!$connection) {
        die("Error " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($connection, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            // Password is correct, set up a session or cookie and redirect to index.html
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.html");
            exit();
        } else {
            echo "Invalid password. <a href='Login.html'>Try again</a>.";
        }
    } else {
        echo "User not found. <a href='Login.html'>Try again</a>.";
    }

    mysqli_close($connection);
}
?>
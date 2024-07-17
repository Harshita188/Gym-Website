<!DOCTYPE html>
<html>

<head>
    <title>Registration Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            display: flex;
            justify-content: center;
            font-size: 20px;
            font-weight: bold;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),
                url('/img/success.jpg');
                background-repeat: repeat;
            background-size: cover;
            background-position: top;
            height: max(100px, 50rem);
            color: white;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
     // Hash the password

    // Database connection (change to your database credentials)
    // $db_host = "localhost";
    // $db_user = "root";
    // $db_pass = "";
    // $db_name = "gymdb";

    // $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    $connection = mysqli_connect("localhost", "root", "", "gymdb");

    if (!$connection) {
        die("Error " . mysqli_connect_error());
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($connection, $sql)) {
        echo "Registration successful. You can now  <a href='Login.html'> login </a>.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }

    mysqli_close($connection);
    }
    ?>
</body>

</html>
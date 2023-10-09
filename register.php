<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qgs";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate input and perform necessary checks
    if (empty($username) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Check if the username already exists in the database
        $checkQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = $conn->query($checkQuery);

        if ($password === $confirm_password) {
            if ($checkResult->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert the new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
            $insertResult = $conn->query($insertQuery);

            if ($insertResult) {
                echo "Registration successful. You can now login.";
            } else {
                echo "Failed to register the user. Please try again.";
            }
        }
    }
    else {
        echo "Passwords do not match. Please try again.";
    }
}
}
?>

<!-- HTML form for the registration feature -->
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Registration</title>
<link href="css/main.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<div class="container">
        <div class="card card-container">

        <center><b>Automated Question Paper Generator</b></center><br/>
        <center><img  src="Q-Genz_logo1.png" width="250" height="230"/></center>
            <p id="profile-name" class="profile-name-card"></p>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

    <label for="username">Username</label><br>
    <input type="text" name="username" class="form-control" required>
    <span class="help-block"></span><br>

    <label for="password">Password</label><br>
    <input type="password" name="password" class="form-control" required>
    <span class="help-block"></span><br>

    <label for="password">Confirm Password</label><br>
    <input type="password" name="confirm_password" class="form-control" required>
    <span class="help-block"></span><br>

    <input type="submit" class="btn btn-primary" value="Register">
    <a href="index.php" class="btn btn-primary">Login</a>
</form>
</div>
</div>
</html>

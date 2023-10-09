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
    $newPassword = $_POST["new_password"];

    // Update the password in the database
    $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result) {
        echo "Password updated successfully.";
    } else {
        echo "Failed to update the password. Please try again.";
    }
}
?>

<!-- HTML form for the forgot password feature -->
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
    <input type="text" name="username" class="form-control" required><br>
    
    <label for="new_password">New Password</label><br>
    <input type="password" name="new_password" class="form-control" required><br>

    <input type="submit" class="btn btn-primary" value="Reset Password">
</form>
</div>
</div>
</html>

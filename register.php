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
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate input and perform necessary checks
    if (empty($id) || empty($username) || empty($password)) {
        echo "Please fill in all the fields.";
    } else {
        // Check if the username already exists in the database
        $checkQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = $conn->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert the new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $insertQuery = "INSERT INTO users (id, username, password) VALUES ('$id', '$username', '$hashedPassword')";
            $insertResult = $conn->query($insertQuery);

            if ($insertResult) {
                echo "Registration successful. You can now login.";
            } else {
                echo "Failed to register the user. Please try again.";
            }
        }
    }
}
?>

<!-- HTML form for the registration feature -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="id">ID:</label>
    <input type="text" name="id" required>
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Register">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "0926";
$dbname = "4285564_asdasd";

// Creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting
error_reporting(E_ALL);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the username and password fields were filled
  if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user information into the database
    $sql = "INSERT INTO users (username, password) VALUES ('$username','$password_hash')";

    if ($conn->query($sql) === TRUE) {
      // Redirect to a page with a successful registration message
      header("Location: registration_successful.html");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Error: Please fill in both the username and password fields.";
  }
}

// Close the connection
$conn->close();
?>

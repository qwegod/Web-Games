<?php
$servername = "fdb1030.awardspace.net";
$username = "4285564_site";
$password = "09H/#Igz2{Gi643S";
$dbname = "4285564_asdasd";

// Creating a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting
error_reporting(E_ALL);

// Include the add_users.php script
require_once('add_users.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the username and password fields were filled
  if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $conn->real_escape_string($_POST["username"]);
    $password = $conn->real_escape_string($_POST["password"]);

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Call the add_user function
    $result = add_user($username, $password_hash, $conn);

    // Check if the user was added successfully
    if ($result) {
      // Redirect to a page with a successful registration message
      header("Location: registration_successful.html");
      exit();
    } else {
      echo "Error adding user.";
    }
  } else {
    echo "Error: Please fill in both the username and password fields.";
  }
}

// Close the connection
$conn->close();
?>

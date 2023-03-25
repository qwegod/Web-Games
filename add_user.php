<?php
function add_user($conn) {
  $username = $_GET['username'];
  $password = $_GET['password'];
  // Добавление информации о пользователе в базу данных
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }
}
?> 

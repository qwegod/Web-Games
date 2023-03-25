<?php
function add_user($username, $password, $conn) {
  // Добавление информации о пользователе в базу данных
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    return true;
  } else {
    return false;
  }
}
?>

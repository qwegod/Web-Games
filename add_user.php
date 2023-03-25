<?php
require_once 'register.php';

// Добавление информации о пользователе в базу данных
$sql = "INSERT INTO users (username, password) VALUES ('user1', 'pass1')";

if (mysqli_query($conn, $sql)) {
  echo "Новая запись успешно добавлена";
} else {
  echo "Ошибка: " . mysqli_error($conn);
}

mysqli_close($conn);

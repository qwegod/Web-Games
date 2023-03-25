<?php
require_once 'register.php';

// Проверяем, что данные формы регистрации отправлены методом POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Получаем данные из формы регистрации
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Добавляем информацию о пользователе в базу данных
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "Новая запись успешно добавлена";
  } else {
    echo "Ошибка: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  // Если данные формы не отправлены методом POST, то выводим сообщение об ошибке
  echo "Ошибка: данные формы не были отправлены методом POST";
}

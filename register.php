<?php
$servername = "sql7.freemysqlhosting.net";
$username = "sql7608520";
$password = "bpCPIpaqcP";
$dbname = "sql7608520";

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
  die("Ошибка соединения: " . $conn->connect_error);
}

// Включение отчета об ошибках
error_reporting(E_ALL);

// Включение файла add_user.php
require_once('add_user.php');

// Проверка, была ли отправлена форма
if (isset($_GET["username"]) && isset($_GET["password"])) {
  // Проверка заполнения полей имени пользователя и пароля
  if (!empty($_GET["username"]) && !empty($_GET["password"])) {
    $username = $conn->real_escape_string($_GET["username"]);
    $password = $conn->real_escape_string($_GET["password"]);

    // Хеширование пароля
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Вызов функции add_user
    $result = add_user($username, $password_hash, $conn);

    // Проверка успешности добавления пользователя
    if ($result) {
      // Перенаправление на страницу с сообщением об успешной регистрации
      header("Location: registration_successful.html");
      exit();
    } else {
      echo "Ошибка добавления пользователя.";
    }
  } else {
    echo "Ошибка: Пожалуйста, заполните поля имени пользователя и пароля.";
  }
}

// Закрытие соединения
$conn->close();
?>

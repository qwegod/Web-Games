<?php
$servername = "localhost";
$username = "root";
$password = "0926";
$dbname = "4285564_asdasd";

// Создание подключения
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Проверка подключения
if (!$conn) {
  die("Ошибка подключения: " . mysqli_connect_error());
}

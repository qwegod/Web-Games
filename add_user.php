require_once 'register.php';

// Проверяем, что данные формы регистрации отправлены методом GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Получаем данные из формы регистрации
  $username = $_GET['username'];
  $password = $_GET['password'];

  // Добавляем информацию о пользователе в базу данных
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if (mysqli_query($conn, $sql)) {
    echo "Новая запись успешно добавлена";
  } else {
    echo "Ошибка: " . mysqli_error($conn);
  }

  mysqli_close($conn);
} else {
  // Если данные формы не отправлены методом GET, то выводим сообщение об ошибке
  echo "Ошибка: данные формы не были отправлены методом GET";
}

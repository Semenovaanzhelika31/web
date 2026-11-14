<?php

session_start();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = trim($_POST['answer'] ?? '');

    if (!isset($_SESSION['captcha'])) {
        $message = 'Изображение не было загружено. Включите показ картинок в браузере и повторите попытку.';
    } elseif ($answer === $_SESSION['captcha']) {
        $message = 'Проверка пройдена: введённая строка совпадает с изображением.';
    } else {
        $message = 'Неверно: введённая строка не совпадает с изображением.';
    }

    unset($_SESSION['captcha']);
} else {
    unset($_SESSION['captcha']);
}
?>
<!DOCTYPE HTML>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
</head>

<body>
  <h1>Регистрация</h1>
  <form action="" method="post">
    <div>
      <img src="noise-picture.php" alt="Картинка с символами">
    </div>
    <div>
      <label>Введите строку</label>
      <input type="text" name="answer" size="6">
    </div>
    <input type="submit" value="Подтвердить">
  </form>
  <?php if ($message !== ''): ?>
    <p><?= htmlspecialchars($message) ?></p>
  <?php endif; ?>
</body>

</html>

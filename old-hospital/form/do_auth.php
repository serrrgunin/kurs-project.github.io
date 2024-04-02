<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$error = ['login' => []];
if (isset($_POST['login']) && !$_POST['login']) {
  $error['login'][] = 'Пустой логин';
} elseif (isset($_POST['login'])) {
  // проверяем наличие пользователя с указанным юзернеймом
  $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `login` = :login");
  $stmt->execute(['login' => $_POST['login']]);
  if (!$stmt->rowCount()) {
    $error['login'][] = 'Пользователь с такими данными не зарегистрирован';
  } else {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // проверяем пароль
    // $error['login'][] =  $_POST['password'] . ' - ' . $user['password'];
    if (password_verify($_POST['pass'], $user['pass'])) {
      unset($user['pass']);
      $_SESSION['user'] = $user;
      // лучше перекинуть в ЛК /page/account/
      header('Location: /');
      die;
    } else {
      $error['login'][] = 'Пароль неверен';
    }
  }
}

require('../page/authorise.php');

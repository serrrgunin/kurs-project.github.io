<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$error = ['register' => []];
$success = ['register' => false];

if (isset($_POST['login']) && !$_POST['login']) {
  $error['register'][] = 'Пустой логин';
}

// Проверим, не занято ли имя пользователя
$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `login` = :login");
$stmt->execute(['login' => $_POST['login']]);
if ($stmt->rowCount() > 0) {
  $error['register'][] = 'Это имя пользователя уже занято';
}

if (empty($error['register'])) {
  // Добавим пользователя в базу
  $stmt = $pdo->prepare("INSERT INTO `users` (`login`, `pass`, `name`, `surname`, `birthday`, `role`, `phone`) VALUES (:login, :pass, :name, :surname, :birthday, 1, :phone)");
  $stmt->execute([
    'login' => $_POST['login'],
    'pass' => password_hash($_POST['pass'], PASSWORD_DEFAULT),
    'name' => $_POST['name'],
    'surname' => $_POST['surname'],
    'birthday' => $_POST['birthday'],
    'phone' => $_POST['phone'],
  ]);

  $success['register'] = 'Пользователь зарегистрирован';
}

require('../page/register.php');

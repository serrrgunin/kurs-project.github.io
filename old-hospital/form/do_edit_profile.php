<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$error = ['update' => []];
$success = ['update' => false];

if (isset($_POST['login']) && !$_POST['login']) {
  $error['update'][] = 'Пустой логин';
}

// Проверим, не занято ли имя пользователя
$stmt = $pdo->prepare("SELECT * FROM `users` WHERE `login` = :login AND `id` != :id");
$stmt->execute([
  'id'    => $_POST['id'],
  'login' => $_POST['login'],
]);
if ($stmt->rowCount() > 0) {
  $error['update'][] = 'Это имя пользователя уже занято';
}

if (empty($error['update'])) {
  // Обновим данные пользователя
  $stmt = $pdo->prepare("UPDATE `users` SET login = :login, name = :name, surname = :surname, birthday = :birthday, phone = :phone WHERE id = :id");
  $stmt->execute([
    'id'       => $_POST['id'],
    'login'    => $_POST['login'],
    'name'     => $_POST['name'],
    'surname'  => $_POST['surname'],
    'birthday' => $_POST['birthday'],
    'phone'    => $_POST['phone'],
  ]);

  $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `id` = :id");
  $stmt->execute([ 'id' => $_POST['id'] ]);
  $_SESSION['user'] = $stmt->fetch(PDO::FETCH_ASSOC);

  $success['update'] = 'Данные обновлены';
}

require('../page/profile.php');

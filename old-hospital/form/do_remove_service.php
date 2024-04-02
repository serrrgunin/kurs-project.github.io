<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$type = $_POST['type'];
$table = ($type === 'autowash') ? 'services' : 'services_cars';

$stmt = $pdo->prepare("DELETE FROM `$table` WHERE id = :id");
$stmt->execute(['id' => $_POST['id']]);

header('location: ../admin');

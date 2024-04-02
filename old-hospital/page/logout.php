<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');
session_unset();
session_destroy();

// Перенаправление на страницу входа
header('Location: authorise.php');
exit();
?>
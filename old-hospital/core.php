<?php
// Старт сессии
session_start(['cookie_lifetime' => 86400]);

// Параметры подключения к базе данных
$host = '127.0.0.1'; // или ваш хост
$db   = 'database';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Настройка DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
  // Создаем объект PDO для подключения к БД
  $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

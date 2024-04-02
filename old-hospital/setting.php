<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core.php');

// Ссылки путей
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];

$setting['HTTP_PATH'] = $_SERVER['DOCUMENT_ROOT'];
$setting['TEMPLATE_PATH'] = $setting['HTTP_PATH'] . '/template';
$setting['FORM_PATH'] = $base_url . '/form';
$setting['ASSETS_PATH'] = $base_url . '/assets';

// Получение настроек сайта
$query = 'SELECT * FROM setting';
$setting['SITE_INFO'] = $pdo->query($query)->fetchAll(PDO::FETCH_KEY_PAIR);

// Получение меню в шапке сайта
$query = 'SELECT * FROM menu_item WHERE menu_type = "header"';
$setting['HEADER_MENU'] = $pdo->query($query)->fetchAll();
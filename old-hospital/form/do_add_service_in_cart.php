<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$id_service = $_POST['id'];
$page = $_POST['page'];
$id_selected_services = isset($_COOKIE['cart_services']) ? json_decode($_COOKIE['cart_services'], true) : [];
array_push($id_selected_services, $id_service);
setcookie('cart_services', json_encode($id_selected_services), time() + 604800, '/');

if ($page === 'services') {
	header('location: ../page/services.php');
} else if ($page === 'profile') {
	header('location: ../page/profile.php');
} else {
	header('location: ../index.php');
}

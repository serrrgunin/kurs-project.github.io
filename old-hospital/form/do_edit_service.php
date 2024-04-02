<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php');

$destination = NULL;
$is_photo_upload = false;
$type = $_POST['type'];
$table = ($type === 'autowash') ? 'services' : 'services_cars';

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
  $allowed = ['jpg', 'jpeg', 'png'];
  $filename = $_FILES['photo']['name'];
  $filetmpname = $_FILES['photo']['tmp_name'];
  $filesize = $_FILES['photo']['size'];

  // Проверка расширения файла
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if (!in_array(strtolower($ext), $allowed)) {
    echo "Ошибка: недопустимый формат файла.";
    exit;
  }

  // Проверка размера файла
  if ($filesize > 5000000) { // 5MB
    echo "Ошибка: файл слишком большой.";
    exit;
  }

  // Загрузка файла
  $destination = '../uploads/' . $filename;
  if (move_uploaded_file($filetmpname, $destination)) {
    echo "Файл успешно загружен.";
    $is_photo_upload = true;
  } else {
    echo "Ошибка при загрузке файла.";
  }
} else {
  echo "Ошибка при загрузке файла.";
}

if ($is_photo_upload) {
  // Обновим данные услуги
  $stmt = $pdo->prepare("UPDATE `$table` SET name = :name, time = :time, description = :description, price = :price, img_path = :img_path WHERE id = :id");
  $stmt->execute([
    'id'          => $_POST['id'],
    'name'        => $_POST['name'],
    'time'        => $_POST['time'],
    'description' => $_POST['desc'],
    'price'       => $_POST['price'],
    'img_path'    => $destination,
  ]);
} else {
  $stmt = $pdo->prepare("UPDATE `$table` SET name = :name, time = :time, description = :description, price = :price WHERE id = :id");
  $stmt->execute([
    'id'          => $_POST['id'],
    'name'        => $_POST['name'],
    'time'        => $_POST['time'],
    'description' => $_POST['desc'],
    'price'       => $_POST['price'],
  ]);
}

header('location: ../admin');

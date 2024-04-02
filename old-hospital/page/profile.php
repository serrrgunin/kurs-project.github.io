<!-- полключение БД -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/head.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/header.php'); ?>
<?php
if (!isset($_SESSION['user']) || !$_SESSION['user']) {
	header('location: ../page/authorise.php');
}
?>
<h2>Редактирование личных данных</h2>

<!-- Вывод ошибок -->
<div class="error" <? if (empty($error['update'])) { ?>style="display: none;" <? } ?>>
	<? foreach ($error['update'] as $message) { ?>
		<p><?= $message; ?></p>
	<? } ?>
</div>

<? if (isset($success['update']) && $success['update']) { ?>
	<p class="message"><?= $success['update']; ?></p>
<? } ?>
<!-- /Вывод ошибок -->

<div class="edit">
	<?php $user = $_SESSION['user']; ?>
	<div class="edit_lines">
		<form class="fieldform" method="POST" enctype="multipart/form-data" action="<?= $setting['FORM_PATH'] . '/do_edit_profile.php'; ?>">
			<input class="line" type="hidden" name="id" value=<?= $user['id']; ?>>
			<div class="register_input">
        <label for="login">Логин</label>
        <input class="line" type="text" name="login" placeholder="Логин" required>
      </div>
      <div class="register_input">
        <label for="name">Имя</label>
        <input class="line" type="text" name="name" placeholder="Имя" required>
      </div>
      <div class="register_input">
        <label for="surname">Фамилия</label>
        <input class="line" type="text" name="surname" placeholder="Фамилия" required>
      </div>
      <div class="register_input">
        <label for="birthday">День рождения</label>
        <input class="line" type="date" name="birthday" placeholder="День Рождения" required>
      </div>
      <div class="register_input">
        <label for="phone">Телефон</label>
        <input class="line" type="text" name="phone" placeholder="Телефон" required>
      </div>
			<input class="sliding-button" type="submit" name="add_user" value="Сохранить данные" required>
		</form>
	</div>
</div>

<br><br><br>

<h1 class="edit">Выбранные услуги</h1>
<section class="services">
	<h3 style="margin-bottom: -15px; font-size: 26px;">Записи на приём</h3>
	<?php

	$id_selected_services = isset($_COOKIE['cart_services']) ? json_decode($_COOKIE['cart_services'], true) : [];
	$id_selected_services_wash = [];
	$id_selected_services_repair = [];

	foreach ($id_selected_services as $service) {
		if (strripos($service, 'autowash') === 0) {
			array_push($id_selected_services_wash, substr($service, 9));
		} else if (strripos($service, 'autoservices') === 0) {
			array_push($id_selected_services_repair, substr($service, 13));
		}
	}	

	if (count($id_selected_services_wash) === 0) {
		echo '<p>Нет выбранных</p>';
	} else {

		$query = "SELECT * FROM `services` WHERE `id` IN (" . implode(',', $id_selected_services_wash) . ")";
		$services_wash = $pdo->query($query)->fetchAll();

		foreach ($services_wash as $service) { ?>
			<div class="service">
				<div class="service__info">
					<h1><?= $service['name'] ?></h1>
					<p><?= $service['description'] ?></p>
					<div style="display: flex;">
						<h3>Цена:</h3>
						<h3><?= $service['price'] ?> ₽</h3>
					</div>
					<p>Время: <?= $service['time'] ?> мин</p>
					<?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
						<div style="display: flex; gap: 10px;">
							<form action="<?= $setting['FORM_PATH'] . '/do_remove_service_in_cart.php'; ?>" method="POST">
								<input type="hidden" name="id" value="autowash-<?= $service['id'] ?>">
								<input type="hidden" name="page" value="profile">
								<button class="sliding-button sliding-button_del" type="submit">Удалить</button>
							</form>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($service['img_path']) : ?>
					<div class="service__photo">
						<img src="<?= ($setting['ASSETS_PATH'] . '/' . $service['img_path']); ?>" alt="car" class="service__img">
					</div>
				<?php endif; ?>
			</div>
	<?php }
	} ?>
</section>

<br><br><br>

<section class="services">
	<h3 style="margin-bottom: -15px; font-size: 26px;">Записи на анализы</h3>
	<?php

	if (count($id_selected_services_repair) === 0) {
		echo '<p>Нет выбранных</p>';
	} else {

		$query = "SELECT * FROM `services_cars` WHERE `id` IN (" . implode(',', $id_selected_services_repair) . ")";
		$services_repair = $pdo->query($query)->fetchAll();

		foreach ($services_repair as $service) { ?>
			<div class="service">
				<div class="service__info">
					<h1><?= $service['name'] ?></h1>
					<p><?= $service['description'] ?></p>
					<div style="display: flex;">
						<h3>Цена:</h3>
						<h3><?= $service['price'] ?> ₽</h3>
					</div>
					<p>Время: <?= $service['time'] ?> мин</p>
					<?php if (isset($_SESSION['user']) && $_SESSION['user']) : ?>
						<div style="display: flex; gap: 10px;">
							<form action="<?= $setting['FORM_PATH'] . '/do_remove_service_in_cart.php'; ?>" method="POST">
								<input type="hidden" name="id" value="autoservices-<?= $service['id'] ?>">
								<input type="hidden" name="page" value="profile">
								<button class="sliding-button sliding-button_del" type="submit">Удалить</button>
							</form>
						</div>
					<?php endif; ?>
				</div>
				<?php if ($service['img_path']) : ?>
					<div class="service__photo">
						<img src="<?= ($setting['ASSETS_PATH'] . '/' . $service['img_path']); ?>" alt="car" class="service__img">
					</div>
				<?php endif; ?>
			</div>
	<?php }
	} ?>
</section>

<?php require_once($setting['TEMPLATE_PATH'] . '/footer.php'); ?>
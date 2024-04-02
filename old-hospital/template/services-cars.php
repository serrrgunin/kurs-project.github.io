<div class="services">
	<h2>Анализы</h2>
	<?php
	$query = 'SELECT * FROM services_cars';
	$services = $pdo->query($query)->fetchAll();
	$id_selected_services = isset($_COOKIE['cart_services']) ? json_decode($_COOKIE['cart_services'], true) : [];	

	foreach ($services as $service) { ?>
		<div class="service">
			<div class="service__info">
				<h1><?= $service['name'] ?></h1>
				<p><?= $service['description'] ?></p>
				<div style="display: flex;">
					<h3>Цена:</h3>
					<h3><?= $service['price'] ?> ₽</h3>
				</div>
				<p>Время: <?= $service['time'] ?> мин</p>
				<?php if (isset($_SESSION['user']) && $_SESSION['user']) :
					if (in_array('autoservices-' . $service['id'], $id_selected_services)) : ?>
						<div style="display: flex; gap: 10px;">
							<button class="sliding-button" type="submit" disabled>Добавлено</button>
							<form action="<?= $setting['FORM_PATH'] . '/do_remove_service_in_cart.php'; ?>" method="POST">
								<input type="hidden" name="id" value="autoservices-<?= $service['id'] ?>">
								<input type="hidden" name="page" value="services">
								<button class="sliding-button sliding-button_del" type="submit">Удалить</button>
							</form>
						</div>
					<?php else : ?>
						<form action="<?= $setting['FORM_PATH'] . '/do_add_service_in_cart.php'; ?>" method="POST">
							<input type="hidden" name="id" value="autoservices-<?= $service['id'] ?>">
							<input type="hidden" name="page" value="services">
							<button class="sliding-button" type="submit">Добавить</button>
						</form>
				<?php endif;
				endif; ?>
			</div>
			<?php if ($service['img_path']) : ?>
				<div class="service__photo">
					<img src="<?= ($setting['ASSETS_PATH'] . '/' . $service['img_path']); ?>" alt="car" class="service__img">
				</div>
			<?php endif; ?>
			
		</div>
	<?php } ?>
</div>
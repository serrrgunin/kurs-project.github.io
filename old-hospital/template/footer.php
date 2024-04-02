</main>

<footer class="footer">
	<div class="container">
	<div class="footer__contacts contacts">
		<?php
		$email = $setting['SITE_INFO']['email'];
		$phone = $setting['SITE_INFO']['phone'];
		?>
		<a href="mailto:<?= $email; ?>" class="footer__contacts-email contacts__email contacts__link"><?= $email; ?></a>
		<a href="tel:<?= $phone; ?>" class="footer__contacts-phone contacts__phone contacts__link"><?= $phone; ?></a>
	</div>
	
	<div class="footer__copyright">Все права защищены 2024 ©</div>
	</div>
</footer>

<script src="<?= $setting['ASSETS_PATH'] . '/js/swiper-bundle.min.js'; ?>"></script>
<script src="<?= $setting['ASSETS_PATH'] . '/js/main.js'; ?>"></script>

</body>

</html>
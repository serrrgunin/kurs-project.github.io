<!-- шапка, логотип и кнопки -->
<header class="header">
	<a href="/" class="logo">
		<img class="logo__img" src="<?= $setting['ASSETS_PATH'] . '/img/logo.svg'; ?>">
	</a>
	<div class="container">
	<div class="header__contacts contacts">
		<?php
			$email = $setting['SITE_INFO']['email'];
			$phone = $setting['SITE_INFO']['phone'];
		?>
		<a href="mailto:<?= $email; ?>" class="header__contacts-email contacts__email contacts__link"><?= $email; ?></a>
		<a href="tel:<?= $phone; ?>" class="header__contacts-phone contacts__phone contacts__link"><?= $phone; ?></a>
	</div>
	</div>
	<nav class="nav">
		<ul class="nav__list">
			<?php
			$is_auth = (isset($_SESSION['user']) && $_SESSION['user']) ? true : false;
			foreach ($setting['HEADER_MENU'] as $item) :
				if (($is_auth && ($item['link'] === '/page/register.php' || $item['link'] === '/page/authorise.php'))
					|| (!$is_auth && $item['link'] === '/page/logout.php')
				  || (!$is_auth && $item['link'] === '/page/profile.php')
					|| (!$is_auth && $item['link'] === '/admin')
					|| ($is_auth && !($_SESSION['user']['role'] == 2) && $item['link'] === '/admin')
				) continue; ?>
				<li class="nav__list-item">
					<a href="<?= $item['link']; ?>" class="<?= $item['class']; ?>"><?= $item['name']; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
</header>

<body>

	<main>
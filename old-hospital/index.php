<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/head.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/header.php'); ?>

<section class="hero">
  <div class="hero__inner">
    <div class="hero__left">
      <h1 class="hero__title">
      МЕДИЦИНСКИЙ ЦЕНТР В ИЖЕВСКЕ <nav class="nav-hero__title">ДЛЯ ВСЕЙ СЕМЬИ</nav> С СОВРЕМЕННЫМ ОБОРУДОВАНИЕМ И <nav class="nav-hero__title">СПЕЦИАЛИСТАМИ СО СТАЖЕМ ДО 55 ЛЕТ</nav>
      </h1>
      <div class="hero__desc">
      Собственная лаборатория для забора более 1.500 видов анализов + консультация со специалистом в одном месте
      </div>
      <a href="#services" class="sliding-button">Смотреть услуги</a>
    </div>
    <div class="hero__right">
      <img src="<?= $setting['ASSETS_PATH'] . '/img/hero.png'; ?>" alt="doctor" class="hero__right-img">
    </div>
  </div>
</section>

<?php require_once($setting['TEMPLATE_PATH'] . '/slider.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/services.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/footer.php'); ?>
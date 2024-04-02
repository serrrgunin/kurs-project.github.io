<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/head.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/header.php'); ?>
<div class="mainfields">
  <h1>Регистрация</h1>

  <!-- Вывод ошибок -->
  <div class="error" <? if (empty($error['register'])) { ?>style="display: none;" <? } ?>>
    <? foreach ($error['register'] as $message) { ?>
      <p><?= $message; ?></p>
    <? } ?>
  </div>

  <? if (isset($success['register']) && $success['register']) { ?>
    <p class="message"><?= $success['register']; ?></p>
    <!-- /Вывод ошибок -->
  <? } else { ?>
    <div class="edit_lines">
      <form class="fieldform" method="POST" enctype="multipart/form-data" action="<?= $setting['FORM_PATH'] . '/do_reg.php'; ?>">
      <div class="register_input">
        <label for="login">Логин</label>
        <input class="line" type="text" name="login" placeholder="Логин" required>
      </div>
      <div class="register_input">
        <label for="pass">Пароль</label>
        <input class="line" type="password" name="pass" placeholder="Пароль" required>
      </div>
      <div class="register_input">
        <label for="repass">Проверка пароля</label>
        <input class="line" type="password" name="repass" placeholder="Проверка Пароля" required>
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
      
        <input class="sliding-button" type="submit" name="add_user" value="регистрация" required>
      </form>
    </div>
  <?php } ?>
</div>
<?php require_once($setting['TEMPLATE_PATH'] . '/footer.php'); ?>
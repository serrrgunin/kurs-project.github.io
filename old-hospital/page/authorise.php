<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/head.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/header.php'); ?>
<div class="mainfields">
  <h1>Вход</h1>

  <!-- Вывод ошибок -->
  <div class="error" <? if (empty($error['login'])) { ?>style="display: none;" <? } ?>>
    <? foreach ($error['login'] as $message) { ?>
      <p><?= $message ?></p>
    <? } ?>
  </div>
  <!-- /Вывод ошибок -->

  <div class="edit_lines">
    <form class="fieldform" method="POST" action="<?= $setting['FORM_PATH'] . '/do_auth.php'; ?>">
      <input class="line" type="text" name="login" placeholder="Логин" required>
      <input class="line" type="password" name="pass" placeholder="Пароль" required>
      <input class="sliding-button" type="submit" name="add_user" value="Войти">
  </div>
  </form>
  <?php require_once($setting['TEMPLATE_PATH'] . '/footer.php'); ?>
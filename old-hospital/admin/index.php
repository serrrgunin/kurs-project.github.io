<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/setting.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/head.php'); ?>
<?php require_once($setting['TEMPLATE_PATH'] . '/header.php'); ?>

<h2>Редактирование услуг</h2>
<section class="admin">
  <div class="container">
    <div class="admin__inner">
      <?php
      $query = 'SELECT * FROM services';
      $services_wash = $pdo->query($query)->fetchAll();

      foreach ($services_wash as $service) { ?>
        <div class="admin__item">
          <form action="<?= $setting['FORM_PATH'] . '/do_edit_service.php'; ?>" method="POST" enctype="multipart/form-data">
            <h3 class="admin__num">Услуга №<?= $service['id']; ?></h3>
            <input type="hidden" name="id" value="<?= $service['id']; ?>">
            <input type="hidden" name="type" value="autowash">
            <div class="input-wrap">
              <div class="input-name">Название услуги</div>
              <input class="line" type="text" name="name" placeholder="Название услуги" value="<?= $service['name']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Время оказания услуги (в минутах)</div>
              <input class="line" type="number" name="time" placeholder="Время оказания услуги" value="<?= $service['time']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Описание услуги</div>
              <textarea class="line" name="desc" placeholder="Описание услуги"><?= $service['description']; ?></textarea>
            </div>
            <div class="input-wrap">
              <div class="input-name">Стоимость услуги (в рублях)</div>
              <input class="line" type="number" name="price" placeholder="Стоимость услуги" value="<?= $service['price']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Изображение услуги</div>
              <?php if ($service['img_path']) : ?>
                <div class="admin__photo">
                  <img src="<?= ($setting['ASSETS_PATH'] . '/' . $service['img_path']); ?>" alt="car" class="admin__photo-img">
                </div>
              <?php endif; ?>
              <input class="line" type="file" name="photo" placeholder="Выберите новое фото">
            </div>
            <input class="sliding-button" type="submit" name="add_user" value="Cохранить изменения">
          </form>
          <form action="<?= $setting['FORM_PATH'] . '/do_remove_service.php'; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $service['id']; ?>">
            <input type="hidden" name="type" value="autowash">
            <input class="sliding-button btn-delete" type="submit" value="Удалить услугу">
          </form>
        </div>
        <br><br>
      <?php } ?>
      <button class="sliding-button add-btn-service" data-type="autowash" type="button">Добавить новую услугу</button>
    </div>
  </div>
</section>

<br><br><br><br><br><br><br><br><br><br>

<h2>Редактирование анализов</h2>
<section class="admin">
  <div class="container">
    <div class="admin__inner">
      <?php
      $query = 'SELECT * FROM services_cars';
      $services_repair = $pdo->query($query)->fetchAll();

      foreach ($services_repair as $service) { ?>
        <div class="admin__item">
          <form action="<?= $setting['FORM_PATH'] . '/do_edit_service.php'; ?>" method="POST" enctype="multipart/form-data">
            <h3 class="admin__num">Услуга №<?= $service['id']; ?></h3>
            <input type="hidden" name="id" value="<?= $service['id']; ?>">
            <input type="hidden" name="type" value="autoservice">
            <div class="input-wrap">
              <div class="input-name">Название услуги</div>
              <input class="line" type="text" name="name" placeholder="Название услуги" value="<?= $service['name']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Время оказания услуги (в минутах)</div>
              <input class="line" type="number" name="time" placeholder="Время оказания услуги" value="<?= $service['time']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Описание услуги</div>
              <textarea class="line" name="desc" placeholder="Описание услуги"><?= $service['description']; ?></textarea>
            </div>
            <div class="input-wrap">
              <div class="input-name">Стоимость услуги (в рублях)</div>
              <input class="line" type="number" name="price" placeholder="Стоимость услуги" value="<?= $service['price']; ?>" required>
            </div>
            <div class="input-wrap">
              <div class="input-name">Изображение услуги</div>
              <?php if ($service['img_path']) : ?>
                <div class="admin__photo">
                  <img src="<?= ($setting['ASSETS_PATH'] . '/' . $service['img_path']); ?>" alt="car" class="admin__photo-img">
                </div>
              <?php endif; ?>
              <input class="line" type="file" name="photo" placeholder="Выберите новое фото">
            </div>
            <input class="sliding-button" type="submit" name="add_user" value="Cохранить изменения">
          </form>
          <form action="<?= $setting['FORM_PATH'] . '/do_remove_service.php'; ?>" method="POST">
            <input type="hidden" name="id" value="<?= $service['id']; ?>">
            <input type="hidden" name="type" value="autoservice">
            <input class="sliding-button btn-delete" type="submit" value="Удалить услугу">
          </form>
        </div>
        <br><br>
      <?php } ?>
      <button class="sliding-button add-btn-service" data-type="autoservice" type="button">Добавить новый анализ</button>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.add-btn-service').forEach(function(btn) {
      btn.addEventListener('click', function() {
        this.remove();
        const wrapper = document.createElement('div');
        const type = btn.getAttribute('data-type');
        let name = '';
        
        if (type === 'autowash') {
          name =  'автомойки';
        } else {
          name =  'автосервиса';
        }

        wrapper.classList = 'admin__item';
        wrapper.innerHTML = `
        <form action="<?= $setting['FORM_PATH'] . '/do_add_service.php'; ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="type" value="${type}">
          <h3 class="admin__num">Новая услуга ${name}</h3>
          <div class="input-wrap">
            <div class="input-name">Название услуги</div>
            <input class="line" type="text" name="name" placeholder="Название услуги" required>
          </div>
          <div class="input-wrap">
            <div class="input-name">Время оказания услуги (в минутах)</div>
            <input class="line" type="number" name="time" placeholder="Время оказания услуги" required>
          </div>
          <div class="input-wrap">
            <div class="input-name">Описание услуги</div>
            <textarea class="line" name="desc" placeholder="Описание услуги"></textarea>
          </div>
          <div class="input-wrap">
            <div class="input-name">Стоимость услуги (в рублях)</div>
            <input class="line" type="number" name="price" placeholder="Стоимость услуги" required>
          </div>
          <div class="input-wrap">
            <div class="input-name">Изображение услуги</div>
            <input class="line" type="file" name="photo" placeholder="Выберите новое фото">
          </div>
          <input class="sliding-button" type="submit" name="add_user" value="Сохранить новую услугу">
        </form>
      `;

        if (type === 'autowash') {
          document.querySelector('.admin__inner').append(wrapper);
        } else {
          document.querySelectorAll('.admin__inner')[1].append(wrapper);
        }
      });
    });
  });
</script>

<?php require_once($setting['TEMPLATE_PATH'] . '/footer.php'); ?>
<html>
  <head>
    <style>
/* Сообщения об ошибках и поля с ошибками выводим с красным бордюром. */
.error {
  border: 2px solid red;
}
    </style>
  <link rel="stylesheet" href="../css/formstyle.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>

  <body background="../main_bg.jpg">
  <?php include "../header.php"; ?>
<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}

// Далее выводим форму отмечая элементы с ошибками классом error
// и задавая начальные значения элементов ранее сохраненными.
?>

<div class="container">
<section id="content">


    <!-- СДЕЛАТЬ ВЫВОД ОШИБОК РЯДОМ С ПОЛЕМ -->
    <form action="" method="POST">

      <label> Ваше имя:
        <br>
        <input type="text" name="name" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php echo $values['name']; ?>" />
      </label>
      <br>
      <br>

      <label> Ваш email:
        <br>
        <input type="text" name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php echo $values['email']; ?>" />
      </label>
      <br>
      <br>

      <label> Год рождения: 
      <!-- !!! ДОДЕЛАТЬ: СОХРАНИТЬ ГОД ПОСЛЕ ПЕРЕЗАГРУЗКИ ВЫДЕЛИТЬ КРАСНЫМ !!! -->
        <br>
        <select name="year" <?php if ($errors['year']) {print 'class="error"';} ?>>
          <option default value="0" >Не выбрано</option>
          <?php for($i = 1900; $i <=2019; $i++): ?>
            <option value="<?= $i ?>"><?= $i ?> </option>  
          <?php endfor?>
        </select>
      </label>
      <br>
      <br>

      <label>Пол:
        <br>
        <div <?php if ($errors['gender']) {print 'class="error"';} ?>>
          <label><input type="radio" name="gender" value="male"/> Male </label>
          <label><input type="radio" name="gender" value="feamle"/> Female </label>
        </div>
      </label>
      <br>

      <label> Количество конечностей:
        <br>
        <div <?php if ($errors['limb']) {print 'class="error"';} ?>>
          <label><input type="radio" name="limb" value="0"/> 0 </label>
          <label><input type="radio" name="limb" value="1"/> 1 </label>
          <label><input type="radio" name="limb" value="2"/> 2 </label>
          <label><input type="radio" name="limb" value="3"/> 3 </label>
          <label><input type="radio" name="limb" value="4"/> 4 </label>
          <label><input type="radio" name="limb" value="more"/> Больше 4😱 </label>
        </div>
      </label>
      <br>

      <label>Сверхспособность:
        <br>
        <div>
          <select name="power[]" multiple="multiple" <?php if ($errors['power']) {print 'class="error"';} ?>>
            <option value="p1">Бессмертие</option>
            <option value="p2">Прохождение сквозь стены</option>
            <option value="p3">Левитация</option>
          </select>
        </div>    
      </label>
      <br>
      <br>

      <label>Биография:
        <br>
        <textarea name="bio" <?php if ($errors['bio']) {print 'class="error"';} ?> value="<?php echo $values['bio']; ?>">
        </textarea>
      </label>
      <br>
      <br>

      <label><input type="checkbox" name="contact" <?php if ($errors['contact']) {print 'class="error"';} ?>/>С контактом ознакомлен</label>
      <br>
      <br>

      <input type="submit" value="Отправить" />
    </form>
    </section>
    </div>
  </body>
</html>
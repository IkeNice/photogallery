<?php
/**
 * Интернет-программирование. Задача 12.
 * Реализовать проверку заполнения обязательных полей формы в задаче 7
 * с использованием Cookies, а также заполнение формы по умолчанию ранее
 * введенными значениями.
 */

// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // Массив для временного хранения сообщений пользователю.
  $messages = array();

  // В суперглобальном массиве $_COOKIE PHP хранит все имена и значения куки текущего запроса.
  // Выдаем сообщение об успешном сохранении.
  if (!empty($_COOKIE['save'])) {
    // Удаляем куку, указывая время устаревания в прошлом.
    setcookie('save', '', 100000);
    // Если есть параметр save, то выводим сообщение пользователю.
    $messages[] = 'Спасибо, результаты сохранены.';
  }

  // Складываем признак ошибок в массив.
  $errors = array();
  $errors['name'] = !empty($_COOKIE['name_error']);
  $errors['email'] = !empty($_COOKIE['email_error']);
  $errors['year'] = !empty($_COOKIE['year_error']);
  $errors['gender'] = !empty($_COOKIE['gender_error']);
  $errors['limb'] = !empty($_COOKIE['limb_error']);
  $errors['power[]'] = !empty($_COOKIE['power_error[]']);
  $errors['bio'] = !empty($_COOKIE['bio_error']);
  $errors['contact'] = !empty($_COOKIE['contact_error']);
  // TODO: аналогично все поля.

  // Выдаем сообщения об ошибках.
  if ($errors['name']) {
    setcookie('name_error', '', 1);
    $messages[] = '<div class="error">Заполните имя!</div>';
  }

  if ($errors['email']) {
    setcookie('email_error', '', 1);
    $messages[] = '<div class="error">Заполните e-mail!</div>';
  }

  if ($errors['year']) {
    setcookie('year_error', '', 1);
    $messages[] = '<div class="error">Выберите год рождения!</div>';
  }

  if ($errors['gender']) {
    setcookie('gender_error', '', 1);
    $messages[] = '<div class="error">Выберите пол!</div>';
  }

  if ($errors['limb']) {
    setcookie('limb_error', '', 1);
    $messages[] = '<div class="error">Выберите количество конечностей!</div>';
  }

  if ($errors['power[]']) {
    setcookie('power_error', '', 1);
    $messages[] = '<div class="error">Выберите сверхспособность!</div>';
  }

  if ($errors['bio']) {
    setcookie('bio_error', '', 1);
    $messages[] = '<div class="error">Введите биографию!</div>';
  }

  if ($errors['contact']) {
    setcookie('contact_error', '', 1);
    $messages[] = '<div class="error">Вы не ознакомились с контактом!</div>';
  }
  // TODO: тут выдать сообщения об ошибках в других полях.

  // Складываем предыдущие значения полей в массив, если есть.
  $values = array();
  $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
  $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
  $values['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
  $values['gender'] = empty($_COOKIE['gender_value']) ? '' : $_COOKIE['gender_value'];
  $values['limb'] = empty($_COOKIE['limb_value']) ? '' : $_COOKIE['limb_value'];
  $values['power[]'] = empty($_COOKIE['power_value[]']) ? '' : $_COOKIE['power_value[]'];
  $values['bio'] = empty($_COOKIE['bio_value']) ? '' : $_COOKIE['bio_value'];
  // TODO: аналогично все поля.

  // Включаем содержимое файла form.php.
  // В нем будут доступны переменные $messages, $errors и $values для вывода 
  // сообщений, полей с ранее заполненными данными и признаками ошибок.
  include('form.php');
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.
else {
  // Проверяем ошибки.
  $errors = FALSE;
  if (empty($_POST['name'])) {
    setcookie('name_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('name_value', $_POST['name'], time() + 60);
  }

  if (empty($_POST['email'])) {
    setcookie('email_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('email_value', $_POST['email'], time() + 60);
  }

  if ($_POST['year']==0) {
    setcookie('year_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('year_value', $_POST['year'], time() + 60);
  }

  if (!$_POST['gender']) {
    setcookie('gender_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('gender_value', $_POST['gender'], time() + 60);
  }

  if (!$_POST['limb']) {
    setcookie('limb_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('limb_value', $_POST['limb'], time() + 60);
  }

  if (!$_POST['power[]']) {
    setcookie('power_error[]', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('power_value[]', $_POST['power[]'], time() + 60);
  }

  if (empty($_POST['bio'])) {
    setcookie('bio_error', '1', time() + 60);
    $errors = TRUE;
  } else {
    setcookie('bio_value', $_POST['bio'], time() + 60);
  }

  if (!isset($_POST['contact'])) {
    setcookie('error_contact', 'Вы не ознакомились с контактом', time() + 60);
    $errors = TRUE;
}
// *************
// TODO: тут необходимо проверить правильность заполнения всех остальных полей.
// Сохранить в Cookie признаки ошибок и значения полей.
// *************

  if ($errors) {
    // При наличии ошибок перезагружаем страницу и завершаем работу скрипта.
    header('Location: index.php');
    exit();
  } else {
    // Удаляем Cookies с признаками ошибок.
    setcookie('name_error', '', 1);
    setcookie('email_error', '', 1);
    setcookie('year_error', '', 1);
    setcookie('gender_error', '', 1);
    setcookie('limb_error', '', 1);
    setcookie('power_error[]', '', 1);
    setcookie('bio_error', '', 1);
    setcookie('contact_error', '', 1);
    // TODO: тут необходимо удалить остальные Cookies.
  }

  // Сохранение в XML-документ.
  // ...

  // Сохраняем куку с признаком успешного сохранения.
  setcookie('save', '1');

  // Делаем перенаправление.
  header('Location: index.php');
}
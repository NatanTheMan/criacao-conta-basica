<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: index.html');
  exit();
}

$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$confirmPassword = filter_input(INPUT_POST, 'confirm-password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$errors = [];

if ($name == '') {
  $errors[] = "Nome precisa ser informado";
}
if ($email == '') {
  $errors[] = "Email precisa ser informado";
}
if ($password == '') {
  $errors[] = "Senha precisa ser informado";
}
if ($confirmPassword == '') {
  $errors[] = "Confime a senha";
}

if (count($errors) > 0) {
  echo "<h1>Bad Request</h1><ul>";
  foreach ($errors as $e) {
    echo "<li>$e</li>";
  }
  echo "</ul>";
  echo "<a href='index.html'>Voltar</a>";
}

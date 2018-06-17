<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation = new Validation();
    $msg = $validation->checkEmpty($_POST, array('passwordOld', 'password', 'passwordConfirm'));
    $checkPassword = $validation->isPasswordValid($_POST['password']);
    $checkTheSame = $validation->checkTheSame($_POST['password'], $_POST['passwordConfirm']);
   
    $password= htmlspecialchars(strip_tags($_POST['password']));
    $passwordConfirm= htmlspecialchars(strip_tags($_POST['passwordConfirm']));
    $passwordOld= htmlspecialchars(strip_tags($_POST['passwordOld']));
}
?>

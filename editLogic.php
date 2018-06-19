<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation = new Validation();
    $msg = $validation->checkEmpty($_POST, array('passwordOld', 'password', 'passwordConfirm'));
    $checkPassword = $validation->isPasswordValid($_POST['password']);
    $checkTheSame = $validation->checkTheSame($_POST['password'], $_POST['passwordConfirm']);
   
    $password= htmlspecialchars(strip_tags($_POST['password']));
    $passwordConfirm= htmlspecialchars(strip_tags($_POST['passwordConfirm']));
    $passwordOld= htmlspecialchars(strip_tags($_POST['passwordOld']));
    
    if($msg != null) {
            $errorMsg= $msg; 
    } elseif (!$checkPassword) {
            $passwordErr= 'Password must be at least 8 characters with uppercase letters and number';
    } elseif($password!=$passwordConfirm) {
            $passwordConfirmErr="Password isn't the same";
    } else {
        $stmt = $validation->checkUser($_SESSION['username'], $password);
        if($stmt) {
            
        } else {
            $error='Old password is incorrect';
        }
    }
}
?>

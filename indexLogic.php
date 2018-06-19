<?php
$username= $password=$hashedPassword= '';
$errorMsg= $error= $passwordErr=  '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $validation = new Validation();
    $core = new Core();
    
    $msg = $validation->checkEmpty($_POST, array('username', 'password'));
    
    $username= htmlspecialchars(strip_tags($_POST['username']));
    $password= htmlspecialchars(strip_tags($_POST['password']));
    
    if($msg != null) {
            $errorMsg= $msg; 
    } else {
        $stmt = $validation->checkUser($username, $password);
        if($stmt) {
            session_start();
            $_SESSION['username'] = $username;
            header('location: welcome.php');
        } else {
            $error='Login or password is incorrect';
        }
    }
}
?>

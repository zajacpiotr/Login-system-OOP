<?php
$username= $name= $lastName= $email= $password= $passwordConfirm = $checkbox= "";
$msg= $errorMsg= $emailErr= $usernameErr= $lastNameErr= $nameErr= $error= $passwordConfirmErr= $passwordErr= $insertMsg= $checkboxErr=  "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new Validation();
    $core = new Core();
    
    $msg = $validation->checkEmpty($_POST, array("username", "password", "passwordConfirm", "name","lastName", "email"));
    $checkEmail = $validation->isEmailValid($_POST["email"]);
    $checkName = $validation->isValid($_POST["name"]);
    $checkUsername = $validation->isValidUsername($_POST["username"]);
    $checkLastName = $validation->isValid($_POST["lastName"]);
    $checkPassword = $validation->isPasswordValid($_POST["password"]);
    
    $username= htmlspecialchars(strip_tags($_POST["username"]));
    $name= htmlspecialchars(strip_tags($_POST["name"]));
    $lastName= htmlspecialchars(strip_tags($_POST["lastName"]));
    $email= htmlspecialchars(strip_tags($_POST["email"]));
    $password= htmlspecialchars(strip_tags($_POST["password"]));
    $passwordConfirm= htmlspecialchars(strip_tags($_POST["passwordConfirm"]));
    
        
    if($msg != null) {
            $errorMsg= $msg; 
    } elseif (!$checkEmail) {
            $emailErr= "Please enter correct Email";
    } elseif(!$checkName) {
            $nameErr="Please enter correct First Name";
    } elseif(!$checkLastName) {
            $lastNameErr="Please enter correct Last Name";
    } elseif(!$checkUsername) {
            $usernameErr="Please enter correct Username";
    } elseif(!$checkPassword) {
            $passwordErr="Password must be at least 8 characters with uppercase letters and number";
    } elseif($password!=$passwordConfirm) {
            $passwordConfirmErr="Password isn't the same";
    } elseif((empty($_POST["checkbox"]))) {
            $checkboxErr="To create new account you must authorisation to process personal data";
    } else { 
        $query = "SELECT * FROM users WHERE username = '$username'";
        $stmt = $validation->read($query);
        if ($stmt!=null) {
           $error.= "This Username is actually busy <br />";
       }
        $query = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $validation->read($query);
        if ($stmt!=null) {
           $error.= "This Email is actually busy <br />";
       }
        unset($stmt);
    } if(empty($error)&& empty($emailErr)&& empty($nameErr)&& empty($lastNameErr)&& empty($usernameErr)&& empty($passwordErr)&& empty($passwordConfirmErr)&& empty($errorMsg)&& empty($checkboxErr)) {
            $password= password_hash($password, PASSWORD_DEFAULT);
            $stmt = $core->insert($username,$password,$name,$lastName,$email) ;
            if($stmt){
                header("Location:index.php");
            }
        } 
}
?>

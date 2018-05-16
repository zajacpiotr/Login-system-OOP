<?php
 $pageTitle = "Register form";

include_once("layout_header.php");
include_once("Class/Validation.php");

$username= $name= $lastName= $email= $password= $passwordConfirm = "";
$msg= $errorMsg= $emailErr= $usernameErr= $lastNameErr= $nameErr= $error= $passwordConfirmErr= "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new Validation();
    
    $username = $_POST["username"];
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];
    
    $msg = $validation->checkEmpty($_POST, array("username", "password", "passwordConfirm", "name","lastName", "email"));
    $checkEmail = $validation->isEmailValid($_POST["email"]);
    $checkName = $validation->isValid($_POST["name"]);
    $checkUsername = $validation->isValidUsername($_POST["username"]);
    $checklastName = $validation->isValid($_POST["lastName"]);
    
    if($msg != null) {
            $errorMsg= $msg; 
    } elseif (!$checkEmail) {
            $emailErr= "Please enter correct Email";
    } elseif(!$checkName) {
            $nameErr="Please enter correct First Name";
    } elseif(!$checklastName) {
            $lastNameErr="Please enter correct Last Name";
    } elseif(!$checkUsername) {
            $usernameErr="Please enter correct Username";
    } elseif($password!=$passwordConfirm) {
            $passwordConfirmErr="Password isn't the same";
    } else { 
        $query = "SELECT * FROM users WHERE username = '$username'";
        $stmt = $validation->read($query);
        if ($stmt) {
           $error.= "This Username is actually busy <br />";
       }
        $query = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $validation->read($query);
        if ($stmt) {
           $error.= "This Email is actually busy <br />";
       }
    } 
}

?>
    <div id="conteiner">
        <form action="register.php" method="post">
            <div class="form-group">
                <h1>Register </h1>
                <p>Please fill the form to make new account.</p>
                <p>
                    <label for="inputUsername">Username:</label>
                    <input type="text" name="username" class="form-control" id="inputUsername" value="<?php echo $username; ?>">
                    <span class="error"><?php echo $usernameErr; ?></span>
                </p>
                <p>
                    <label for="inputPassword">Password:</label>
                    <input type="password" name="password" class="form-control" id="inputPassword" value="<?php echo $password; ?>">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPasswordConfirm">Confirm password:</label>
                    <input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConfirm" value="<?php echo $passwordConfirm; ?>">
                    <span class="error"><?php echo $passwordConfirmErr; ?></span>
                </p>
                <p>
                    <label for="inputName">First Name:</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $name; ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </p>
                <p>
                    <label for="inputLastName">Last Name:</label>
                    <input type="text" name="lastName" class="form-control" id="inputLastName" value="<?php echo $lastName; ?>">
                    <span class="error"><?php echo $lastNameErr; ?></span>
                </p>
                <p>
                    <label for="inputEmail">Email:</label>
                    <input type="text" name="email" class="form-control" id="inputEmail" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </p>
                <input type="submit" value="Register" class="btn btn-primary">
                <p class="error">
                    <?php echo $errorMsg;
                          echo $error; ?>
                </p>
            </div>
        </form>
    </div>

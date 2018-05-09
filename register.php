<?php
 $pageTitle = "Register form";

include_once("layout_header.php");
include_once("Class/Validation.php");

$email = $msg = $errorMsg = $emailErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new Validation();
    
    $email = $_POST['email'];
    
    $msg = $validation->checkEmpty($_POST, array('email'));
    $checkEmail = $validation->isEmailValid($email);
    
    if($msg != null) {
        $errorMsg= $msg; 
    } elseif (!$checkEmail) {
            $emailErr= "Podaj prawidłowy adres email";
        } else {
            
        }
    }

?>
    <div id="conteiner">
        <form action="register.php" method="post">
            <div class="form-groemailup">
                <h1>Register </h1>
                <p>Please fill the form to make new account.</p>
                <p>
                    <label for="inputUsername">Username:</label>
                    <input type="text" name="username" class="form-control" id="inputUsername">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPassword">Password:</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPasswordR">Repeat password:</label>
                    <input type="password" name="passwordR" class="form-control" id="inputPasswordR">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputName">First Name:</label>
                    <input type="text" name="name" class="form-control" id="inputName">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputLastName">Last Name:</label>
                    <input type="text" name="lastName" class="form-control" id="inputLastName">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputEmail">Email:</label>
                    <input type="text" name="email" class="form-control" id="inputEmail">
                    <span class="error"><?php echo $emailErr; ?></span>
                </p>
                <input type="submit" value="Register" class="btn btn-primary">
                <p class="error">
                    <?php echo $errorMsg; ?>
                </p>
            </div>
        </form>
    </div>

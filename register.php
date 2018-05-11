<?php
 $pageTitle = "Register form";

include_once("layout_header.php");
include_once("Class/Validation.php");

$username = $name = $lastName = $email = $password = "";
$msg = $errorMsg = $emailErr = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new Validation();
    
    $username = $_POST["username"];
    $name = $_POST["name"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    $msg = $validation->checkEmpty($_POST, array("username", "password", "passwordR", "name","lastName", "email"));
    $checkEmail = $validation->isEmailValid($_POST["email"]);
    $checkName = $validation->isValid($_POST["name"]);
    $checkUsername = $validation->isValidUsername($_POST["username"]);
    $checklastName = $validation->isValid($_POST["lastName"]);
    
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
            <div class="form-group">
                <h1>Register </h1>
                <p>Please fill the form to make new account.</p>
                <p>
                    <label for="inputUsername">Username:</label>
                    <input type="text" name="username" class="form-control" id="inputUsername" value="<?php echo $username; ?>">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPassword">Password:</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPasswordR">Confirm password:</label>
                    <input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConfirm">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputName">First Name:</label>
                    <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $name; ?>">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputLastName">Last Name:</label>
                    <input type="text" name="lastName" class="form-control" id="inputLastName" value="<?php echo $lastName; ?>">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputEmail">Email:</label>
                    <input type="text" name="email" class="form-control" id="inputEmail" value="<?php echo $email; ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </p>
                <input type="submit" value="Register" class="btn btn-primary">
                <p class="error">
                    <?php echo $errorMsg; ?>
                </p>
                <p class="error">
                    <?php echo $password; ?>
                </p>
            </div>
        </form>
    </div>

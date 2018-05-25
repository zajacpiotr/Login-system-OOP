<?php
$pageTitle = "Register form";

include_once("layout_header.php");
include_once("Class/Validation.php");
include_once("Class/Core.php");

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
    //$checkbox= $_POST["checkbox"];
        
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
            $passwordErr="Please enter correct password";
    } elseif($password!=$passwordConfirm) {
            $passwordConfirmErr="Password isn't the same";
    } elseif((empty($_POST["checkbox"]))) {
            $checkboxErr="To create new account you must authorisation to process personal data";
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
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <span class="error"><?php echo $passwordErr; ?></span>
                </p>
                <p>
                    <label for="inputPasswordConfirm">Confirm password:</label>
                    <input type="password" name="passwordConfirm" class="form-control" id="inputPasswordConfirm">
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
                <p class="inline-field">
                    <input type="checkbox" name="checkbox" />
                    <label for="checkbox">Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z ustawą o ochronie danych osobowych w celu ... . Podanie danych osobowych jest dobrowolne. Zostałem poinformowany, że przysługuje mi prawo dostępu do swoich danych, możliwości ich poprawienia, żądania zaprzestana ich przetwarzania. Administratorem danych jest (nazwa firmy z pełnym adresem).</label>
                    <span class="error"><?php echo $checkboxErr; ?></span>
                </p>
                <input type="submit" value="Register" class="btn btn-primary">
                <p class="success">
                    <?php //echo $insertMsg?>
                </p>
                <p class="error">
                    <?php echo $errorMsg;
                          echo $error; ?>
                </p>
            </div>
        </form>
    </div>

<?php
$pageTitle = "Login form";

include_once("layout_header.php");
include_once("Class/Validation.php");
include_once("Class/Core.php");

$username= $password= "";
$errorMsg= $error=  "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $validation = new Validation();
    $core = new Core();
    
    $msg = $validation->checkEmpty($_POST, array("username", "password"));
    
    $username= htmlspecialchars(strip_tags($_POST["username"]));
    $password= htmlspecialchars(strip_tags($_POST["password"]));
    
    if($msg != null) {
            $errorMsg= $msg; 
    } else { 
        $query = "SELECT username, password FROM users WHERE username = '$username'";
        $stmt = $validation->read($query);
        if (!$stmt) {
           $error.= "Unfortunetly login or password is incorrect.";
       } else {
            
            
        }
    }
}
?>
    <div class="col-sm-4 col-sm-offset-4">
        <form action="index.php" method="post">
            <div class="form-group">
                <h1>Login (under construction) </h1>
                <p>Please fill the form to access.</p>
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
                <input type="submit" value="Login" class="btn btn-primary">
                <p class="success">
                </p>
                <p class="error">
                    <?php echo $errorMsg;
                          echo $error;
                    ?>
                </p>
                <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            </div>
        </form>
    </div>

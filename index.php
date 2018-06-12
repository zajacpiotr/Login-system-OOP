<?php
$pageTitle = "Login form";

include_once("layout_header.php");
include_once("Class/Validation.php");
include_once("Class/Core.php");
include_once('indexLogic.php');

?>
    <div class="col-sm-4 col-sm-offset-4">
        <form action="index.php" method="post">
            <div class="form-group">
                <h1>Login</h1>
                <p>Please fill the form to access.</p>
                <p>
                    <label for="inputUsername">Username:</label>
                    <input type="text" name="username" class="form-control" id="inputUsername">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPassword">Password:</label>
                    <input type="password" name="password" class="form-control" id="inputPassword">
                    <span class="error"><?php echo $passwordErr; ?></span>
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

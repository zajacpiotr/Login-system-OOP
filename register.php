<?php
$pageTitle = 'Register form';

include_once('layout_header.php');
include_once('login_header.php');
include_once('Class/Validation.php');
include_once('Class/Core.php');
include_once('registerLogic.php')


?>
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
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
                        <label for="checkbox"><span>I declare that I have read the </span> <a type="button" class="popover-btn" data-container="body" data-toggle="popover" data-placement="top" data-content="I consent to the processing of my personal data in accordance with the Law on the Protection of Personal Data for the purpose .... Providing personal information is voluntary. I have been informed that I have the right to access my data, the possibility of correcting it and removing it. The data administrator is (company name with full address).">terms and conditions</a><span>.</span></label><br>
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
    </div>
    <script>
        type = "text/javascript"
        window.addEventListener("DOMContentLoaded", popover);

    </script>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php
 $pageTitle = "Register form";

 include_once("layout_header.php");
?>
    <div id="conteiner">
        <form action="register.php" method="post">
            <div class="form-group">
                <h1>Register </h1>
                <p>Please fill the form to make new account.</p>
                <p>
                    <label for="inputUsername">Username:</label>
                    <input type="text" name="username" class="form-control" id="inputUsername">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPassword">Password:</label>
                    <input type="text" name="password" class="form-control" id="inputPassword">
                    <span class="error"></span>
                </p>
                <p>
                    <label for="inputPasswordR">Repeat password:</label>
                    <input type="text" name="passwordR" class="form-control" id="inputPasswordR">
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
                <input type="submit" value="Register" class="btn btn-primary">
                <p class="error">
                </p>
            </div>
        </form>
    </div>

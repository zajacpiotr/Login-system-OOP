<?php
include_once('session.php');
$pageTitle = 'Edit Password';
include_once('layout_header.php');
//include_once('editLogic.php');
?>
    <div class='col-sm-4 col-sm-offset-4'>
        <form action='edit.php' method='post'>
            <div class='form-group'>
                <h1>Edit Password (under construction)</h1>
                <p>
                    <label for='inputOldPassword'>Old Password:</label>
                    <input type='password' name='passwordOld' class='form-control' id='inputOldPassword'>
                    <span class='error'></span>
                </p>
                <p>
                    <label for='inputPassword'>New Password:</label>
                    <input type='password' name='password' class='form-control' id='inputPassword'>
                    <span class='error'></span>
                </p>
                <p>
                    <label for='inputPasswordConfirm'>Confirm New Password:</label>
                    <input type='password' name='passwordConfirm' class='form-control' id='inputPasswordConfirm'>
                    <span class='error'></span>
                </p>
                <input type='submit' value='Change' class='btn btn-primary'>

                <p class='error'>
                </p>

            </div>
        </form>
    </div>

<?php
include_once('session.php');
$pageTitle = 'Welcome page';
include_once('layout_header.php');
?>
    <div class='row page-header'>
        <div class='col-xs-4 col-xs-offset-4'>
            <h2>Hi, <b><?php echo $_SESSION['username']; ?></b>. Welcome to our site.</h2>
        </div>
    </div>
    <div class='row'>
        <div class='col-xs-2 col-xs-offset-1'>
            <p><a href='edit.php' class='btn btn-primary'>Edit password</a></p>
        </div>
        <div class='col-xs-2 col-xs-offset-7'>
            <p><a href='logout.php' class='btn btn-danger'>Sign Out</a></p>
        </div>
    </div>

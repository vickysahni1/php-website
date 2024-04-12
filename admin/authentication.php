<?php
session_start();
include('config/dbcom.php');


if(!isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Login First...";
    header("Location: ../login.php");
    exit(0);
}
else
{
    if($_SESSION['auth_role'] != "1")
    {
        $_SESSION['message'] = "You can't access";
        header("Location: ../login.php");
        exit(0);

    }
}
?>
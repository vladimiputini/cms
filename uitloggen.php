<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 02/07/18
 * Time: 18:07
 */
session_start();
//$_SESSION['ingelogd'] = "0";
session_unset();
session_destroy();
header("location:index.php");
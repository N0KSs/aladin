<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['login'])) {
    header("location: ./login.php");
}

require_once "../vue/index.view.php";

?>
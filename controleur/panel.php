<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// On vérifie tout de même que les utilisateurs sont bien des admins/superadmins.
if($_SESSION['roleId'] == 0) { 
    header('location: ./index.php');
}


require_once "../vue/panel.view.php";

?>
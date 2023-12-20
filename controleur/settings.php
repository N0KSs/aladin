<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "../modele/classes/UserDAO.class.php";
$userDAO = new UserDAO();

// On vérifie tout de même que les utilisateurs sont bien des admins/superadmins.
if (!isset($_SESSION['username'])) {
    header("location: ./login.php");
}


$identifiants["fname"] = isset($_SESSION["fname"]) ? $_SESSION["fname"] : "N/A";
$identifiants["lname"] = isset($_SESSION["lname"]) ? $_SESSION["lname"] : "N/A";
// Amélioration : D'abord check le POST puis la SESSION

// Si on détecte un changement :
if (isset($_POST["save"])) {
    if ($_POST["fname"] != $identifiants["fname"] || $_POST["lname"] != $identifiants["lname"]) {
        foreach ($_POST as $key => $value) {
            if ($key != "save") {
                $userDAO->updateValue($_SESSION["username"], $value, $key);
                $_SESSION[$key] = $value;
            };
        }
    }
}


require_once "../vue/settings.view.php";

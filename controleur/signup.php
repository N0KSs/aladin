<?php
session_start();
require_once "../modele/connexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$identifiants['login'] = isset($_POST['username']) ? $_POST['username'] : null;
$identifiants['motDePasse'] = isset($_POST['pwd']) ? $_POST['pwd'] : null;
$message = "";

if (isset($_POST['signing-in'])) {
    header("location: ./login.php");
} else if (isset($_POST['signing-up'])) {
    $message .= (!isset($_POST["lname"]) ? "- nom <br/>" : "");
    $message .= (!isset($_POST["fname"]) ? "- prénom <br/>" : "");
    $message .= (!isset($_POST["mail"]) ? "-e-mail <br/>" : "");
    $message .= (!isset($_POST["pwd"]) ? "- mot de passe <br/>" : "");
    $message .= (!isset($_POST["pwd2"]) ? "- confirmation mot de passe <br/>" : "");
    $message .= ($_POST["pwd"] != $_POST["pwd2"] ? "- mots de passe non identiques" : "" );

    if (strlen($message) == 0) {
        $connexion = new Connexion();
        // Inscrire et mettre en session l'utilisateur :
        $connexion->inscrire($_POST["lname"], $_POST["fname"], $_POST["mail"], $_POST["pwd"]);

        header("location: ./index.php");
    } else {
        $message = "Erreurs aux champs suivants :<br/>".$message;
    }
}


require_once "../vue/signup.view.php";

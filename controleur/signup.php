<?php
session_start();
require_once "../modele/connexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$identifiants['lname'] = isset($_POST['lname']) ? $_POST['lname'] : null;
$identifiants['fname'] = isset($_POST['fname']) ? $_POST['fname'] : null;
$identifiants['mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
$identifiants['pwd'] = isset($_POST['pwd']) ? $_POST['pwd'] : null;
$identifiants['pwd2'] = isset($_POST['pwd2']) ? $_POST['pwd2'] : null;
$message = "";

if (isset($_POST['signing-in'])) {
    header("location: ./login.php");
} else if (isset($_POST['signing-up'])) {
    $message .= ((!isset($identifiants["lname"]) || strlen($identifiants["lname"]) == 0) ? "- nom <br/>" : "");
    $message .= ((!isset($identifiants["fname"]) || strlen($identifiants["fname"]) == 0) ? "- prénom <br/>" : "");
    $message .= ((!isset($identifiants["mail"]) || strlen($identifiants["mail"]) == 0) ? "-e-mail <br/>" : "");
    $message .= ((!isset($identifiants["pwd"])  || strlen($identifiants["pwd"]) == 0)? "- mot de passe <br/>" : "");
    $message .= ((!isset($identifiants["pwd2"]) || strlen($identifiants["pwd2"]) == 0) ? "- confirmation mot de passe <br/>" : "");
    $message .= ($identifiants["pwd"] != $identifiants["pwd2"] ? "- mots de passe non identiques" : "" );

    if (strlen($message) == 0) {
        $connexion = new Connexion();
        // Inscrire et mettre en session l'utilisateur :
        $connexion->inscrire($_POST["lname"], $_POST["fname"], $_POST["mail"], $_POST["pwd"]);

        header("location: ./index.php");
    } else {
        if(strlen($message) < 13) $message = "Erreur au champ suivant :".$message;
        else $message = "Erreurs aux champs suivants :<br/>".$message;
    }
}


require_once "../vue/signup.view.php";

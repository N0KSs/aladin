<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// if (!isset($_SESSION['login'])) {
//     header("location: ./login.php");
// }

// Génération dynamique du catalogue :
// Explication étant donné la lisibilité du code : Nous parcourons le tableau des produits sur la base de données. Les attributs de chaque élément sont alors assignés dynamiquement à des balises HTML.

// $produits = 

require_once "../vue/index.view.php";

?>
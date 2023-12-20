<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../modele/classes/ProduitDAO.class.php";
$produitDAO = new ProduitDAO();
$cartList = "";
if(count($_SESSION["cart"]) == 0) {
    // PANIER VIDE
    header("location: ./index.php");
}

foreach ($_SESSION['cart'] as $idProduit) {
    $produit = $produitDAO->getById($idProduit);
    $cartList .= '<p>- '.$produit->getName().' : '.$produit->getPrice().'$</p>'; 
}

require_once "../vue/checkout.view.php";

?>
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../modele/classes/ProduitDAO.class.php";

// if (!isset($_SESSION['login'])) {
//     header("location: ./login.php");
// }

// Génération dynamique du catalogue :
// Explication du code : Nous parcourons le tableau des produits sur la base de données. Les attributs de chaque élément sont alors assignés dynamiquement à des balises HTML.

$produitDAO = new ProduitDAO();
$produits = $produitDAO->getAll();
$dynamicHTML = '<div class="produits">';
foreach ($produits as $produit) {
    $dynamicHTML .= '<div class="carte">';
        $dynamicHTML .= '<div class="img"><img src="'.$produit->getImgUrl().'"></div>';
        $dynamicHTML .= '<div class="desc">'.$produit->getDescription().'</div>';
        $dynamicHTML .= '<div class="titre">'.$produit->getName().'</div>';
        $dynamicHTML .= '<div class="box">';
            $dynamicHTML .= '<div class="prix">'.$produit->getPrice().'$</div>';
            $dynamicHTML .= '<button class="achat">Ajouter au panier</button>';
    $dynamicHTML .= '</div></div>';
}
$dynamicHTML .= '</div>';

require_once "../vue/index.view.php";

?>
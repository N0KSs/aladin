
<?php
require_once dirname(__DIR__, 1) . "/connexion.php";
require_once __DIR__ . "/Produit.class.php";

/**
 * ProduitDAO
 * DAO : Permets de manipuler les données de la table product
 */
class ProduitDAO
{
    private Connexion $bd;
    private string $select;

    public function __construct()
    {
        $this->bd = new Connexion();
        $this->select = 'SELECT * FROM product';
    }

    /**
     * loadQuery
     * Transforme un résultat SQL en tableau d'instance de la classe correspondante
     * @param  array $result
     * @return Produit[]
     */
    private function loadQuery(array $result): array
    {
        $produits = [];
        foreach ($result as $row) {
            $produit = new Produit();
            $produit->setId($row['id']);
            $produit->setName($row['name']);
            $produit->setQuantity($row['quantity']);
            $produit->setPrice($row['price']);
            $produit->setImgUrl($row['img_url']);
            $produit->setDescription($row['description']);
            $produits[] = $produit;
        }
        return $produits;
    }

    /**
     * getAll
     * Récupère tous les produits de la DB
     * @return Produit[]
     */
    public function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    /**
     * getById
     * Récupère un produit à partir de son ID
     * @param  string $id
     * @return Produit
     */
    public function getById(string $id): Produit
    {
        $produit = new Produit();
        $result = $this->bd->execSQL($this->select . " WHERE id=:id", [':id' => $id]);
        $produits = $this->loadQuery($result);

        if (count($produits) > 0) {
            $produit = $produits[0];
        }

        return $produit;
    }
}

?>
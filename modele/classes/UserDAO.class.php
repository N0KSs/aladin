
<?php
require_once dirname(__DIR__, 1) . "/connexion.php";
require_once __DIR__ . "/User.class.php";

/**
 * UserDAO
 * DAO : Permets de manipuler les données de la table product
 */
class UserDAO
{
    private Connexion $bd;
    private string $select;

    public function __construct()
    {
        $this->bd = new Connexion();
        $this->select = 'SELECT * FROM user';
    }

    /**
     * loadQuery
     * Transforme un résultat SQL en tableau d'instance de la classe correspondante
     * @param  array $result
     * @return User[]
     */
    private function loadQuery(array $result): array
    {
        $users = [];
        foreach ($result as $row) {
            $user = new User();
            $user->setId($row['id']);
            $user->setUserName($row['user_name']);
            $user->setEmail($row['email']);
            $user->setPwd($row['pwd']);
            $user->setFirstName($row['fname']);
            $user->setLastName($row['lname']);
            $user->setBillingAddressId($row['billing_address_id']);
            $user->setShippingAddressId($row['shipping_address_id']);
            $user->setToken($row['token']);
            $user->setRoleId($row['role_id']);
            $users[] = $user;
        }
        return $users;
    }


    /**
     * getAll
     * Récupère tous les users de la DB
     * @return User[]
     */
    public function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

/**
 * insert
 * Insère un utilisateur dans la DB et renvoie l'utilisateur inséré
 * @param  User $user
 * @return User|null L'utilisateur inséré, ou null en cas d'échec
 */
public function insert(User $user): ?User
{
    $userName = $this->generateUniqueUserName($user->getFirstName(), $user->getLastName());
    $hashedPassword = password_hash($user->getPwd(), PASSWORD_DEFAULT);

    $this->bd->execSQL(
        "INSERT INTO user (user_name, email, pwd, fname, lname, billing_address_id, shipping_address_id, token, role_id)
        VALUES (:user_name, :email, :pwd, :fname, :lname, :billing_address_id, :shipping_address_id, :token, :role_id)",
        [
            ':user_name' => $userName,
            ':email' => $user->getEmail(),
            ':pwd' => $hashedPassword,
            ':fname' => $user->getFirstName(),
            ':lname' => $user->getLastName(),
            ':billing_address_id' => $user->getBillingAddressId(),
            ':shipping_address_id' => $user->getShippingAddressId(),
            ':token' => $user->getToken(),
            ':role_id' => $user->getRoleId()
        ]
    );

    $lastInsertId = $this->bd->getLastInsertId();

    // Si l'insertion a réussi, créer et renvoyer l'utilisateur inséré
    if ($lastInsertId) {
        $user->setId($lastInsertId);
        return $user;
    }

    // En cas d'échec, retourner null
    return null;
}

    /**
     * isUserNameExists
     * Vérifie si un nom d'utilisateur existe déjà dans la base de données.
     * @param string $userName
     * @return bool True si le nom d'utilisateur existe, sinon False.
     */
    private function isUserNameExists(string $userName): bool
    {
        // Utilisez une requête SQL pour vérifier si le nom d'utilisateur existe déjà dans la base de données
        $result = $this->bd->execSQL(
            "SELECT COUNT(*) as count FROM user WHERE user_name = :user_name",
            [':user_name' => $userName]
        );

        // Récupérez le nombre de lignes résultantes
        $count = $result[0]['count'];

        // Si le nombre de lignes est supérieur à zéro, le nom d'utilisateur existe déjà
        return $count > 0;
    }

    /**
     * generateUniqueUserName
     * Génère un nom d'utilisateur unique basé sur le nom et le prénom.
     * Vérifie la disponibilité dans la base de données et ajoute un chiffre si nécessaire.
     * @param string $firstName
     * @param string $lastName
     * @return string Nom d'utilisateur unique
     */
    public function generateUniqueUserName(string $firstName, string $lastName): string
    {
        // Convertir le prénom et le nom en minuscules et supprimer les espaces
        $firstName = strtolower(str_replace(' ', '', $firstName));
        $lastName = strtolower(str_replace(' ', '', $lastName));

        // Nom d'utilisateur initial basé sur le prénom et le nom
        $userName = $firstName . $lastName;

        // Vérifier la disponibilité du nom d'utilisateur
        $count = 0;
        $originalUserName = $userName;
        while ($this->isUserNameExists($userName)) {
            $count++;
            $userName = $originalUserName . $count;
        }

        return $userName;
    }

        /**
     * updateValue
     * Mets à jour un champ précis, pour un utilisateur précis, à une valeur précise.
     * @param  string $username Pseudo de l'utilisateur
     * @param  string $value Valeur remplaçante
     * @param  string $field Champ concerné
     * @return void
     */
    public function updateValue(string $username, string $value, string $field): void
    {
        $req = "UPDATE user SET " . $field . " = :val WHERE user_name = :username";
        $this->bd->execSQL($req, [":val" => $value, ":username" => $username]);
    }

}

?>
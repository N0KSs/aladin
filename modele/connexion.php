<?php

// require_once "../utils/functions.php";
require_once "../modele/classes/UserDAO.class.php";
require_once "../modele/classes/User.class.php";
/**
 * Connexion
 * Permets de se connecter à la base de donnée et gère le LOGIN
 */

class Connexion
{
    private $db;

    /**
     * __construct
     *
     * Permets de se connecter à la base de donnée
     */
    function __construct()
    {
        $db_config['SGBD'] = 'mysql';
        $db_config['HOST'] = 'localhost';
        $db_config['DB_NAME'] = 'aladin';
        $db_config['USER'] = 'root';
        $db_config['PASSWORD'] = NULL;

        try {
            $this->db = new PDO(
                $db_config['SGBD'] . ':host=' . $db_config['HOST'] . ';dbname=' . $db_config['DB_NAME'],
                $db_config['USER'],
                $db_config['PASSWORD'],
                array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            );
            unset($db_config);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }
    }


    /**
     * execSQL
     *
     * @param  string $req Requête SQL à executer
     * @param  array $valeurs Paramètre de la Requête SQL
     * @return array Colonnes retournées suite à la requête (si colonnes).
     */
    public function execSQL(string $req, array $valeurs = []): array
    {
        $res = $this->db->prepare($req);

        try {
            $res->execute($valeurs);
        } catch (Exception $exception) {
            die($exception->getMessage());
        }

        $allRes = $res->fetchAll(PDO::FETCH_ASSOC);

        return $allRes;
    }

    /**
     * existeUtilisateur
     *
     * @param  array $identifiants 
     * @return bool Est vrai si l'utilisateur existe sinon faux
     */
    public function existeUtilisateur(array $identifiants): bool
    {
        $req = "SELECT * FROM user WHERE user_name=:identifiant";
        $allRes = $this->execSQL($req, [":identifiant" => $identifiants["login"]]);

        if (count($allRes) > 0) return true;
        else return false;
    }

    /**
     * getLastInsertId
     * Récupère l'id du dernier enregistrement inséré
     * @return string
     */
    public function getLastInsertId(): string
    {
        return $this->db->lastInsertId();
    }

    /**
     * verifMdp
     *
     * @param  array $identifiants Tableau contenant le login entré par un USER
     * @return bool Renvoie vrai si les infos entrées sont correctes sinon faux
     */
    public function verifMdp(array $identifiants): bool
    {
        $req = "SELECT * FROM user WHERE user_name=:pseudo";
        $allRes = $this->execSQL($req, [":pseudo" => $identifiants["username"]]);

        $verifMdp = password_verify($identifiants["pwd"], $allRes[0]['pwd']);
        if ($verifMdp) {
            $_SESSION['username'] = $identifiants['username'];
            $_SESSION['nom'] = $allRes[0]['lname'];
            $_SESSION['prenom'] = $allRes[0]['fname'];
            $_SESSION['pwd'] = $identifiants['pwd']; // Mot de passe sans HASH
            $_SESSION['roleId'] = $allRes[0]["role_id"];
            return true;
        } else return false;
    }

    /**
     * inscrire
     * Inscris un utilisateur, l'ajoute à la DB et affecte sa variable de ssions en conséquence.
     * @param  string $lname
     * @param  string $fname
     * @param  string $mail
     * @param  string $pwd
     * @return int
     */
    public function inscrire(string $lname, string $fname, string $mail, string $pwd)
    {
        // Une amélioration aurait été d'ajouter un trigger à la table user créant automatiquement l'username unique, on ne peut pas modifier la structure de la DB donc nous ne le ferons pas.

        $userDAO = new UserDAO();
        // On crée un utilisateur à partir de nos données.
        // # Les champs vides seront (possiblement) modifié ultérieurement.
        $user = new User(0, "", $mail, $pwd, $fname, $lname, 0, 0, "", 1);
        $newUser = $userDAO->insert($user);

        // L'utilisateur est inséré dans la DB, on l'assigne à la session :
        if (isset($newUser)) {
            $_SESSION['username'] = $newUser->getUserName();
            $_SESSION['prenom'] = $newUser->getFirstName();
            $_SESSION['pwd'] = $pwd; // Mot de passe sans HASH
            $_SESSION['nom'] = $newUser->getLastName();
            $_SESSION['roleId'] = $newUser->getRoleId();
            // D'autres informations seront ajoutés au fur et à mesure des besoins
            return 0;
        } else return -1;
    }
}

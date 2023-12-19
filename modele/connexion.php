<?php
require_once __DIR__. "/util/functions.php";


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
    public function execSQL(string $req, array $valeurs = []):array
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
    public function existeUtilisateur (array $identifiants) : bool {
        $req = "SELECT * FROM user WHERE user_name=:identifiant";
        $allRes = $this->execSQL($req, [":identifiant" => $identifiants["login"]]);
    
        if(count($allRes) > 0) return true;
        else return false;
    } 
        
    /**
     * getRole
     * Renvoie le rôle d'un user
     * @param  string $login
     * @return array
     */
    public function getRole (string $login) : array {
        $req = "SELECT * FROM role WHERE role.role_id = user.role_id AND user_username=:login";
        $allRes = $this->execSQL($req, [":login" => $login]);
    
        return $allRes;
    } 

    /**
     * verifMdp
     *
     * @param  array $identifiants Tableau contenant le login entré par un USER
     * @return bool Renvoie vrai si les infos entrées sont correctes sinon faux
     */
    public function verifMdp(array $identifiants): bool{
        $req = "SELECT * FROM conducteur WHERE no_permis=:identifiant";
        $allRes = $this->execSQL($req, [":identifiant" => $identifiants["login"]]);
        
        $verifMdp = password_verify($identifiants["motDePasse"], $allRes[0]['pwd']);
        if($verifMdp) {
            $_SESSION['login'] = $identifiants['login'];
            $_SESSION['mdp'] = $identifiants['motDePasse'];
            $_SESSION['prenom'] = $allRes[0]['fname'];
            $_SESSION['nom'] = $allRes[0]['lname'];
            $_SESSION['id'] = $allRes[0]['id'];
            $_SESSION['role'] = $this->getRole($identifiants["login"]);
 
            
            return true;
        } else return false;
    }

}

?>
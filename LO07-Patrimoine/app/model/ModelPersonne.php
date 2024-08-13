<!-- ----- debut ModelProducteur -->

<?php
require_once 'Model.php';

class ModelPersonne
{
    private $id, $nom, $prenom, $login, $password, $statut;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $login = NULL, $password = NULL, $statut = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->login = $login;
            $this->password = $password;
            $this->statut = $statut;
         
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom2)
    {
        $this->nom = $nom2;
    }

    public function setPrenom($prenom2)
    {
        $this->prenom = $prenom2;
    }

    public function setLogin($login2)
    {
        $this->login = $login2;
    }

    public function setPassword($password2)
    {
        $this->password = $password2;
    }

    public function setStatut($statut2)
    {
        $this->statut = $statut2;
    }

    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllClients() {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut = 1";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllAdministrateurs() {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut = 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        }
        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // retourne une personne pour un login et mot de passe donné
    public static function getOne($login, $password)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login= :login AND password= :password";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
                'password' => $password
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOnebyId($id)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getOnebylogin($login)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login= :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMaxId()
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT MAX(id) FROM personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results[0]['MAX(id)'];
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function getJob($login)
    {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM personne WHERE login= :login";
            $statement = $database->prepare($query);
            $statement->execute([
                'login' => $login,
            ]);

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $job = $results[0]['statut'];

            if ($job == 0) {
                return "administrateur";
            } else if ($job == 1) {
                return "client";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function createaccount($nom, $prenom, $login, $password, $statut)
    {
        try {
            $database = Model::getInstance();
            $id = ModelPersonne::getMaxId() + 1;
            $statut = intval($statut);
            $query = "INSERT INTO personne (id, nom, prenom, login, password, statut) VALUES (:id, :nom, :prenom, :login, :password, :statut)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'login' => $login,
                'password' => $password,
                'statut' => $statut,
            ]);
            
            $_SESSION['id'] = -1;
            $_SESSION['statut'] = '/';
            $_SESSION['nomcomplet'] = 'non-connecté';
            $_SESSION['login'] = 'vide';
            //$_SESSION['login'] = $login;
            //$_SESSION['statut'] = ModelPersonne::getJob($login);
            //$_SESSION['nomcomplet'] = $nom . " " . $prenom;
            //$_SESSION['id'] = $id;
            return true;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }


    
}
?>
<!-- ----- fin ModelVin -->
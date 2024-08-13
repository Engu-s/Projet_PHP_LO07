<?php

require_once 'Model.php';

class ModelCompte{
    
    private $id, $label, $montant, $banque_id, $personne_id;
    
    public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL){
        if (!is_null($id)){
            $this->id = $id;
            $this->label = $label;
            $this->montant = $montant;
            $this->banque_id = $banque_id;
            $this->personne_id = $personne_id;
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getLabel(){
        return $this->label;
    }
    
    public function getMontant(){
        return $this->montant;
    }
    
    public function getBanqueId(){
        return $this->banque_id;
    }
    
    public function getPersonneId(){
        return $this->personne_id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setLabel($label){
        $this->label = $label;
    }
    
    public function setMontant($montant){
        $this->montant = $montant;
    }
    
    public function setBanqueId($id){
        $this->banque_id = $id;
    }
    
    public function setPersonneId($id){
       $this->personne_id = $id;
    }
    
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from compte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function getById($id){
        try {
            $database = Model::getInstance();
            $query = "select * from compte where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getByBanque($banque_id){
        try {
            $database = Model::getInstance();
            $query = "select * from compte where banque_id = :banque_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'banque_id' => $banque_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getByPersonne($personne_id){
        try {
            $database = Model::getInstance();
            $query = "select * from compte where personne_id = :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function updateMontantCompte($montant, $id){
        
        try {
            $database = Model::getInstance();
            $query = "UPDATE compte SET montant = :montant WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'montant' => $montant,
                'id' => $id
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }
    
    public static function insert($label, $montant, $banque_id, $personne_id)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from compte";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into compte value (:id, :label, :montant, :banque_id, :personne_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'montant' => $montant,
                'banque_id' => $banque_id,
                'personne_id' => $personne_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
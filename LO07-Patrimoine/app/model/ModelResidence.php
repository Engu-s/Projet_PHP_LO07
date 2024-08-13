<?php

require_once 'Model.php';

class ModelResidence{
    
    private $id, $label, $ville, $prix, $personne_id;
    
    public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, $personne_id = NULL){
        if (!is_null($id)){
            $this->id = $id;
            $this->label = $label;
            $this->ville = $ville;
            $this->prix = $prix;
            $this->personne_id = $personne_id;
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getLabel(){
        return $this->label;
    }
    
    public function getVille(){
        return $this->ville;
    }
    
    public function getPrix(){
        return $this->prix;
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
    
    public function setVille($ville){
        $this->ville = $ville;
    }
    
    public function setPrix($prix){
        $this->prix = $prix;
    }
    
    public function setPersonneId($id){
       $this->personne_id = $id;
    }
    
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from residence";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAllById($personne_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from residence where personne_id = :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAllUnderPriceExpectId($prix, $personne_id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from residence where prix < :prix and personne_id != :personne_id ";
            $statement = $database->prepare($query);
            $statement->execute([
                'prix' => $prix,
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAllByResidenceId($id)
    {
        try {
            $database = Model::getInstance();
            $query = "select * from residence where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getAllExceptId($personne_id){
        try {
            $database = Model::getInstance();
            $query = "select * from residence where personne_id != :personne_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function transfertResidence($personne_id, $id){
        try {
            $database = Model::getInstance();
            $query = "UPDATE residence SET personne_id = :personne_id WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'personne_id' => $personne_id,
                'id' => $id
            ]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        }
    }
}
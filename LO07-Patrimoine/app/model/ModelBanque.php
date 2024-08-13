<?php

require_once 'Model.php';

class ModelBanque{
    
    private $id, $label, $pays;
    
    public function __construct($id = NULL, $label = NULL, $pays = NULL){
        if (!is_null($id)){
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
        }
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function getLabel(){
        return $this->label;
    }
    
    public function getPays(){
        return $this->pays;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setLabel($label){
        $this->label = $label;
    }
    
    public function setPays($pays){
        $this->pays = $pays;
    }
    
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getOneById($id){
        try {
            $database = Model::getInstance();
            $query = "select * from banque where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getOneByLabel($label){
        try {
            $database = Model::getInstance();
            $query = "select * from banque where label = :label";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function insert($label, $pays)
    {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from banque";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into banque value (:id, :label, :pays)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'pays' => $pays,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
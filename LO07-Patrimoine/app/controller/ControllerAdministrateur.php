<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';

class ControllerAdministrateur
{
    
    public static function banqueReadAll()
    {
        include 'config.php';
        $results = ModelBanque::getAll();
        $vue = $root . '/app/view/administrateur/viewBanqueReadAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function banqueCreate()
    {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewBanqueCreate.php';
        require($vue);
    }

    
    public static function banqueCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelBanque::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['pays'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewBanqueCreated.php';
        require($vue);
    }
    
    public static function banqueSelect(){
        include 'config.php';
        $results = ModelBanque::getAll();
        $vue = $root.'/app/view/administrateur/viewSelectBanque.php';
        require($vue);
    }
    
    public static function banqueSelected(){
        $banque_id = $_GET['banque'];
        $banque_nom = ModelBanque::getOneById($banque_id)[0]->getLabel();
        $results = ModelCompte::getByBanque($banque_id);
        include 'config.php';
        $vue = $root.'/app/view/administrateur/viewBanqueSelected.php';
        require($vue);
    }
    
    public static function adminReadAll()
    {
        include 'config.php';
        $results = ModelPersonne::getAllAdministrateurs();
        $vue = $root . '/app/view/administrateur/viewAdminAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function clientReadAll()
    {
        include 'config.php';
        $results = ModelPersonne::getAllClients();
        $vue = $root . '/app/view/administrateur/viewClientAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function compteReadAll()
    {
        include 'config.php';
        
        $results = ModelCompte::getAll();
        
        usort($results, function($left, $right) {
            if($left->getMontant() == $right->getMontant()) {
                return 0;
            }

           if($left->getMontant() > $right->getMontant()) {
                return 1;
           }
           else {
                return -1;
           }
        });
        
        $banqueLabels = array();
        $clientFullName = array();
        foreach ($results as $element){
            $banque = ModelBanque::getOneById($element->getBanqueId())[0];
            array_push($banqueLabels, $banque->getLabel());
            $client = ModelPersonne::getOnebyId($element->getPersonneId())[0];
            $fullName = "".$client->getNom()." ".$client->getPrenom()."";
            array_push($clientFullName, $fullName);
        }
        $vue = $root . '/app/view/administrateur/viewCompteAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function residenceReadAll()
    {
        include 'config.php';
        $results = ModelResidence::getAll();
        usort($results, function($left, $right) {
            if($left->getPrix() == $right->getPrix()) {
                return 0;
            }

           if($left->getPrix() > $right->getPrix()) {
                return 1;
           }
           else {
                return -1;
           }
        });
        $clientFullName = array();
        foreach ($results as $element){
            $client = ModelPersonne::getOnebyId($element->getPersonneId())[0];
            $fullName = "".$client->getNom()." ".$client->getPrenom()."";
            array_push($clientFullName, $fullName);
        }
        $vue = $root . '/app/view/administrateur/viewResidenceAll.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
}
?>
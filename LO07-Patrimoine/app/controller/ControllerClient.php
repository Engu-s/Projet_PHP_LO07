<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelResidence.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';

class ControllerClient
{
    
    public static function patrimoineClient()
    {
        include 'config.php';
        $client = ModelPersonne::getOnebyId($_SESSION['id'])[0];
        $fullName = "".$client->getNom()." ".$client->getPrenom()."";
        $results_residence = ModelResidence::getAllById($_SESSION['id']);
        $results_compte = ModelCompte::getByPersonne($_SESSION['id']);
        $total_comptes = array_reduce($results_compte, function($sum, $compte) {
            return $sum + $compte->getMontant();
        }, 0);

        $total_residences = array_reduce($results_residence, function($sum, $residence) {
            return $sum + $residence->getPrix();
        }, 0);

        $total_patrimoine = $total_comptes + $total_residences;
        $vue = $root . '/app/view/client/viewPatrimoine.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function compteReadById()
    {
        include 'config.php';
        $results = ModelCompte::getByPersonne($_SESSION['id']);
        $vue = $root . '/app/view/client/viewCompteById.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function residenceReadById()
    {
        include 'config.php';
        $results = ModelResidence::getAllById($_SESSION['id']);
        $client = ModelPersonne::getOnebyId($_SESSION['id'])[0];
        $fullName = "".$client->getNom()." ".$client->getPrenom()."";
        $vue = $root . '/app/view/client/viewResidenceById.php';
        if (DEBUG)
            echo ("ControllerAdministrateur : accueil : vue = $vue");
        require($vue);
    }
    
    public static function compteCreate()
    {
        // ----- Construction chemin de la vue
        $results = ModelBanque::getAll();
        $client = ModelPersonne::getOnebyId($_SESSION['id'])[0];
        $fullName = "".$client->getNom()." ".$client->getPrenom()."";
        include 'config.php';
        $vue = $root . '/app/view/client/viewCompteCreate.php';
        require($vue);
    }

    
    public static function compteCreated()
    {
        // ajouter une validation des informations du formulaire
        $results = ModelCompte::insert(
            htmlspecialchars($_GET['label']),
            htmlspecialchars($_GET['montant']),
            htmlspecialchars($_GET['banque_id']),
            htmlspecialchars($_SESSION['id'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewCompteCreated.php';
        require($vue);
    }
    
    public static function transfertInterCompte(){
        // ----- Construction chemin de la vue
        $results = ModelCompte::getByPersonne($_SESSION['id']);
        include 'config.php';
        $vue = $root . '/app/view/client/viewTransfert.php';
        require($vue);
    }
    
    public static function resultatTransfertInterCompte(){
        include 'config.php';
        if (!(is_null($_GET['compte1'])|| is_null($_GET['compte2']))){
            $results = ModelCompte::getByPersonne($_SESSION['id']);
            $compte1 = ModelCompte::getById($_GET["compte1"]);
            $montant1 = $_GET['montant1'];
            $compte2 = ModelCompte::getById($_GET["compte2"]);
            $vue = $root . '/app/view/client/viewResultatTransfert.php';
            if ($compte1 == $compte2){
                $vue = $root . '/app/view/client/viewTransfert.php';
            } else if ($montant1 > $compte1[0]->getMontant()){
                $vue = $root . '/app/view/client/viewTransfert.php';
            } else {
                $newMontant1 = $compte1[0]->getMontant() - $montant1;
                $newMontant2 = $compte2[0]->getMontant() + $montant1;

                ModelCompte::updateMontantCompte($newMontant1, $compte1[0]->getId());
                ModelCompte::updateMontantCompte($newMontant2, $compte2[0]->getId());

                $compte1 = ModelCompte::getById($_GET["compte1"]);
                $compte2 = ModelCompte::getById($_GET["compte2"]);
            }
        } else {
            $vue = $root . '/app/view/client/viewTransfert.php';
        }
        require($vue);
    }
    
    public static function residenceSelect(){
        include 'config.php';
        $results = ModelResidence::getAllExceptId($_SESSION["id"]);
        $vue = $root.'/app/view/client/viewChoixResidence.php';
        require($vue);
    }
    
    public static function residenceSelected(){
        $results = ModelResidence::getAllExceptId($_SESSION["id"]);
        $residenceChoisi = ModelResidence::getAllByResidenceId($_GET["residenceChoisi"])[0];
        $prix = $residenceChoisi->getPrix();
        $comptesAcheteur = ModelCompte::getByPersonne($_SESSION['id']);
        $comptesVendeur = ModelCompte::getByPersonne($residenceChoisi->getPersonneId());
        
        include 'config.php';
        
        $vue = $root.'/app/view/client/viewAchatResidence.php';
        require($vue);
    }
    
    public static function residenceAchete(){
        include 'config.php';
        $residenceChoisi = $_GET['residenceChoisi'];
        $montant = $_GET['prix'];
        $compteAcheteur = ModelCompte::getById($_GET["compteChoisiAcheteur"])[0];
        $compteVendeur = ModelCompte::getById($_GET["compteChoisiVendeur"])[0];
        $vue = $root.'/app/view/client/viewResidenceAchete.php';
        if ($montant > $compteAcheteur->getMontant()){
            $vue = $root.'/app/view/site/viewAccueil.php';
        } else {
            $newMontantAcheteur = $compteAcheteur->getMontant() - $montant;
            $newMontantVendeur = $compteVendeur->getMontant() + $montant;
            
            ModelCompte::updateMontantCompte($newMontantAcheteur, $compteAcheteur->getId());
            ModelCompte::updateMontantCompte($newMontantVendeur, $compteVendeur->getId());
            ModelResidence::transfertResidence($compteAcheteur->getPersonneId(), $residenceChoisi);
            
            $compteAcheteur = ModelCompte::getById($_GET["compteChoisiAcheteur"])[0];
            $compteVendeur = ModelCompte::getById($_GET["compteChoisiVendeur"])[0];
        }
        require($vue);
    }
}
?>
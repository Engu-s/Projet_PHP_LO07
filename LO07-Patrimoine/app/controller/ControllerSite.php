<!-- ----- debut ControllerSite -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';
require_once '../service/Outils.php';

class ControllerSite
{
    // --- page d'accueil
    public static function accueil()
    {
        include 'config.php';
        $vue = $root . '/app/view/site/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerSite : accueil : vue = $vue");
        require($vue);
    }


    // Affiche un vin particulier (id)
    public static function login()
    {

        if (empty($_GET['login']) && empty($_GET['password'])) {

            $_GET['login'] = 'vide';
            $_GET['password'] = 'vide';
        }

        $results = ModelPersonne::getOne($_GET['login'], $_GET['password']);
        // ----- Construction chemin de la vue
        include 'config.php';
        if ($results) {
            $_SESSION['login'] = $_GET['login'];
            $_SESSION['id'] = $results[0]['id'];
            $job = ModelPersonne::getJob($_GET['login']);
            $_SESSION['statut'] = $job;
            $_SESSION['nomcomplet'] = $results[0]['nom'] . " " . $results[0]['prenom'];
            $vue = $root . '/app/view/site/viewAccueil.php';
            if (DEBUG)
                echo ("ControllerSite : accueil : vue = $vue");
        } else {
            $vue = $root . '/app/view/site/viewLogin.php';
            $_SESSION['statut'] = '/';
            $_SESSION['nomcomplet'] = 'non-connecté';
            if (DEBUG)
                echo ("ControllerSite : SiteLogin : vue = $vue");
        }
        require($vue);
    }

    // --- logout
    public static function logout()
    {
        $_SESSION['login'] = 'vide';
        $_SESSION['id'] = -1;
        $_SESSION['statut'] = '/';
        $_SESSION['nomcomplet'] = 'non-connecté';
        ControllerSite::accueil();
    }
    
    public static function amelioration(){
        Outils::redirect('/app/view/site/viewAmelioration.php');
    }
    
    public static function fonctionnalite(){
        include 'config.php';
        $client = NULL;
        $nomClient = "";
        if ($_SESSION['id'] != -1){
            $client = ModelPersonne::getOnebyId($_SESSION['id'])[0];
            $nomClient = "".$client->getNom()." ".$client->getPrenom()."";
        } else {
            $client = ModelPersonne::getOnebylogin('beatrice')[0];
            $nomClient = "PRIOR Beatrice";
        }
        
        $fullName = "".$client->getNom()." ".$client->getPrenom()."";
        $results_compte = ModelCompte::getByPersonne($client->getId());
        $total_comptes = array_reduce($results_compte, function($sum, $compte) {
            return $sum + $compte->getMontant();
        }, 0);

        $residences = ModelResidence::getAllUnderPriceExpectId($total_comptes, $client->getId());
        $vue = $root . '/app/view/site/viewFonctionnalite.php';
        require($vue);
    }
 
    public static function register() {
        Outils::redirect('/app/view/site/viewRegister.php');
    }

    public static function createaccount() {
        include 'config.php';
        ModelPersonne::createaccount($_GET['nom'], $_GET['prenom'], $_GET['login'], $_GET['password'], $_GET['statut']);
        $vue = $root . '/app/view/site/viewCreateAccount.php';
        require($vue);
    }
}
?>
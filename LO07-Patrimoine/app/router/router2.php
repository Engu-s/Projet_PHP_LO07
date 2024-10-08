<!-- ----- debut Router1 -->
<?php



require('../controller/ControllerSite.php');
require('../controller/ControllerAdministrateur.php');
require('../controller/ControllerClient.php');



session_start();

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

$action = $param['action'];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {

  case "adminReadAll":
  case "clientReadAll":
  case "compteReadAll":
  case "residenceReadAll":
  case "banqueCreate":
  case "banqueCreated":
  case "banqueSelect":
  case "banqueSelected":
  case "banqueReadAll":
    ControllerAdministrateur::$action();
    break;

  case "login":
  case "logout":
  case "amelioration":
  case "fonctionnalite":
  case "register":
  case "createaccount":
    ControllerSite::$action();
    break;
  case "compteCreate":
  case "compteCreated":
  case "transfertInterCompte":
  case "resultatTransfertInterCompte":
  case "compteReadById":
  case "residenceReadById":
  case "residenceSelect":
  case "residenceSelected":
  case "residenceAchete":
  case "patrimoineClient":
      ControllerClient::$action();
      break;
  default:
    $action = "accueil";
    ControllerSite::$action();
}
?>
<!-- ----- Fin Router1 -->
<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';

class Outils
{
    public static function redirect($path){
        include '../controller/config.php';
        $vue = $root . $path;
        if (DEBUG)
            echo ("vue = $vue");
        require($vue);

    }
    
}
?>
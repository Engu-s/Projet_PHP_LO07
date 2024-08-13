<!-- ----- début viewFonctionnalite -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    ?>
 <div class="mt-4 p-5 bg-warning text-white rounded">
     <h1>Nouvelle Fonctionnalité : Recommandations de résidences</h1><br>
     <p>Une utilisation originale des données serait d'inclure un système de recommandations d'achats. Son fonctionnement est le suivant :<br>A partir d'un compte client connecté, l'argent disponible sur ses comptes est estimé et, à l'aide du résultat de ce calcul, nous pourrons lui suggérer l'achat d'un ensemble de résidences pertinentes qui correspondent à son budget</p><br>
    </div>
     <br><h2>Exemple de mise en place</h2><br>
     <p>Pour montrer cette nouvelle fonctionnalité, nous utiliserons par défaut le cas de PRIOR BEATRICE. Cependant, si vous souhaitez vous connecter à un autre compte client, cette fenêtre s'adaptera et affichera le cas du client connecté.</p><br>
     <?php
        echo "<h4>Client actuel : ".$nomClient."</h4>";
        echo "<p>Actuellement le client dispose de ".$total_comptes." euros en cumulé sur ses comptes.</p><br>";
     ?>
     
     <!--
     <p>Avec cette somme, notre fonctionnalité permet de proposer au client les résidences suivantes :</p>
     <table class="table table-striped table-bordered">
      <thead>
        <tr class="bg-primary">
          <th scope="col">id</th>
          <th scope="col">label</th>
          <th scope="col">ville</th>
          <th scope="col">prix</th>
          <th scope="col">personne_id</th>
        </tr>
      </thead>
     -->
      <tbody>
        <?php
        /*
        if (is_array($residences)) {            
          foreach ($residences as $element) {
            echo "<tr class='bg-secondary'><td>" . $element->getId() . "</td><td>" . $element->getLabel() . "</td><td>" . $element->getVille() . "</td><td>" . $element->getPrix() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
          }
        } else {
          echo "Aucun élément à afficher.";
        }
        */
        if ($residences != null) {
          echo '<p>Avec cette somme, notre fonctionnalité permet de proposer à '.$nomClient.' les résidences suivantes :</p>';
          echo ' <table class="table table-striped table-bordered">
              <thead>
            <tr class="bg-primary">
              <th scope="col">id</th>
              <th scope="col">label</th>
              <th scope="col">ville</th>
              <th scope="col">prix</th>
              <th scope="col">personne_id</th>
            </tr>
          </thead>';
          foreach ($residences as $element) {
            echo "<tr class='bg-secondary'><td>" . $element->getId() . "</td><td>" . $element->getLabel() . "</td><td>" . $element->getVille() . "</td><td>" . $element->getPrix() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
          }
        } else {
          echo "<p>Avec cette somme, ".$nomClient." ne peut rien acheter... Dommage !";
        }
        ?>
     
      </tbody>
    </table>
    <br>

</div>
<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewFonctionnalite -->
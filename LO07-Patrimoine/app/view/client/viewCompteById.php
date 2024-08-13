<!-- ----- début viewSpeReadAll -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <h2>Liste des comptes du client connecté</h2>
    <!--
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">label</th>
          <th scope="col">montant</th>
          <th scope="col">banque_id</th>
          <th scope="col">personne_id</th>
          
        </tr>
      </thead>
    -->
      <tbody>
        <?php
        /*
        if (is_array($results)) {
          // La liste des producteurs est dans une variable $results             
          foreach ($results as $element) {
            echo "<tr><td>" . $element->getId() . "</td><td>" . $element->getlabel() . "</td><td>" . $element->getMontant() . "</td><td>" . $element->getBanqueId() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
          }
        } else {
          echo "Aucun élément à afficher.";
        }
        */
        if ($results != null) {
            echo '<table class="table table-striped table-bordered">
            <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">label</th>
              <th scope="col">montant</th>
              <th scope="col">banque_id</th>
              <th scope="col">personne_id</th>
            </tr>
            </thead>';
          // La liste des producteurs est dans une variable $results             
          foreach ($results as $element) {
            echo "<tr><td>" . $element->getId() . "</td><td>" . $element->getlabel() . "</td><td>" . $element->getMontant() . "</td><td>" . $element->getBanqueId() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
          }
        } else {
          echo "<p>Aucun élément à afficher : le client connecté ne possède pour l'instant aucun compte.<br>N'hésitez pas à en créer un ou deux pour observer cette fonctionnalité de notre projet !</p>";
        }
        ?>
          <br>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

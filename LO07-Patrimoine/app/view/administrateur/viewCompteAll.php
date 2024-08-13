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
     <h2>Liste des comptes</h2>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Titulaire</th>
          <th scope="col">Personne_id</th>
          <th scope="col">Banque</th>
          <th scope="col">Banque_id</th>
          <th scope="col">Label</th>
          <th scope="col">Montant</th> 
        </tr>
      </thead>
      <tbody>
        <?php
        if (is_array($results)) {
          for ($i = 0; $i < sizeof($results); $i++){
              echo "<tr>"
                    . "<td>" . $results[$i]->getId() . "</td>"
                    . "<td>" . $clientFullName[$i] . "</td>"
                    . "<td>" . $results[$i]->getPersonneId() . "</td>"
                    . "<td>" . $banqueLabels[$i] . "</td>"
                    . "<td>" . $results[$i]->getBanqueId() . "</td>"
                    . "<td>" . $results[$i]->getlabel() . "</td>"
                    . "<td>" . $results[$i]->getMontant() . "</td>"   
                . "</tr>";
          }
        } else {
          echo "Aucun élément à afficher.";
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewSpeReadAll -->
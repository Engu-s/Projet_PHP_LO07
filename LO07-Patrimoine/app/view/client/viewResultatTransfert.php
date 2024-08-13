<!-- ----- début viewResultatTransfert.php -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
      <h3>Nouvelles valeurs des comptes : </h3><br>
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
      <tbody>
        <?php
            echo "<tr><td>" . $compte1[0]->getId() . "</td><td>" . $compte1[0]->getlabel() . "</td><td>" . $compte1[0]->getMontant() . "</td><td>" . $compte1[0]->getBanqueId() . "</td><td>" . $compte1[0]->getPersonneId() . "</td></tr>";
        ?>
      </tbody>
    </table><br>
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
      <tbody>
        <?php        
            echo "<tr><td>" . $compte2[0]->getId() . "</td><td>" . $compte2[0]->getlabel() . "</td><td>" . $compte2[0]->getMontant() . "</td><td>" . $compte2[0]->getBanqueId() . "</td><td>" . $compte2[0]->getPersonneId() . "</td></tr>";
        ?>
      <br>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewResultatTransfert.php -->
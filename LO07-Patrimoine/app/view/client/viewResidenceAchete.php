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
            echo "<tr><td>" . $compteAcheteur->getId() . "</td><td>" . $compteAcheteur->getlabel() . "</td><td>" . $compteAcheteur->getMontant() . "</td><td>" . $compteAcheteur->getBanqueId() . "</td><td>" . $compteAcheteur->getPersonneId() . "</td></tr>";
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
            echo "<tr><td>" . $compteVendeur->getId() . "</td><td>" . $compteVendeur->getlabel() . "</td><td>" . $compteVendeur->getMontant() . "</td><td>" . $compteVendeur->getBanqueId() . "</td><td>" . $compteVendeur->getPersonneId() . "</td></tr>";
        ?>
      </tbody>
    </table>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewSpeReadAll -->
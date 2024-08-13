<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    echo "<h2>Patrimoine de ".$fullName."</h2>";
    ?>
    <!--  
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">type</th>
          <th scope="col">label</th>
          <th scope="col">valeur</th>
        </tr>
      </thead>
    -->
      <tbody>
        <?php
        /*
        if (is_array($results_residence) || is_array($results_compte)) {
          // La liste des producteurs est dans une variable $results
            if (is_array($results_compte)){
                foreach ($results_compte as $element) {
                    echo "<tr class='table-primary'><td>compte</td><td>" . $element->getlabel() . "</td><td>" . $element->getMontant() . "</td></tr>";
                }
            }
            if (is_array($results_residence)){
                foreach ($results_residence as $element) {
                    echo "<tr class='table-secondary'><td>résidence</td><td>" . $element->getlabel() . "</td><td>" . $element->getPrix() . "</td></tr>";
                  }
            }
          
          
        } else {
          echo "Aucun élément à afficher.";
        }
         */
        if ($results_residence != null || $results_compte != null) {
            echo '<table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th scope="col">type</th>
                <th scope="col">label</th>
                <th scope="col">valeur</th>
              </tr>
            </thead>';
          // La liste des producteurs est dans une variable $results
            if ($results_compte != null){
                foreach ($results_compte as $element) {
                    echo "<tr class='table-primary'><td>compte</td><td>" . $element->getlabel() . "</td><td>" . $element->getMontant() . "</td></tr>";
                }
            }
            if ($results_residence != null){
                foreach ($results_residence as $element) {
                    echo "<tr class='table-secondary'><td>résidence</td><td>" . $element->getlabel() . "</td><td>" . $element->getPrix() . "</td></tr>";
                  }
            }
                    
        } else {
          echo "<p>Aucun élément à afficher : " . $fullName . " ne possède pour l'instant aucun patrimoine.<br>N'hésitez pas à créer des comptes ou acheter des résidences pour observer cette fonctionnalité de notre projet !</p>";
        }
        ?>
      </tbody>
    </table>
      <br>
      <?php
        echo '<h2>Somme totale du patrimoine : '.$total_patrimoine .' $</h2>';
      ?>
      <br>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewSpeReadAll -->
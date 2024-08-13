<!-- ----- début viewSpeReadAll -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    echo "<h2>Liste des résidences de : ".$fullName."</h2>"
    ?>
    <!-- 
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
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
        if (is_array($results)) {    
          foreach ($results as $element) {
            echo "<tr><td>" . $element->getId() . "</td><td>" . $element->getlabel() . "</td><td>" . $element->getVille() . "</td><td>" . $element->getPrix() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
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
            <th scope="col">ville</th>
            <th scope="col">prix</th>
            <th scope="col">personne_id</th>
            </tr>
            </thead>
            <tbody>';
    
            foreach ($results as $element) {
                echo "<tr><td>" . $element->getId() . "</td><td>" . $element->getLabel() . "</td><td>" . $element->getVille() . "</td><td>" . $element->getPrix() . "</td><td>" . $element->getPersonneId() . "</td></tr>";
            }
            echo '</tbody></table>';
            } else {
                echo "<p>Aucun élément à afficher : " . $fullName . " ne possède pour l'instant aucune résidence.<br>N'hésitez pas à en acheter une ou deux pour observer cette fonctionnalité de notre projet !</p>";
        }
        ?>
          <br>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewSpeReadAll -->
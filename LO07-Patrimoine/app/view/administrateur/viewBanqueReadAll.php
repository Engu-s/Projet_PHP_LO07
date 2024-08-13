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
      <h2>Liste des banques vue par l'administrateur</h2>  
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">label</th>
          <th scope="col">pays</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (is_array($results)) {
          // La liste des producteurs est dans une variable $results             
          foreach ($results as $element) {
            echo "<tr><td>" . $element->getId() . "</td><td>" . $element->getlabel() . "</td><td>" . $element->getPays() . "</td></tr>";
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
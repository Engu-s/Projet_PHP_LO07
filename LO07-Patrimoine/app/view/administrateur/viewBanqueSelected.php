
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';

    ?>
    <!-- ===================================================== -->
    <div class="mt-4 p-5 bg-warning text-white rounded">
      <h1>Liste des comptes</h1>
     
    </div>
    <?php
    if ($results) {
        echo "<h2>Liste des comptes de cette banque : ".$banque_nom."</h2>"
      ?>
    
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
        if (is_array($results)) {
          // La liste des producteurs est dans une variable $results             
          foreach ($results as $element) {
            echo "<tr>"
            . "<td>" . $element->getId() . "</td>"
            . "<td>" . $element->getlabel() . "</td>"
            . "<td>" . $element->getMontant() . "</td>"
            . "<td>" . $element->getBanqueId() . "</td>"
            . "<td>" . $element->getPersonneId() . "</td></tr>"
            ;
          }
        } else {
          echo "Aucun élément à afficher.";
        }
        ?>
      </tbody>
    </table>
    
    <?php
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    } else {
        echo "Aucun élément à afficher.";
    }
    ?>

    
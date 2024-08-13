
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
    <?php
    if ($results) {
      ?>
    <div class="mt-4 p-5 bg-warning text-white rounded">
      <h1>Insertion réussie !</h1>
     
    </div>
    <?php
      echo ("<li>id = " . $results . "</li>");
      echo ("<li>label = " . $_GET['label'] . "</li>");
      echo ("<li>montant = " . $_GET['montant'] . "</li>");
      echo ("<li>banque_id = " . $_GET['banque_id'] . "</li>");
      echo ("<li>personne_id = " . $_SESSION['id'] . "</li>");
     echo("</ul>");
    } else {
      echo ("<h3>Problème d'insertion du Producteur</h3>");
      echo ("id = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
<!-- ----- début viewAccueil -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
   
    ?>
   <div class="mt-4 p-5 bg-warning text-white rounded">
  <h1>Accueil</h1>
  <p>Bienvenue dans notre projet de LO07 intitulé "Patrimoine" ! Il a été réalisé durant le semestre P24.</p>
  
</div>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAccueil -->
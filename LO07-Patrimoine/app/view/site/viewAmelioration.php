<!-- ----- début viewAmelioration -->
<?php

require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';

    ?>
 <div class="mt-4 p-5 bg-warning text-white rounded">
     <h1>Amélioration du MVC</h1><br>
  <p>Durant le développement de ce projet, nous avons utilisé le MVC. Bien que ce soit très utile, des améliorations peuvent lui être ajouté.</p><br>
  <p>En effet, nous avons remarqué qu'une partie conséquente de la logique dans le code se répète d'un controller à l'autre. De ce fait, nous pensons que ces logiques de code peuvent être extraites et mises sous la forme de fonctions utilisées dans toutes les parties du code qui en ont besoin.<p><br>
  <p>Ces nouvelles fonctions seraient mises dans un document mis à part et auquel tous les autres fichiers auraient accès. En structurant ainsi notre code, toutes les logiques récurrentes sont rassemblées et peuvent être réutilisées sur les différents fichiers du projet.</p><br>
  <p>Nous avons également remarqué que la gestion des erreurs se répète souvent dans le code. Nous pourrions aussi essayer de centraliser cette gestion des erreurs et des exceptions afin d'améliorer la robustesse de l'application.</p>
</div>

  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAmelioration -->
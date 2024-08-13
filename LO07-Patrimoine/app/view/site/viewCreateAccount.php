<!-- ----- début viewCreateAccount -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
   
    ?>
        <div class="mt-4 p-5 bg-warning text-white rounded">
            <h1>Inscription réussite !</h1>
            <h3>Vous pouvez maintenant vous connecter au site.</h3>
        </div>


    </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewCreateAccount -->
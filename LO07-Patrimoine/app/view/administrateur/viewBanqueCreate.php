
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 
      <h2>Formulaire pour l'ajout d'une banque par l'administrateur</h2><br>
      
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCreated'>        
        <p>label :</p> 
        <input type='text' class="form-control" required name='label' placeholder="Label"><br>
        <p>pays :</p>
        <input type='text' class="form-control" required name='pays' placeholder="Pays"><br>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Insérer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->




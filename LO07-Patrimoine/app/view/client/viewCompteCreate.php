
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      echo "<h2>Formulaire pour l'ajout d'un compte pour : ".$fullName." </h2>"
    ?> 
      
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" id='1' name='action' value='compteCreated'>        
        <input type='text' class="form-control" required name='label' placeholder="Label"><br>
        <input type='text' class="form-control" required name='montant' placeholder="0"><br>
        <select class="form-select" name="banque_id" required id="banque_id">
            <?php
                foreach ($results as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ."</option> ";
                }
            ?>
          </select>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Insérer</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->




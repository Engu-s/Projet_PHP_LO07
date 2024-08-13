
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      if(sizeof($results) > 1){
    ?> 
      <h2>Transfert Inter-Compte</h2>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='resultatTransfertInterCompte'>  
        <p>Compte émetteur : </p>
        <select class="form-select" name="compte1" required id="compte1">
            <?php
                foreach ($results as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ." ". $element->getId()."</option> ";
                }
            ?>
          </select>
        <p>Montant : </p>
        <input type='number' class="form-control" required name='montant1' placeholder="0"><br>
        <br><p>Compte receveur :</p>
        <select class="form-select" name="compte2" required id="compte2">
            <?php
                foreach ($results as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ." ". $element->getId()."</option> ";
                }
            ?>
          </select>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Insérer</button>
      <br>
    </form>
    <p/>
  </div>
      <?php } else {
          echo "<p>Vous n'avez pas assez de compte pour faire un transfert.<br>Etes-vous sûr de posséder au minimum 2 comptes bancaires valides ?</p>";
      }
      
      include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->




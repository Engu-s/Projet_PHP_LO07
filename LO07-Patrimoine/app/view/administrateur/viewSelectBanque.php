
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
      <h2>Sélectionnez une banque dans cette liste</h2>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueSelected'>              
        <select class="form-select" name="banque" required id="banque">
            <?php
                foreach ($results as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ."</option> ";
                }
            ?>
          </select>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Choisir</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->




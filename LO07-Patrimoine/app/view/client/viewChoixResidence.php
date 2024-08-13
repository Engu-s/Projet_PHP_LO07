<!-- ----- début viewChoixResidence -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      
    ?> 
      <h2>Sélection d'une résidence pour un achat</h2>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='residenceSelected'>              
        <select class="form-select" name="residenceChoisi" required id="residenceChoisi">
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

<!-- ----- fin viewChoixResidence -->




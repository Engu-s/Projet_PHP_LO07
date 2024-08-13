<!-- ----- début viewAchatResidence -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      if (sizeof($comptesAcheteur) >= 1 && sizeof($comptesVendeur) >= 1){
      echo "<h2>Achat de : ".$residenceChoisi->getLabel()."</h2>"
    ?> 
      
      
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
          <?php
            echo "<input type='hidden' name='residenceChoisi' value=".$residenceChoisi->getId()."> ";
          ?>
          
        <input type="hidden" name='action' value='residenceAchete'>              
        <select class="form-select" name="compteChoisiAcheteur" required id="compteChoisiAcheteur">
            <?php
                foreach ($comptesAcheteur as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ."</option> ";
                }
            ?>
        </select><br>
        <select class="form-select" name="compteChoisiVendeur" required id="compteChoisiVendeur">
            <?php
                foreach ($comptesVendeur as $element){
                    echo "<option value=" . $element->getId() ."> ". $element->getLabel() ."</option> ";
                }
            ?>
        </select><br>
        <?php
            echo "<h4>Prix de la résidence : ".$prix."</h4>";
            echo "<input type='hidden' name='prix' value=".$prix."> ";
        ?>
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Choisir</button>
    </form>
    <p/>
  </div>
      <?php } else {
          echo "<p>L'un des deux participants n'a pas de compte bancaire. Veuillez réessayer lorsque tous les membres en auront un.</p>";
      }
  
  include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewAchatResidence -->




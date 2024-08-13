<!-- ----- début fragmentCaveMenu -->


<nav class="navbar navbar-expand-lg bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=null">MIKOU - LUCAT |
      <?php
      if (isset($_SESSION['statut'])) {
        echo ($_SESSION['statut']);
      } else {
        echo ('/');
      }
      ?> |
      <?php
      if (isset($_SESSION['nomcomplet'])) {
        echo ($_SESSION['nomcomplet']);
      } else {
        echo ('non-connecté');
      }
      ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php
        $client = "<li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mes comptes bancaires</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=compteReadById'>Liste de mes comptes</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=compteCreate'>Ajouter un nouveau compte</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=transfertInterCompte'>Transfert inter-comptes</a></li>
                    
                  </ul>
                </li>
                <li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mes résidences</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=residenceReadById'>Liste de mes résidences</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=residenceSelect'>Achat d'une nouvelle résidence</a></li>
                    
                  </ul>
                </li>
                <li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Mon patrimoine</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=patrimoineClient'>Bilan de mon patrimoine</a></li>
                    
                  </ul>
                </li>";
        if ($_SESSION['login'] != 'vide' && $_SESSION['statut'] == 'client') {
          echo $client;
        }


        ?>

        <?php
        $admin = "<li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Banques</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=banqueReadAll'>Liste des banques</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=banqueCreate'>Ajout d'une banque</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=banqueSelect'>Liste des comptes d'une banque</a></li>
                  </ul>
                  
                </li>
                <li class='nav-item dropdown'>
                  <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Clients</a>
                  <ul class='dropdown-menu'>
                    <li><a class='dropdown-item' href='router2.php?action=clientReadAll'>Liste des clients</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=adminReadAll'>Liste des administrateurs</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=compteReadAll'>Liste des comptes</a></li>
                    <li><a class='dropdown-item' href='router2.php?action=residenceReadAll'>Liste des résidences</a></li>
                  </ul>
                </li>";
                
        if ($_SESSION['login'] != 'vide' && $_SESSION['statut'] == 'administrateur') {
          echo $admin;
        }
        ?>
          
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Innovations</a>
          <ul class='dropdown-menu'>
            <li><a class='dropdown-item' href='router2.php?action=fonctionnalite'>Fonctionnalité originale</a></li>
            <li><a class='dropdown-item' href='router2.php?action=amelioration'>Proposition d'amélioration du code MVC</a></li>

          </ul>
        </li>

        <?php
        $connecter = "<li class='nav-item'><a class='nav-link' href='router2.php?action=logout'>Déconnexion</a></li>";
        $deconnecter = "<li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Connexion</a>
        <ul class='dropdown-menu'>
          <li><a class='dropdown-item' href='router2.php?action=login'>Se connecter</a></li>
          <li><a class='dropdown-item' href='router2.php?action=register'>S'inscrire</a></li>
        </ul>
      </li>";
        if ($_SESSION['login'] != 'vide') {
          echo $connecter;
        } else {
          echo $deconnecter;
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<!-- ----- fin fragmentCaveMenu -->
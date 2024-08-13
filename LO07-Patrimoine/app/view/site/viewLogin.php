<!-- ----- début viewLogin -->
<?php
require($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php include $root . '/app/view/fragment/fragmentCaveMenu.php'; ?>
    <div class="mt-4 mb-4 p-5 bg-warning text-white rounded">
        <h1>Se connecter</h1>
        <p>Connectez-vous à votre compte ci-dessous :</p>
    </div>
    <form action='router2.php' method='get'>
            <input type="hidden" name='action' value="login">
            <input type='text' class="form-control" name='login' placeholder="Login"><br>
            <input type='password' class="form-control" name='password' placeholder="Password"><br><br>
            <input type='submit' class="btn btn-success" value='Connexion'>
            <input type='reset' class="btn btn-danger" value='Effacer'>
    </form>
    <br>
</div>
    
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

    <!-- ----- fin viewLogin -->
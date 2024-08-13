<?php
session_start();
$_SESSION['id'] = -1;
$_SESSION['statut'] = '/';
$_SESSION['nomcomplet'] = 'non-connecté';
$_SESSION['login'] = 'vide';
header('Location: app/router/router2.php?action=null');
?>


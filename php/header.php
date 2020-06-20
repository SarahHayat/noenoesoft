<?php
require ("../controllers/dataBase.php");
$sql = new dataBase();
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>NoéSoft</title>
    <link rel="stylesheet" href="../assets/css/style.css"/>
</head>
<header>
    <div class="logo">
        <img src="../assets/images/logo.png" alt="logo">
    </div>
    <nav>
        <a href="addPoste.php">Ajouter une annonce</a>
        <a href="postuler.php">Postuler</a>
    </nav>
</header>
</html>
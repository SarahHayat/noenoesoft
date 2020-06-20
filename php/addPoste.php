<?php
include ("header.php");
?>

<section class="addPoste">
    <form action="../controllers/addPoste.php" method="post" class="form">
        <label>Intitulé du poste :</label>
        <input type="text" name="titre" id="titre" placeholder="(ex : Développeur full-stack)" required>

        <label>Lieu :</label>
        <input type="text" name="lieu" id="lieu" placeholder="(ex : Paris)" required>

        <label>Description :</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" value="ENREGISTRER">
    </form>
</section>


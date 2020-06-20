<?php
require ("dataBase.php");
$sql = new dataBase();

$titre = $_POST['titre'];
$lieu = $_POST['lieu'];
$description = $_POST['description'];

if(isset($titre, $lieu, $description)){
    $req = $sql->addPoste($titre, $lieu, $description);
    header('Location: ../php/postuler.php');
}
?>
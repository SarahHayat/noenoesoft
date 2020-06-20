<?php
session_start();
include("header.php");

$req = $sql->getPosteById($_SESSION['id_poste']);
while ($donnees = $req->fetch()) {
    ?>
    <body>
    <div id="candidater">
        <section id="poste">
            <div>
                <h1> <?php echo $donnees['nom_poste'] ?></h1>
            </div>
            <div>
                <p><?php echo $donnees['lieu_poste'] ?></p>
                <p><?php echo $donnees['descriptif_poste'] ?></p>
            </div>
        </section>
        <section id="candidat">
            <div id="form_candidat">
                <h2>CANDIDATURE TRANSMISE</h2>
                <div class="validate">
                    <?php
                    $req = $sql->getLastCandidat();
                    $donnees = $req->fetch();
                    ?>
                    <div><b>Merci <?php  echo $donnees['prenom']?> !</b></div>
                    <div>Nous reviendrons vers vous prochainement.</div>
                </div>
        </section>
    </div>
    </body>
    <?php
}
?>
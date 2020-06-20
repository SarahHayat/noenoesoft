<?php
session_start();
include("header.php");

$req = $sql->getPoste();
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
            <form method="post" action="../controllers/postuler.php" id="form_postuler" enctype="multipart/form-data">
                <div id="form_candidat">
                    <h2>TA CANDIDATURE</h2>
                    <div>
                        <div class="label">
                            <label>Prénom</label>
                        </div>
                        <input type="text" name="prenom" id="prenom" required>
                    </div>

                    <div>
                    <div class="label"><label>Nom</label></div>
                    <input type="text" name="nom" id="nom" required>
                    </div>

                    <div>
                    <div class="label"><label>Email</label></div>
                    <input type="email" name="email" id="email" required>
                    </div>

                    <div>
                    <div class="label"><label>Téléphone</label></div>
                    <input type="text" name="tel" id="tel" maxlength="10" required>
                    </div>

                    <div>
                    <div class="label"><label>CV</label></div>
                    <input type="file" name="cv" id="cv" title=".pdf, .png, .jpg" required>
                    </div>

                    <div class="message">
                    <div class="label"><label>Message</label></div>
                    <textarea name="message" id="message"></textarea>
                    </div>


                    <input type="hidden" name="id" id="id" value="<?php echo $donnees['id_poste']; ?>">

                    <input type='submit' id="btn_envoyer" value='Envoyer'/>
                </div>

            </form>
        </section>
    </div>
    </body>
    <?php
}
?>
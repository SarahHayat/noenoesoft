<?php
session_start();
require("dataBase.php");
$sql = new dataBase();

echo "id poste : " . $_POST['id'];

if (isset($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['tel'], $_FILES['cv'], $_POST['message'], $_POST['id']) && $_FILES['cv']['error'] == 0) {
    echo ("isset passé");
    if ($_FILES['cv']['size'] <= 8000000) {
        echo "taille passé";
        $infosfichier = pathinfo($_FILES['cv']['name']);
        $extension_upload = $infosfichier['extension'];
        $extensions_autorisees = array('pdf', 'png', 'jpg');
        if (in_array($extension_upload, $extensions_autorisees)) {
            echo "extension passé";
            move_uploaded_file($_FILES['cv']['tmp_name'], '../assets/uploads/' . basename($_FILES['cv']['name']));
            echo "L'envoi a bien été effectué !";
            $cv = '../assets/uploads/' . basename($_FILES['cv']['name']);

            echo 'cv : '. $cv;

            $_SESSION['id_poste']=$_POST['id'];
            $_SESSION['id_candidat']=$_POST['id_candidat'];
            $req = $sql->addCandidature($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['tel'], $cv, $_POST['message']);
            $requete = $sql->getLastCandidat();
            $donnee = $requete->fetch();
            $reponse = $sql->postuler( $_POST['id'],$donnee['id_candidat']);
        }

        $req = $sql->getPosteById($_SESSION['id_poste']);

        $donnee = $req->fetch();
        $object = 'Votre candidature au poste de "'.$donnee['nom_poste'].'"';
        $corps = 'Bonjour '.$_POST['prenom'].', Merci pour votre candidature au poste de '.$donnee['nom_poste'].' ! 
        Nous reviendrons vers vous prochainement.
        Cordialement,
        L’équipe NOÉSOFT';
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $from = $_POST['email'];
                $to = "shareeventtogether@gmail.com";
                $subject = $object;
                $message = $corps;
                $headers = "From: " . $from;
                mail($to, $subject, $message, $headers);
        ?>

            <?php
    }
    header('Location: ../php/validate.php');
}

?>
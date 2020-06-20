<?php


class dataBase
{

    public $bdd = null;


    public function __construct()
    {
        try {
            $this->bdd = new PDO('mysql:host=localhost;dbname=noesoft', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            // echo "connexion réussi <br/> ";
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getPoste()
    {
        $sql = $this->bdd->query("SELECT * from poste");
        return $sql;
    }

    public function getPosteById($id_poste)
    {
        $sql = $this->bdd->query('SELECT * from poste where id_poste = "' . $id_poste . '"');
        return $sql;
    }

    public function addPoste($titre, $lieu, $description)
    {
        $sql = $this->bdd->query('INSERT INTO poste(nom_poste, lieu_poste, descriptif_poste) values("' . $titre . '", "' . $lieu . '", "' . $description . '")');
        return $sql;
    }

    public function postuler($id_poste, $id_candidat)
    {
        $sql = $this->bdd->query('INSERT INTO poste_candidat(id_poste, id_candidat) values("' . $id_poste . '","' . $id_candidat . '")');
        return $sql;
    }

    public function addCandidature($prenom, $nom, $email, $telephone, $cv, $message)
    {
        $sql = $this->bdd->prepare('INSERT INTO candidat(prenom, nom, email, telephone, cv, message) values(:prenom, :nom, :email, :telephone, :cv, :message)');
        $sql->execute(array(
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'telephone' => $telephone,
            'cv' => $cv,
            'message' => $message,

        ));
        return $sql;
    }

    public function getLastCandidat()
    {
        $sql = $this->bdd->query('SELECT * from candidat order by id_candidat DESC LIMIT 1');
        return $sql;
    }


}
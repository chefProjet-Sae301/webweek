<?php 
namespace Models;
class Jeu {
    public $jeuId = 0;
    public $nom = "";
    public $description = "";
    public $likeJeu = 0;
    public $dislikeJeu = 0;
    public $lien_image = "";

    public function __construct($jeuId, $nom, $description, $likeJeu, $dislikeJeu, $lien_image) {
        $this->jeuId = $jeuId;
        $this->nom = $nom;
        $this->description = $description;
        $this->likeJeu = $likeJeu;
        $this->dislikeJeu = $dislikeJeu;
        $this->lien_image = $lien_image;
    }
}

?>
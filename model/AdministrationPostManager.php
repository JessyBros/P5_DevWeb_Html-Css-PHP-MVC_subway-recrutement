<?php
namespace Subway\ProjetOC;

class AdministrationPostManager extends Manager{

    
   
    // page (Lites/modifier/supprimer)
    public function listeRestaurant() 
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT id, ville, adresse, url FROM restaurant ORDER BY id ASC ');
        return $req;
        
        
    }
    
    
      public function ajoutRestaurant($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille) 
    {   
        $connexion = $this-> connexion($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille);
        $req = $connexion->prepare('INSERT INTO restaurant(ville, adresse, telephone, horaires, image, lat, lng, url) VALUES(?,?,?,?,?,?,?,?)');
        $req->execute(array(
            $ville,
            $adresse,
            $telephone,
            $horaires,
            $urlImage,
            $lat,
            $lng,
            $urlVille
        ));
        return $req;
    }
    
    public function modifRestaurant($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille,$recuperationRestaurant)
    {   
        $connexion = $this-> connexion($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille,$recuperationRestaurant);
        $req = $connexion->prepare('UPDATE restaurant SET ville = ? ,adresse = ? ,telephone = ?, horaires = ?, image = ?, lat = ?,lng = ?, url = ? WHERE id =  ?');
        $req->execute(array(
            $ville,
            $adresse,
            $telephone,
            $horaires,
            $urlImage,
            $lat,
            $lng,
            $urlVille,
            $recuperationRestaurant
        ));
        return $req;
    }
    
    public function choixRestaurant($restaurantSelectionner) // renvoie le restaurant selon le choix de l'administrateur -> GET'
    {   
        $connexion = $this-> connexion($restaurantSelectionner);
        $req = $connexion->prepare('SELECT * FROM restaurant WHERE id = ?');
        $req->execute(array($restaurantSelectionner));
        $post = $req->fetch();
        return $post;
    }
    
     public function supRestaurant($supprimerLeRestaurant) 
    {
        $connexion = $this-> connexion($supprimerLeRestaurant);
        $req= $connexion->prepare('DELETE FROM restaurant WHERE id = ?');
        $req->execute(array($supprimerLeRestaurant));
        return $req; 
    }
    
    
       public function verificationPseudoMdp()
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT pseudo, motDePasse FROM administrateur');
        $req->execute(array());
        $retour = $req->fetch();
        return $retour;
    }
    
    
       public function modificationPseudoMdp($pseudo,$nouveauMotDePasse)
    {   
        $connexion = $this-> connexion($pseudo,$nouveauMotDePasse);
        $nouveauMotDePasse = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);
        $req = $connexion->prepare('UPDATE administrateur SET pseudo = ?, motDePasse = ?');
        $req->execute(array(
            $pseudo,
            $nouveauMotDePasse
        ));
        return $req;
    }
    
       public function recuperationEmail()
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT email FROM email');
        $req->execute(array());
        $retour = $req->fetch();
        return $retour;
    }
    
    
       public function modificationEmail($email)
    {   
        $connexion = $this-> connexion($email);
        $req = $connexion->prepare('UPDATE email SET email = ?');
        $req->execute(array(
            $email
        ));
        return $req;
    }
    
}
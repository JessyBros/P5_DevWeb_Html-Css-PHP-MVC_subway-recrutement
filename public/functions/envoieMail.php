<?php
if(isset($_POST['postuler'])){
error_reporting(E_ALL); ini_set("display_errors", 1); //Display errors
    if (get_magic_quotes_gpc()){  
        $message = stripslashes(htmlspecialchars($_POST['message']));
    }else{  
        $message = "Disponibilité : " . htmlspecialchars($_POST['message']);
    }
	//vérifie si l'hote autorise les \r
    if(preg_match("#@(hotmail|live|msn).[a-z]{2,4}$#", htmlspecialchars($recuperationEmail['email'])))
    {
        $passage_ligne = "\n";
    }
    else
    {
        $passage_ligne = "\r\n";
    }
    
    // récupère la ville sélectionner par l'utisateur pour le préçiser sur le mail
    $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
    $urlVille = isset($_POST['urlVille']) ? $_POST['urlVille'] : NULL;
 
    $email_to = htmlspecialchars($recuperationEmail['email']); // Reçois
    $email_subject = $ville . " : CV & LM"; // Sujet
    $boundary = md5(rand()); // Clé boundary aléatoire
    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    } 
     
    
    $headers = "From: SubwayRecrutement<'us-imm-node2a.000webhost.io'>" . $passage_ligne; //Celui qui envoi
    $headers.= "Reply-to: SubwayRecrutement <'us-imm-node2a.000webhost.io'>" . $passage_ligne; //Celui qui envoi
    $headers.= "MIME-Version: 1.0" . $passage_ligne; //MIME Version
    $headers.= "X-Priority: 3".$passage_ligne;
    $headers.= 'Content-Type: multipart/mixed; boundary='.$boundary .' '. $passage_ligne; //Content (2 versions ex:text/plain et text/html)
    $email_message = '--' . $boundary . $passage_ligne; //Ouverture boundary
    $email_message .= "Content-Type: text/plain; charset=\"utf-8\"" . $passage_ligne; //Content type
    $email_message .= "Content-Transfer-Encoding: 8bit" . $passage_ligne; //Encoding
    $email_message .= $passage_ligne .clean_string($message). $passage_ligne; //Content
    
    
    
	// Jointure du CV
    if(isset($_FILES["cv"]) &&  $_FILES['cv']['name'] != ""){ //vérifie si le CV exist
    
        $move = "/../../uploads/";
        $nom_fichier = $_FILES['cv']['name'];
        $source = $_FILES['cv']['tmp_name'];
        $type_fichier = $_FILES['cv']['type'];
        $taille_fichier = $_FILES['cv']['size'];
       move_uploaded_file($_FILES['cv']['tmp_name'], __DIR__.$move . $_FILES["cv"]['name']);
                    
        if($nom_fichier != ".htaccess"){ //Vérifie si ce n'est pas un .htaccess 
			 if($type_fichier == "image/jpeg" 
                || $type_fichier == "image/pjpeg" 
                || $type_fichier == "image/png"
                || $type_fichier == "application/pdf"
                || $type_fichier == "application/msword"
                || $type_fichier == "image/vnd.adobe.photoshopf"
                || $type_fichier == "application/msword"
                || $type_fichier == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){ 
                 
                if ($taille_fichier <= 2097152) { //Size above 2MB
                    $tabRemplacement = array("é"=>"e", "è"=>"e", "à"=>"a"); //Changing special characters
                    
                    $handle = fopen("uploads/".$nom_fichier, 'r'); //ouverture du fichier
                    $content = fread($handle, $taille_fichier); //lecture du fichier
                    $encoded_content = chunk_split(base64_encode($content)); //Encoding
                    $f = fclose($handle); //File closing
                                
                    $email_message .= $passage_ligne . "--" . $boundary . $passage_ligne; //ouverture du deuxieme boundary
                    $email_message .= 'Content-type:'.$type_fichier.';name="'.$nom_fichier.'"'."\n"; //Content type (selon le $type_fichier)
                    $email_message .='Content-Disposition: attachment; filename="'.$nom_fichier.'"'."\n"; //Inform there is an attachment
                    $email_message .= 'Content-transfer-encoding:base64'."\n"; //Encoding
                    $email_message .= "\n"; //Blank line. IMPORTANT !
                    $email_message .= $encoded_content."\n"; //Attachment
                }else{
					//Error Message pour la taille du fichier 2MB
                    $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était superieure à 2Mo.". $passage_ligne;
                    $resultatEnvoieMail = "Erreur : votre curriculum vitæ est supérieur à  2Mo.<br/>";
                }
            }else{
				//Error Message for wrong content type for attachment
                $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais elle n'était pas au bon format.". $passage_ligne;
                $resultatEnvoieMail = "Erreur : votre curriculum vitæ n'est pas au bon format.<br/>";
            }
        }else{
			//Error Message for sending a .htaccess file
            $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe .htaccess.". $passage_ligne;
            $resultatEnvoieMail = "Erreur : votre curriculum vitæ n'est pas au bon format.<br/>";
        }
    }

// Jointure de la Lettre de Motivation
    if(isset($_FILES["lm"]) &&  $_FILES['lm']['name'] != ""){ // vérifie si la LM existe
    
        $move = "/../../uploads/";
        $nom_fichier = $_FILES['lm']['name'];
        $source = $_FILES['lm']['tmp_name'];
        $type_fichier = $_FILES['lm']['type'];
        $taille_fichier = $_FILES['lm']['size'];
       move_uploaded_file($_FILES['lm']['tmp_name'], __DIR__.$move. $_FILES["lm"]['name']);
                    
        if($nom_fichier != ".htaccess"){ //vérifie si ce n'est pas un fichier.htaccess 
			 if($type_fichier == "image/jpeg" 
                || $type_fichier == "image/pjpeg" 
                || $type_fichier == "image/png"
                || $type_fichier == "application/pdf"
                || $type_fichier == "application/msword"
                || $type_fichier == "image/vnd.adobe.photoshopf"
                || $type_fichier == "application/msword"
                || $type_fichier == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){ 
                 
                if ($taille_fichier <= 2097152) { //Size above 2MB
                    $tabRemplacement = array("é"=>"e", "è"=>"e", "à"=>"a"); //Changing special characters
                    
                    $handle = fopen("uploads/".$nom_fichier, 'r'); //ouverture du fichier
                    $content = fread($handle, $taille_fichier); //lecture du fichier
                    $encoded_content = chunk_split(base64_encode($content)); //Encoding
                    $f = fclose($handle); //File closing
                                
                    $email_message .= $passage_ligne . "--" . $boundary . $passage_ligne; //ouverture du troisieme boudary
                    $email_message .= 'Content-type:'.$type_fichier.';name="'.$nom_fichier.'"'."\n"; //Content type ($type_fichier)
                    $email_message .='Content-Disposition: attachment; filename="'.$nom_fichier.'"'."\n"; //Inform there is an attachment
                    $email_message .= 'Content-transfer-encoding:base64'."\n"; //Encoding
                    $email_message .= "\n"; //Blank line. IMPORTANT !
                    $email_message .= $encoded_content."\n"; //Attachment
                }else{
					//Error Message for attachment above 2MB
                    $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais celle ci était superieure à 2Mo.". $passage_ligne;
                    $resultatEnvoieMail .=  "Erreur : votre lettre de motivation est supérieur à  2Mo.";
                }
            }else{
				//Error Message for wrong content type for attachment
                $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe mais elle n'était pas au bon format.". $passage_ligne;
                $resultatEnvoieMail .=  "Erreur : votre lettre de motivation n'est pas au bon format.";
            }
        }else{
			//Error Message for sending a .htaccess file
            $email_message .= $passage_ligne ."L'utilisateur a tenté de vous envoyer une pièce jointe .htaccess.". $passage_ligne;
            $resultatEnvoieMail .=   "Erreur : votre lettre de motivation n'est pas au bon format.";
        }
    }
                
    $email_message .= $passage_ligne . "--" . $boundary . "--" . $passage_ligne; //Closing boundary
  
if ($resultatEnvoieMail == ""){
if(mail($email_to,$email_subject, $email_message, $headers)){
   
    $resultatEnvoieMail = "Votre curriculum vitæ et lettre de motivation ont bien été envoyés :D";
   ?>
    <style>
        .resultatEnvoieMail {
            color: green;
        }

    </style>
    <?php
}
else{
    
    $resultatEnvoieMail = "Erreur : les fichiers n\'ont pas été envoyés :(";
}
}
}
else
{
    $resultatEnvoieMail = "";
}
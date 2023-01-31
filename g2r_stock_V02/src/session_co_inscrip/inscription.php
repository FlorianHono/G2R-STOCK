<?php 
    // On inclu la connexion à la bdd
    require_once '../../config/config.php'; 

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['nom']) && !empty($_POST['Prenom']) && !empty($_POST['Pseudo']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['centre_G2R']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2'] ))
    {
        // Patch XSS
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['Prenom']);
        $pseudo = htmlspecialchars($_POST['Pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $centre_G2R = htmlspecialchars($_POST['centre_G2R']);
        $mdp1 = htmlspecialchars($_POST['mdp1']);
        $mdp2 = htmlspecialchars($_POST['mdp2']);

        // On vérifie si l'utilisateur existe
        $check = $bdd->prepare('SELECT pseudo, mail, mot_de_passe FROM compte_admin WHERE mail = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // on transforme toute les lettres majuscule en minuscule pour éviter que Michel et michel soient deux compte différents ..
        $pseudo = strtolower($pseudo); 
        
       // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
       if($row == 0){ 
        // On verifie que la longueur du pseudo <= 100
       if(strlen($pseudo) <= 100){
           // On verifie que la longueur du mail <= 100
           if(strlen($email) <= 100){ 
               // Si l'email est de la bonne forme
               if(filter_var($email, FILTER_VALIDATE_EMAIL)){ 
                   // si les deux mdp saisis sont bon
                   if($mdp1=== $mdp2){ 

                       // On hash le mot de passe avec Bcrypt, via un coût de 12
                       $cost = ['cost' => 12];
                       $mdp1 = password_hash($mdp1, PASSWORD_BCRYPT, $cost);
                       
                       // On stock l'adresse IP
                       $ip = $_SERVER['REMOTE_ADDR']; 
                    
                       // On insère dans la base de données
                       $insert = $bdd->prepare('INSERT INTO compte_admin(nom, prenom, pseudo, mail, telephone, centre_G2R, mot_de_passe, ip, token) VALUES( :nom, :Prenom, :Pseudo, :email, :phone, :centre_G2R, :mdp1, :ip, :token)');
                       $insert->execute(array(
                           'nom' => $nom,
                           'Prenom' => $prenom,
                           'Pseudo' => $pseudo,
                           'email' => $email,
                           'phone' => $phone,
                           'centre_G2R' => $centre_G2R,
                           'mdp1' => $mdp1,
                           'ip' => $ip,
                           'token' => bin2hex(openssl_random_pseudo_bytes(64))
                       ));
                       // On redirige avec le message de succès
                       header('Location: inscription_administrateur.php?reg_err=success');die();
                   }else{ header('Location: inscription_administrateur.php?reg_err=password'); die();}
               }else{ header('Location: inscription_administrateur.php?reg_err=email'); die();}
           }else{ header('Location: inscription_administrateur.php?reg_err=email_length'); die();}
       }else{ header('Location: inscription_administrateur.php?reg_err=pseudo_length'); die();}
   }else{ header('Location: inscription_administrateur.php?reg_err=already'); die();}
       
    }
<?php 
    // Démarrage de la session
    session_start(); 
 
    // On inclut la connexion à la base de données
    require_once '../../config/config.php'; 
    include_once('cookieconnect.php');
    // Si il existe les champs identifiant/pseudo, password et qu'il sont pas vident
    if(!empty($_POST['identifiant']) && !empty($_POST['pass'])){
        
    // Stocker les postes pour eviter les failles XSS
        $identifiant = htmlspecialchars($_POST['identifiant']); 
        $pass = htmlspecialchars($_POST['pass']);

        // on transforme toute les lettres majuscule en minuscule pour éviter que Michel et michel soient deux compte différents ..
        $identifiant = strtolower($identifiant); 
        
        // On regarde si l'administrateur est inscrit dans la table utilisateurs
        $check = $bdd->prepare('SELECT pseudo, mot_de_passe, token FROM compte_admin WHERE pseudo = ?');
        $check->execute(array($identifiant));
        $data = $check->fetch();
        $row = $check->rowCount();
        
        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {   
            // on crée les cookies
            if(isset($_POST['remembermecheckbox'])) {
                setcookie('rememberpseudo',$identifiant,time()+365*24*3600,null,null,false,true);
                setcookie('remembermdp',$pass,time()+365*24*3600,null,null,false,true);
             }
            // Si le pseudo/identifiant est bon niveau format
            if(filter_var($identifiant, FILTER_DEFAULT))
            {
                // Si le mot de passe est le bon
                if(password_verify($pass, $data['mot_de_passe']))
                {
                    
                    // On créer la session et on redirige sur acceuil.php
                    $_SESSION['user'] = $data['token'];
                   
                    header('Location: ../p_acceuil/acceuil.php');
                    die();
                }else{ header('Location: ../../public/connexion_administrateur.php?login_err=pass'); die(); }
            }else{ header('Location: ../../public/connexion_administrateur.php?login_err=pseudo'); die(); }
        }else{ header('Location: ../../public/connexion_administrateur.php?login_err=already'); die(); }
    // si le formulaire est envoyé sans aucune données
    }else{ header('Location: ../../public/connexion_administrateur.php'); die();} 
    

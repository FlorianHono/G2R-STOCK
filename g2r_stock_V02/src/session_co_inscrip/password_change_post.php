<?php 
    require_once '../../config/config.php';
        if(!empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['token'])){
            $password = htmlspecialchars($_POST['password']);
            $confirm_password = htmlspecialchars($_POST['confirm_password']);
            $token = htmlspecialchars($_POST['token']);

            $check = $bdd->prepare('SELECT * FROM compte_admin WHERE token = ?');
            $check->execute(array($token));
            $row = $check->rowCount();

            if($row){
                if($password === $confirm_password){
                    $cost = ['cost' => 12];
                    $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                    $update = $bdd->prepare('UPDATE compte_admin SET mot_de_passe = ? WHERE token = ?');
                    $update->execute(array($password, $token));
                    
                    $delete = $bdd->prepare('DELETE FROM password_recover WHERE token_user = ?');
                    $delete->execute(array($token));

                    header('Location: password_change.php?reg_err=sucess_modif');die();
                }else{
                    header('Location: password_change.php?reg_err=no_identique');die();
                }
            }else{
                header('Location: password_change.php?reg_err=no_exist');die();
            }
        }else{
            header('Location: password_change.php?reg_err=renseign');die();
        }
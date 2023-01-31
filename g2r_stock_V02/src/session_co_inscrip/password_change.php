<?php 
    require_once '../../config/config.php';
    if(!empty($_GET['u'])){
        $token = htmlspecialchars(base64_decode($_GET['u']));
        $check = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = ?');
        $check->execute(array($token));
        $row = $check->rowCount();

        if($row == 0){
            echo "Lien non valide";
            die();
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change_password</title>
    <!-- lIEN BOOTSRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- LIEN FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../ressources/css/connexion_administrateur.css">

</head>
<body>
    <!-- DEBUT FORMULAIRE HTML -->
    <div class="container">
        <div class="row">
            <h1>G2R STOCK</h1>
        </div>
        <div class="login row ">
        <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'sucess_modif':
                        ?>
                            <div class="error_form_mdp ">
                            Le mot de passe a bien été modifie.<a class="error_mdp-link" href="../../public/connexion_administrateur.php"> CONNECTEZ-VOUS </a>
                            </div>
                        <?php
                        break;

                        case 'no_identique':
                        ?>
                            <div class="error_form_mdp">
                            Les mots de passes ne sont pas identiques
                            </div>
                        <?php
                        break;

                        case 'no_exist':
                            ?>
                                <div class="error_form_mdp">
                                Compte non existant
                                </div>
                            <?php
                            break;

                            case 'renseign':
                                ?>
                                    <div class="error_form_mdp">
                                    Merci de renseigner un mot de passe
                                    </div>
                                <?php
                                break;
                        
                    }
                }
                ?> 
                 <!-- ------------STYLE PHP ERROR------------- -->
             <style>
                    .error_form_mdp{
                color: white;
                position: absolute;
                transform: translate(-31px,-50%);
                padding-top: 2%;
                padding-bottom: 2%;
                text-align: center;
                width:500px;
                font-size: small;
                background-color:black;
                 }
                
                 .error_mdp-link{
                color: #b9b9b9;
                text-decoration: none;
                }
    
                .error_mdp-link:visited{
                color: #b9b9b9;
                }
    
                .error_mdp-link:hover{
                 color: white;
                }
                </style>
<!-- ------------STYLE PHP ERROR------------- -->
            <form class="" action="password_change_post.php" method="post" >

                <h2>Réinitialisation du mot de passe</h2>

                <!-- INPUT MOT DE PASSE -->
                <input type="hidden" name="token" value='<?php echo base64_decode(htmlspecialchars($_GET['u'])); ?>'>
                

                <div class="row form-group">
                    <label for=""><i class="form-label col-sm-1 col-form-label fa-solid fa-key fa-xl"></i> 
                    <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" id="eyes" onclick="seeMDP1()"></i>
                    </span>
                </label>
                <div class="invalid-feedback">Example invalid select feedback</div>
                </div>

                 <!-- INPUT CONFIRMATION MOT DE PASSE --> 
                  <div class=" row form-group">
                      <label for=""><i class="form-label col-sm-1 col-form-label fa-solid fa-key fa-xl"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirmez le mot de passe" required>
                        <span>
                        <i class="fa fa-eye" aria-hidden="true" id="eyes" onclick="seeMDP2()"></i>
                    </span>
                    </label>
                  </div>

                  <!-- BOUTON MODIFIER -->
                  <div class="row form-group">
                    <input type="submit" name="modif" value="Modifier">
                  </div>

            </form>
    <!-- FIN DE FORMULAIRE HTML -->
    <!-- ////////////////////////////////////////////////// -->


    <!-- ////////////////////////////////////////////////// -->


      <!-- !-- ------------DEBUT JS------------- -->
      <script type="text/javascript">


// AFFICHER MOT DE PASSES
var state= false;
function seeMDP1(){
if(state){
    document.getElementById("password").setAttribute("type","password");
    state = false;
}else{
    document.getElementById("password").setAttribute("type","text");
    state = true; 
}
}

// AFFICHER MOT DE PASSES
var state= false;
function seeMDP2(){
if(state){
    document.getElementById("confirm_password").setAttribute("type","password");
    state = false;
}else{
    document.getElementById("confirm_password").setAttribute("type","text");
    state = true; 
}
}



</script>


  
    <!-- ////////////////////////////////////////////////// -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace de connexion</title>
    <!-- lIEN BOOTSRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- LIEN FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../ressources/css/connexion_administrateur.css">

</head>
<body>
    <!-- DEBUT FORMULAIRE HTML -->
    <div class="container">
        <div class="row">
            <h1>G2R STOCK</h1>
        </div>
        <div class="login row ">

        <?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'pass':
                        ?>
                            <div class="error_form_co ">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'pseudo':
                        ?>
                            <div class="error_form_co">
                                <strong>Erreur</strong> Pseudo incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="error_form_co">
                                <strong>Erreur</strong> compte non existant, veuillez entrer votre pseudo
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
             <!-- ------------STYLE PHP ERROR------------- -->
             <style>
                    .error_form_co{
                color: white;
                position: absolute;
                transform: translate(-31px,-40%);
                padding-top: 3%;
                padding-bottom: 3%;
                text-align: center;
                width:500px;
                font-size: small;
                background-color:black;
                 }
                
                </style>
<!-- ------------STYLE PHP ERROR------------- -->
            <form class="" action="../src/session_co_inscrip/connexion.php" method="post" >

                <h2>Espace de connexion</h2>

                <!-- INPUT PSEUDO/IDENTIFIANTS -->
                <div class="row form-group">
                    <label for=""><i class=" form-label col-sm-1 col-form-label fa-solid fa-user fa-xl "></i> 
                    <input type="text" id="pseudo" name="identifiant" placeholder="identifiant" required>
                </label>
                <div class="invalid-feedback">Example invalid select feedback</div>
                </div>

                 <!-- INPUT MOT DE PASSE --> 
                  <div class=" row form-group">
                      <label for=""><i class="form-label col-sm-1 col-form-label fa-solid fa-key fa-xl"></i>
                        <input type="password" id="mdp" name="pass" placeholder="Mot de passe" required>
                        <span>
                        <i class="fa fa-eye" aria-hidden="true" id="eyes" onclick="seeMDP()"></i>
                    </span>
                    </label>
                  </div>

                  <!-- BOUTON SE CONNECTER -->
                  <div class="row form-group">
                    <input type="submit" name="seco" value="Se connecter">
                  </div>

                  <!--  CHECKBOX -->
                  <div class="forCheckbox">
                    <input type="checkbox" class="" name="remembermecheckbox" id="rememberme" checked>
                    <label class="form-check-label" for="">se souvenir de moi </label>
                </div>

                <!-- LIEN MDP OUBLIE -->
                <div class="mdpForgot">
                    <a href="../src/session_co_inscrip/mdp_for_mail.php">mot de passe oublié ?</a>
                </div>

            </form>

             <!-- SEPARATEUR -->
             <hr>
    
             <!-- BOUTON S'INSCRIRE -->
             <div>
                <form action="../src/session_co_inscrip/inscription_administrateur.php" method="post">
                 <input id="inscrip" type="submit" name="sinscr" value="S'inscrire">
                 </form>
             </div>
        </div>
    </div>
    <!-- FIN DE FORMULAIRE HTML -->
    <!-- ////////////////////////////////////////////////// -->


    <!-- ////////////////////////////////////////////////// -->


      <!-- !-- ------------DEBUT JS------------- -->
      <script type="text/javascript">


// AFFICHER MOT DE PASSES
var state= false;
function seeMDP(){
if(state){
    document.getElementById("mdp").setAttribute("type","password");
    state = false;
}else{
    document.getElementById("mdp").setAttribute("type","text");
    state = true; 
}
}



</script>


  
    <!-- ////////////////////////////////////////////////// -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>
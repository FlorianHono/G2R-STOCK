<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../ressources/css/inscription_administrateur.css">
</head>

<!-- ------------DEBUT HTML------------- -->
<body>
    <div class="container">

        <h1>G2R STOCK</h1>
        
        <div class="row sign_up">
<!-- ------------DEBUT PHP ERROR------------- -->
        <?php 
                if(isset($_GET['reg_err']))
                {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err)
                    {
                        case 'success':
                        ?>
                            <div class="error_form_ins">
                            <h3><strong>Succès</strong> inscription réussie ! Veuillez-vous <a class="error_co-link" href="../../public/connexion_administrateur.php">CONNECTER</a></h3>
                            </div>
                        <?php
                        break;

                        case 'password':
                        ?>
                            <div class="error_form_ins">
                                <h3 ><strong>Erreur</strong> mot de passe différent</h3>
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="error_form_ins">
                            <h3 ><strong>Erreur</strong> email non valide</h3>
                            </div>
                        <?php
                        break;

                        case 'email_length':
                        ?>
                            <div class="error_form_ins">
                            <h3 ><strong>Erreur</strong> email trop long</h3>
                            </div>
                        <?php 
                        break;

                        case 'pseudo_length':
                        ?>
                            <div class="error_form_ins">
                            <h3 ><strong>Erreur</strong> pseudo trop long</h3>
                            </div>
                        <?php 
                        case 'already':
                        ?>
                            <div class="error_form_ins">
                            <h3 ><strong>Erreur</strong> compte deja existant</h3>
                            </div>
                        <?php 

                    }
                }
                ?>
<!-- ------------STYLE PHP ERROR------------- -->
                <style>
                    .error_form_ins{
                color: white;
                position: absolute;
                transform: translate(-31px,-40%);
                padding-top: 3%;
                padding-bottom: 3%;
                text-align: center;
                width:600px;
                font-size: small;
                background-color:black;
                 }
                
                 .error_co-link{
                color: #b9b9b9;
                text-decoration: none;
                }
    
                .error_co-link:visited{
                color: #b9b9b9;
                }
    
                .error_co-link:hover{
                 color: white;
                }
                </style>
<!-- ------------STYLE PHP ERROR------------- -->
<!-- ------------FIN PHP ERROR------------- -->

            <form class=""  action="inscription.php" method="post">
                
                <h2 class="foraline">Formulaire d'inscription</h2>
    
                <div class=" foraline col ">
                    <label class="aline" for="">Nom</label>
                    <input type="text" name="nom" placeholder="Votre nom" required>
                </div>
                
                
                <div class="foraline col">
                    <label class="aline" for="">Prenom</label>
                    <input type="text" name="Prenom" placeholder="Votre Prenom"required>
                </div>
                
                <div class="foraline col">
                    <label class="aline" for="">Pseudo</label>
                    <input type="text" name="Pseudo" placeholder="Votre Pseudo"required>
                </div>
                
                <div class="foraline col">
                    <label  class="aline" for="">Email</label>
                    <input type="email" name="email" placeholder="Votre email"required>
                </div>
                
                <div class="foraline col">
                    <label class="aline" for="">Tel</label>
                    <input type="tel" name="phone" placeholder="Votre numéro de téléphone" pattern="[0-9]{10}" required>
                </div>
                
                <div class="foraline col">
                    <label class="aline" for="">Centre G2R</label>
                    <select name="centre_G2R" id="" required>
                        <option value="0">--Choisissez votre centre G2R--</option>
                        <option value="Antony">Antony</option>
                        <option value="Aubervilliers">Aubervilliers</option>
                        <option value="Créteil">Créteil</option>
                        <option value="Cergy">Cergy</option>
                        <option value="Eaubonne">Eaubonne</option>
                        <option value="Etampes">Etampes</option>
                        <option value="Garges-les-Gonesse">Garges-les-Gonesse</option>
                        <option value="Le Kremlin-Bicêtre<">Le Kremlin-Bicêtre</option>
                        <option value="Mantes-la-Jolie">Mantes-la-Jolie</option>
                        <option value="Massy">Massy</option>
                        <option value="Montreuil">Montreuil</option>
                        <option value="Pantin">Pantin</option>
                        <option value="Paris 11eme">Paris 11eme</option>
                        <option value="Plaisir">Plaisir</option>
                        <option value="Poissy">Poissy</option>
                        <option value="Rambouillet">Rambouillet</option>
                        <option value="Ris-Orangis">Ris-Orangis</option>
                        <option value="Rueil-Malmaison">Rueil-Malmaison</option>
                        <option value="Sartrouville">Sartrouville</option>
                        <option value="Saint-Mair-des-Fosses">Saint-Mair-des-Fosses</option>
                        <option value="Sevres">Sevres</option>
                        <option value="Versailles">Versailles</option>
                    </select>
                </div>
                
                <div class="foraline col">
                    <label class="aline" for="">Mot de passe</label>
                    <input type="password" name="mdp1" id="password" placeholder="Votre mot de passe"  required>
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" id="eyes" onclick="seeMDP()"></i>
                    </span>
                </div>
                
                <div class=" foraline col">
                    <label class="aline"  for="">Confirmation</label>
                    <input type="password" name="mdp2" id="confirm_password" placeholder="Confirmez Votre mot de passe" required>
                    <span>
                        <i class="fa fa-eye" aria-hidden="true" id="eye" onclick="seeConfirm()"></i>
                    </span>
                </div>
                
                <div class="foraline col">
                    <input type="checkbox" class="" name="" id="" required>
                    <label class="form-check-label" for="">veuillez accepter les <a href="">CGU</a> </label>
                </div>
                
                <div class="foraline col">
                    <input type="submit" class="" name="valider" value="Valider l'inscription">
                </div>
    
            </form>
        </div>
    </div>
    <!-- ------------FIN HTML------------- -->

    <!-- !-- ------------FIN STYLE CSS------------- --> 
   <!-- /////////////////////////////////////////////////// -->
    <!-- !-- ------------DEBUT JS------------- -->
    <script type="text/javascript">

    // AFFICHER MOT DE PASSES
    var state= false;
    function seeMDP(){
        if(state){
            document.getElementById("password").setAttribute("type","password");
            state = false;
        }else{
            document.getElementById("password").setAttribute("type","text");
            state = true; 
        }
    }

    // AFFICHER CONFIRMATION MOT DE PASSES
    var state= false;
    function seeConfirm(){
        if(state){
            document.querySelector("#confirm_password").setAttribute("type","password");
            state = false;
        }else{
            document.querySelector("#confirm_password").setAttribute("type","text");
            state = true; 
        }
    }


    </script>

    <!-- !-- ------------FIN JS------------- --> 
</body>
</html>
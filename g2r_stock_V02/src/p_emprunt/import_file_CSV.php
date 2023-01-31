<?php 
    require_once '../../config/config.php';
    if(!empty($_GET['u'])){
        $token = htmlspecialchars(base64_decode($_GET['u']));
        $check = $bdd->prepare('SELECT * FROM compte_admin WHERE token_user = ?');
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
    <title>import_file_CSV</title>
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
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'compte_non_existant':
                        ?>
                            <div class="error_form_co ">
                                compte non existant
                            </div>
                        <?php
                        break;

                        case 'link':
                        ?>
                            <div class="error_form_co">
                                <strong>Erreur</strong> Pseudo incorrect
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
                transform: translate(-31px,-50%);
                padding-top: 2%;
                padding-bottom: 2%;
                text-align: center;
                width:500px;
                font-size: small;
                background-color:black;
                 }
                
                </style>
<!-- ------------STYLE PHP ERROR------------- -->

            <form action="importCSV.php" method="post" enctype="multipart/form-data" >

                <h2>Import fichier CSV</h2>

                <!-- INPUT MAIL -->
                <div class="row form-group">
                    <label for=""><i class="fa fa-file fa-config fa-2xl fa-color"></i></i> 
                    <input type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required/>
                </label>
                <div class="invalid-feedback">Example invalid select feedback</div>
                </div>

                  <!-- BOUTON ENVOYER -->
                  <div class="row form-group">
                    <input type="submit" name="modif" value="IMPORTER">
                  </div>

            </form>
    <!-- FIN DE FORMULAIRE HTML -->
    <!-- ////////////////////////////////////////////////// -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>
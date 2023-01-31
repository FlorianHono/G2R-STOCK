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
    <meta http-equiv="refresh" content="3; URL=../p_acceuil/acceuil.php">
    <title>Bilan_des_stock</title>
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
                 <div>
                     <h5><i class="fa-solid fa-screwdriver-wrench"></i>coming soon...</h5>
                     <p>redirection en cours dans 3 secondes</p>
                 </div>

              
           
    <!-- FIN DE FORMULAIRE HTML -->
    <!-- ////////////////////////////////////////////////// -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 
</body>
</html>
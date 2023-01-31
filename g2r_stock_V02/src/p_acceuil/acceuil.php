<?php 
    session_start();
    // ajout connexion bdd 
    require_once '../../config/config.php'; 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location: ../../public/connexion_administrateur.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM compte_admin WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../ressources/css/acceuil.css">
</head>
<body>
    <!-- DEBUT PHP -->
    <?php
    include('../includes/navbar1000.php');
    ?>
    <!-- FIN PHP -->
    <header>
    <?php
    include('../includes/nav_horiz.php');
    ?>
         </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"><h1 class="text-start h1accueil">ACCUEIL</h1></div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-3">
                <ol class="breadcrumb">
                    <i class="fa-solid fa-house " id="fil-icon"> </i> 
                    <li class="breadcrumb-item"><a class="fil-ariane" href="acceuil.php">Home</a></li>
                  </ol>
            </div>
            <div class="row g-0 justify-content-center">
                <div class="col-md-12">
                    <hr class="separation" >
                </div>
            </div>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-md-5"> 
                 <?php echo "<h2 class='h2Acceuil text-center'>".'BIENVENU SUR VOTRE ESPACE G2R-STOCK'." ".strtoupper($data['pseudo'])."<h2>"; ?>
            </div>
        </div>
      
        
        <div class="row g-0 justify-content-center ">

            <div class="col-md-3 boxOne">
            <a class= "box-link" href="../p_emprunt/p_emprunt.php">
            <i class=" fa-solid fa-handshake-angle fa-8x d-flex justify-content-center box-icone"></i>
            <hr class="box-sep">
            <h6 class="text-center textBox">EMPRUNT</h6>
            </a>
            </div>

            <div class="col-md-3 boxTwo">
            <a class= "box-link" href="../p_stock/stock1.php">
            <i class="fa-solid fa-box fa-8x d-flex justify-content-center box-icone"></i>
            <hr class="box-sep">
            <h6 class="text-center textBox">STOCK</h6>
            </a>
            </div>

        </div>

        <div class="row g-0 justify-content-center">

            <div class="col-md-3 boxThree">
            <a class= "box-link" href="../p_alerte/coming_soon.php">
            <i class="fa-solid fa-bell fa-8x d-flex justify-content-center box-icone"></i>
            <hr class="box-sep">
            <h6 class="text-center textBox">ALERTE!</h6>
            </a>
            </div>

            <div class="col-md-3 boxFour">
            <a class= "box-link" href="../p_bilan_des_stock_Page/coming_soon.php">
            <i class="fa-solid fa-chart-pie fa-8x d-flex justify-content-center box-icone"></i>
            <hr class="box-sep">
            <h6 class="text-center textBox">BILAN DES STOCKS</h6>
            </a>
            </div>

        </div>
            
        
    </div>
    <!-- LINK DEBUT PHP -->
    <?php
    include('../includes/footer.php');
    ?>
    <!-- FIN PHP -->
    <!-- ///////////////////// -->
<!-- LINK JAVASCRIPT BOOTSRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
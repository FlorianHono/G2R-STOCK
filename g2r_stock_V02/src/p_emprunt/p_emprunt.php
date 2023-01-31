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
    <title>Emprunt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="../../ressources/css/p_emprunt.css">
    <link rel="stylesheet" href="../../ressources/css/print_table.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
<?php
    include('../includes/nav_horiz.php');
    ?>

    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"><h1 class="text-start h1emprunt">EMPRUNT</h1></div>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-3">
                <ol class="breadcrumb">
                    <i class="fa-solid fa-house " id="fil-icon"> </i> 
                    <li class="breadcrumb-item fa_move"><a class="fil-ariane" href="../p_acceuil/acceuil.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="fil-ariane" href="p_emprunt.php">Emprunt</a></li>
                  </ol>
            </div>
        </div>
         <!-- -------------SEPARATOR------------------- -->
        <div class="row g-0 justify-content-center">
            <div class="col-md-12">
                <hr class="separation" >
            </div>
        </div>
        <!-- -------------PANNEL START------------------- -->
        <div class="row g-0 justify-content-center pannel_background ">
            
                <div class="col-1 pannel_config ">
                    <a href="" class="link-pannel">ACTUALISER
                    <i class="fa fa-refresh fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
                <div class="col-1 pannel_config ">
                    <a href="emprunt.php" class="link-pannel">EMPRUNT
                    <i class="fas fa-american-sign-language-interpreting fa-config fa-2xl fa-color"></i>
                </a>
                </div>
               
            
                <div class="col-1 pannel_config ">
                    <a href="modif_emprunt.php" class="link-pannel">MODIFIER
                    <i class="fas fa-edit fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
                <div class="col-1 pannel_config  ">
                    <a href="" class="link-pannel">SUPPRIMER
                    <i class="fas fa-trash-alt fa-config fa-2xl fa-color"></i>
                </a>
                </div>
    
            
                <div class="col-1 pannel_config ">
                    <a href="import_file_CSV.php" class="link-pannel">IMPORT/CSV
                    <i class="fa fa-file fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
                <div class="col-1 pannel_config ">
                    <a href="exportCSV.php" class="link-pannel">EXPORT/CSV
                    <i class="fas fa-file-export fa-config fa-2xl fa-color"></i>
                </a>
                </div>
            
                <div class="col-1 pannel_config ">
                    <a href="" class="link-pannel"onclick="window.print()">IMPRIMER
                    <i class="fa fa-print fa-config fa-2xl fa-color" ></i>
                </a>
                </div>

            
        
        </div>
        <div class="row g-0 justify-content-between fts for_bakcground">
            <br>
        </div>
        <!-- -------------PANNED END------------------- -->
        <!-- -------------//////////////////////------------------- -->
        <!-- -------------SEPARATOR------------------- -->
        <div class="row g-0 justify-content-center">
            <div class="col-md-12">
                <hr class="separation" >
            </div>
        </div>
        
           
    
        <!-- -------------//////////////////////------------------- -->
        <div class="row g-0 justify-content-between fts ">
        
        </div>
        <!-- -------------START DATATABLE------------------- -->
        <div class="row g-0 justify-content-center">
            
                <table id="tableau_excel" class="table table-bordered" style="width:100%">
        <thead class="">
            <tr>
                <th><input type="checkbox" onclick="checkAll(this)"></th>
                <th>ID</th>
                <th>NOM PRENOM</th>
                <th>STATUT</th>
                <th>PC</th>
                <th>QUANTITE</th>
                <th>DATE DE PRET</th>
                <th>DATE DE RESTITUTION</th>
                <th>VILLE</th>
                <th>IP</th>
            </tr>
        </thead>
        <tbody>

            <!-- AFFICHER LA TABLE EMPRUNT -->
            <?php 
            include('show_data_emprunt.php');
            ?>

            <!-- ------------POUR L'IMPORT CSV-------------- -->

            <?php 
            include('show_data_csv.php');
            ?>
        
        </tbody>
    </table>
        </div>
    </div>

    <?php
    include('../includes/footer.php');
    ?>
  <!-- -------------END DATATABLE------------------- -->
  
<script src="../../ressources/js/datatable_set.js"></script>
  <!-- JS SCRIPT -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
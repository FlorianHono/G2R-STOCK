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
    <title>stock</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../ressources/css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include("../includes/nav_horiz.php");
    ?>
<div class="container">
    <div class="titre"><h1>STOCK</h1></div>
    
       
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               
              <li class="breadcrumb-item"><a href="../p_acceuil/acceuil.php"><i class="fa-solid fa-house"></i>Home</a></li>
              <li class="breadcrumb-item active" aria-current="page" style="color: #fff;">Stock</li>
            </ol>
          </nav> 
    </div>
    <div class="separation">
        <hr id="sep">
    </div>
</div>

    <table>
        <tr id="items">
            <td> <a href=""> Actualiser</a></td>
           
            <td><a href="form1.php">Ajouter un appareil</a> </td>
            <td><a href="form_modif_stock.php">Modifier</a> </td>
            <td ><a href="">Supprimer</a> </td>
            <td><a href="">Import CSV</a>  </td>
            <td><a href="">Export CSV</a> </td>
            <td><a href="">Imprimer</a> </td>
        </tr>
    </table>
    <table id="noir">
        <tr id="icons">
            <td> <a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a></td>
            
            <td><a href="form1.php"><i class="far fa-plus"></i><i class="fas fa-laptop"></i></a> </td>
            <td><a href="form_modif_stock.php"><i class="fas fa-edit"></i></a> </td>
            <td> <a href=""><i class="fas fa-trash-alt"></i></a></td>
            <td ><a href=""> <i class="fa fa-file" aria-hidden="true"></i></a></td>
            <td id="csv"><a href=""><i class="fas fa-file-export"></i></a></td>
            <td><a href=""> <i class="fa fa-print" aria-hidden="true"></i></a></td>
        </tr>
    </table>
    <div class="separation"><hr></div>
    <div class="container2">
        
        <div id="icon"><i class="fa fa-filter" aria-hidden="true"></i>filter
            <select name="" id="">

                <option value="null">--</option>
                <option value="centre">centre G2R</option>
                <option value="ville">ville</option>
                <option value="ref">adresse MAC ou référence</option>
                <option value="etat">état de l'appareil</option>
                <option value="dispo">disponibilités</option>
                <option value="dispo">type </option>
            </select>
        </div>
                <div id="search">




                    <form class="d-flex">
                        <button class="btn btn-outline-light" type="submit">rechercher</button>
                        <input class="form-control me-2" type="search" placeholder="rechercher" aria-label="Search">
                        
                      </form>
                </div>
    </div>
     <!-- interface excel -->
     <div class="info">
        <table id="table">
            <tr >
                <th class='bor th'><input type="checkbox"></th>
                <th class='bor th'>id</th>
                <th class='bor th'>Modèle de pc </th>
                <th class='bor th'>Adresse MAC</th>
                <th class='bor th'>Disponibilité</th>
                <th class='bor th'>etat</th>
                <th class='bor th'>Description </th>
                <th class='bor th'>Adresse ip </th>
                <th class='bor th'>Ville  </th>
            </tr>
            <?php
    $conn = new mysqli ("localhost", "root", "","g2r_stock"); 
    $result= mysqli_query($conn,"SELECT * from ajout_stock");
    while($row=mysqli_fetch_array($result)){
        echo"<tr>";
        echo" <td class='bor' id='dark'><input type='checkbox' > </td>";
        echo"<td class='bor'>" .$row['id']."</td>";
        echo"<td class='bor'>" .$row['modele']."</td>";
        echo"<td class='bor'>" .$row['mac']."</td>";
         
                
       
        echo"<td class='bor'>" .$row['dispo']."</td>";
        echo"<td class='bor'>" .$row['etat']."</td>";
        echo"<td class='bor'>" .$row['comment']."</td>";
        echo"<td class='bor'>" .$row['ip']."</td>";
        echo"<td class='bor'>" .$row['ville']."</td>";
        echo"</tr>";
    }
    ?>
        </table>
   
   
     </div>
     <?php
    include("../includes/footer.php");
    ?>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
<?php
$modele = $_POST['modele'];

$mac = $_POST['mac'];
 


$dispo = $_POST['dispo'];






//var_dump($dispo);

$etat = $_POST['etat'];
//var_dump($etat);
if(isset($_POST['comment'])){
    $comment = $_POST['comment'];


}else{
    $comment ='_' ; 
}



if(isset($_POST['ip'])){
    $ip = $_POST['ip'];


}else{
    $ip ='_' ; 
}
$ville = $_POST['ville'];
// database connection
$conn = new mysqli ("localhost", "root", "","g2r_stock");
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
    if(isset($_POST['submit'])){
    $stmt = $conn->prepare("INSERT INTO ajout_stock(modele, mac, dispo, etat, comment, ip, ville) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss", $modele, $mac, $dispo, $etat, $comment, $ip, $ville);
    $stmt->execute();
    //var_dump($stmt);
    echo"registration successfully";
    header("refresh:1; url=stock1.php");
    }
    if(isset($_POST['add'])){
        $stmt = $conn->prepare("INSERT INTO ajout_stock(modele, mac, dispo, etat, comment, ip, ville) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $modele, $mac, $dispo, $etat, $comment, $ip, $ville);
        $stmt->execute();
    //var_dump($stmt);
    echo"<h1 id='h1'>"."registration successfully"."</h1>";
    header("refresh:1; url=form1.php");
    }
    $stmt->close();
    $conn->close();
}
/* 
   
$statut=$_POST['statut'];
                if(isset($_POST['stag'])){
                    $statut='stagiaire';
                } else{
                    $statut='employé';

                } */
?>
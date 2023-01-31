<?php
$nom = $_POST['nom'];
// var_dump($nom);
if(isset($_POST['stag'])){
    $stag = $_POST['stag'];

}else{
    $stag ='_' ; 
}
var_dump($stag);
if(isset($_POST['emplo'])){
    $emplo = $_POST['emplo'];


}else{
    $emplo ='_' ; 
}

//var_dump($emplo);
$model = $_POST['model'];
//var_dump($model);
$qty = $_POST['qty'];
$pret = $_POST['pret'];
$retour = $_POST['retour'];
$ip = $_POST['ip'];
$ville = $_POST['ville'];
// database connection
$conn = new mysqli ("localhost", "root", "","g2r_stock");
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
  
$conn = new mysqli ("localhost", "root", "","g2r_stock");
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}else{
    if(isset($_POST['submit'])){
    $stmt = $conn->prepare("INSERT INTO ajout_emprunt(nom, stag, emplo, model, qty,  pret, retour,ip, ville) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssissss", $nom, $stag, $emplo, $model, $qty, $pret, $retour, $ip, $ville);
    $stmt->execute();
    //var_dump($stmt);
    echo"registration successfully";
    header("refresh:1; url=p_emprunt.php");
    }
    if(isset($_POST['add'])){
        $stmt = $conn->prepare("INSERT INTO ajout_emprunt(nom, stag, emplo, model, qty,  pret, retour,ip, ville) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssissss", $nom, $stag, $emplo, $model, $qty, $pret, $retour, $ip, $ville);
        $stmt->execute();
    //var_dump($stmt);
    echo"<h1 id='h1'>"."registration successfully"."</h1>";
    header("refresh:1; url=emprunt.php");
    }
    $stmt->close();
    $conn->close();
}
}



   
?>
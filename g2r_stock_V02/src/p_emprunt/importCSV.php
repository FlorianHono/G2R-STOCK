<?php 
//configuration de la base de donnée
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "g2r_stock"; 
 
// création de la connexion
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// vérifier la connexion
if ($db->connect_error) { 
    die("erreur de connexion: " . $db->connect_error); 
}
 
if(isset($_POST['importSubmit'])){
    
    // Types de fichier autorisés
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Valider si le fichier sélectionné est un fichier CSV
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // Si le fichier est téléchargé
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Ouvrir le fichier CSV téléchargé 
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Analyse des données du fichier CSV ligne par ligne
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $id   = $line[0];
                $nomPrenom  = $line[1];
                $status  = $line[2];
                $pc = $line[3];
                $quantite = $line[4];
                $dateDePret = $line[5];
                $dateDeRestitution = $line[6];
                $ville = $line[7];
                $ip = $line[8];
                
                // Vérifier si un membre existe déjà dans la base de données avec le même nom.
                $prevQuery = "SELECT id FROM ajout_emprunt WHERE nom = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Mettre à jour les données des membres dans la base de données
                    $db->query("UPDATE ajout_emprunt SET id = '".$id."', nom = '".$nomPrenom."', stag = '".$status."', model = '".$pc."', qty = '".$quantite."',pret = '".$dateDePret."',retour = '".$dateDeRestitution."',ip = '".$ip."',ville = '".$ville."', modified = NOW() WHERE nom = '".$nomPrenom."'");
                }else{
                    // Insérer les données des membres dans la base de données
                    $db->query("INSERT INTO ajout_emprunt (id, nom, stag, emplo, model, qty, pret, retour, ip, ville) VALUES ('".$id."', '".$nomPrenom."', '".$status."','".$pc."','".$quantite."','".$dateDePret."','".$dateDeRestitution."','".$ip."', '".$ville."')");
                }
            }
            
            // Fermer le fichier CSV ouvert
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

// Redirection
header("Location: p_emprunt.php".$qstring);
 
?>
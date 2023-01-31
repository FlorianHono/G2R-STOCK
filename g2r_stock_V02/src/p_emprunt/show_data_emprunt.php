
<?php

$servername = "localhost"; 
            $username = "root";
            $password = "";
            $database = "g2r_stock";

            // créer la connexion 
            $connection = new mysqli($servername,$username,$password,$database);

            // lire les lignes de la table sql
            $sql = "SELECT * FROM ajout_emprunt";
            $result = $connection ->query($sql);

            if (!$result){
                die("invalid query: ".$connection->error);
            
            }

            //lire les données pour chaques lignes 
            while ($row = $result->fetch_assoc()){

                echo "
                <br>
                  <td ><input type='checkbox' ></td>
                <td>".$row['id']."</td>
                <td >".$row['nom']."</td>
                 <td>".$row['stag']."</td>
                <td>".$row['model']."</td>
                <td>".$row['qty']."</td>
                <td>".$row['pret']."</td>
                <td>".$row['retour']."</td>
                <td>".$row['ip']."</td>
                <td>".$row['ville']."</td>
            </tr>";

            }

           
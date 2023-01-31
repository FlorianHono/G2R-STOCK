<?php

            // ------------POUR L'IMPORT CSV--------------
            // Obtenir les rangées de membres

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

            $result = $db->query("SELECT * FROM ajout_emprunt ORDER BY id DESC");
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
            ?>
                <tr><td ><input type='checkbox' ></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['stag']; ?></td>
                    <td><?php echo $row['model']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['pret']; ?></td>
                    <td><?php echo $row['retour']; ?></td>
                    <td><?php echo $row['ip']; ?></td>
                    <td><?php echo $row['ville']; ?></td>
                </tr>
            <?php } }else{ ?>
                <tr><td colspan="5">No member(s) found...</td></tr>
            <?php } ?>
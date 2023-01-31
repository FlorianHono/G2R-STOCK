
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace administrateur</title>
    <link rel="stylesheet" href="../../ressources/css/modif_administrateur.css">
</head>
<body>
    <div id="title">
        <h1>G2R STOCK</h1>
    </div>
    <form action="" method="post">
        <table>

        
                <tr><td colspan="3" id="titre"> Espace administrateur</td></tr>
                <tr>
                    <td><label for="">Nom : </label></td>
                    <td colspan="2"><input type="text" placeholder="tapez votre nom"></td>
                </tr>
                <tr>
                    <td><label for=""> Prénom : </label></td>
                    <td colspan="2"><input type="text" placeholder="tapez votre  prénom "></td>
                </tr>
                <tr>
                    <td><label for="">Pseudo :   </label></td>
                    <td colspan="2"><input type="text" placeholder="tapez votre pseudo"></td>
                </tr>
                
                <tr>
                    <td><label for="">E-mail : </label></td>
                    <td colspan="2"><input type="email" placeholder="tapez votre adresse mail@"></td>
                </tr>
                <tr>
                    <td><label for="">Tel : </label></td>
                    <td colspan="2"><input type="number" placeholder="tapez votre numéro de telephone"></td>
                </tr>
                <tr><td> <label for="" id="vil">Centre G2R :</label></td>
                    <td> <select name="ville" id="ville" >
                         
                         <option value="null">inconnu</option>
                         <option value="paris">paris</option>
                         <option value="montreil"> montreil</option>
                         <option value="sartrouville">  sartrouville </option>
                         <option value="autre">autre </option>
                 
                 
                 
                     </select></td></tr>
                <tr>
                    <td><label for="">password :  </label></td>
                    <td colspan="2"><input type="password" placeholder="tapez votre mot de passe"></td>
                </tr>

               <tr><td colspan="3"><input type="submit" value="Modifier les informations" id="valider"></td></tr> 
               
        </table>
    </form>
</body>
</html>
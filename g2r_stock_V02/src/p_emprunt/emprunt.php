<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>G2R ERMPUNT</title>
    <link rel="stylesheet" href="../../ressources/css/styleform_emprunt.css">
</head>
<body>
    <h1> G2R STOCK</h1>
    <form action="table_emprunt.php" method="post">
        <table>
            <tr><td colspan="4" id="titre"> Formulaire d'emprunt</td></tr>
            <tr>
                <td><label >Nom & Prénom: </label></td>
                <td colspan="2"><input type="text" placeholder="le nom du stagiaire ou de l'empoyeur" name="nom"></td>
            </tr>
            <tr>
                <td> <label  id="statut">Statut : </label></td>
                <td><input type="checkbox" id="stag" name="stag"> Stagiaire</td>
                <td><input type="checkbox" id="emplo" name="emplo"> Employé</td></tr>
            <tr>
                <td><label >modèle de PC : </label></td>
                <td colspan="2">
                    <select name="model" id="model">
                        <option value="null">--</option>
                    </select>
                </td>
                <td><label id="qte">Quantité : </label>
                    <input type="number" id="qty" name="qty"></td>
            </tr>
            <tr><td></td>
                <td colspan="2">
                    <input type="submit" value="ajouter un matériel supplimentaire"  name="add" id="btn">
                </td>
                <td></td></tr>
                <tr>
                    <td><label >Date de pret : </label></td>
                    <td colspan="2"><input type="date" name="pret"></td>
                </tr>
                <tr>
                    <td><label  >Date de <span id="date">restitution :</span>  </label></td>
                    <td colspan="2"><input type="date" name="retour" ></td>
                </tr>
                <tr>
                    <td ><label  >Adresse IP : </label></td>
                    <td colspan="2"><input type="text" placeholder="Adresse IP" name="ip"></td>
                </tr>


                <tr><td > <label  id="vil">Ville :</label></td>
                    <td colspan="2">
                         <select name="ville"  >
                         <option value="0">--Choisissez votre centre G2R--</option>
                        <option value="Antony">Antony</option>
                        <option value="Aubervilliers">Aubervilliers</option>
                        <option value="Créteil">Créteil</option>
                        <option value="Cergy">Cergy</option>
                        <option value="Eaubonne">Eaubonne</option>
                        <option value="Etampes">Etampes</option>
                        <option value="Garges-les-Gonesse">Garges-les-Gonesse</option>
                        <option value="Le Kremlin-Bicêtre<">Le Kremlin-Bicêtre</option>
                        <option value="Mantes-la-Jolie">Mantes-la-Jolie</option>
                        <option value="Massy">Massy</option>
                        <option value="Montreuil">Montreuil</option>
                        <option value="Pantin">Pantin</option>
                        <option value="Paris 11eme">Paris 11eme</option>
                        <option value="Plaisir">Plaisir</option>
                        <option value="Poissy">Poissy</option>
                        <option value="Rambouillet">Rambouillet</option>
                        <option value="Ris-Orangis">Ris-Orangis</option>
                        <option value="Rueil-Malmaison">Rueil-Malmaison</option>
                        <option value="Sartrouville">Sartrouville</option>
                        <option value="Saint-Mair-des-Fosses">Saint-Mair-des-Fosses</option>
                        <option value="Sevres">Sevres</option>
                        <option value="Versailles">Versailles</option>
                  </select></td></tr>
                 <tr><td></td><td colspan="2"><input type="submit" value="valider" id="valider" name="submit"></td></tr>
                 <tr><td></td><td colspan="2" id="piedt"> confirmation de votre emprunt </td></tr>
 
        </table>
    </form>
</body>
</html>
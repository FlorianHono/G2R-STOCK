<?php

if(!isset($_SESSION['user']) AND isset($_COOKIE['rememberpseudo'],$_COOKIE['remembermdp']) AND !empty($_COOKIE['rememberpseudo']) AND !empty($_COOKIE['remembermdp'])) {
   $check = $bdd->prepare("SELECT * FROM compte_admin WHERE mail = ? AND mot_de_passe = ?");
   $check->execute(array($_COOKIE['rememberpseudo'], $_COOKIE['remembermdp']));
   $row = $check->rowCount();
   if($row == 1)
   {
      $userinfo = $check->fetch();
      $_SESSION['user'] = $userinfo['user'];
      $_SESSION['rememberpseudo'] = $userinfo['rememberpseudo'];
      $_SESSION['remembermdp'] = $userinfo['remembermdp'];
   }
}
?>
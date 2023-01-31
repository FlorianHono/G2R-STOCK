<?php 
// demarrage de la session
    session_start(); 
    // on détruit les cookies
    setcookie('rememberpseudo','',time()-3600);
    setcookie('remembermdp','',time()-3600);
    // on détruit la/les session(s), soit si vous utilisez une autre session, utilisez de préférence le unset()
    session_destroy(); 
    // On redirige
    header('Location:../../public/connexion_administrateur.php'); 
    die();
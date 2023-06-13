<?php
function isPasswordSame($pass1, $pass2)
{
    if ($pass1 != $pass2) {
        return TRUE;
    } else {
        return FALSE;
    }
    
}
// Création de la fonction de connexion afin de la rappeler à notre guise
function connexpdo($base,$param)
{
    // Inclusion des paramètres su serveur
    include_once($param.".inc.php");
    // Connexion en serveur
    $dsn="mysql:host=".HOST.";dbname=".$base;
    $user=USER;
    $pass=PASS;
    try
    {
        $idcom=new PDO($dsn,$user,$pass);
        return $idcom;
    }
        catch(PDOException $except)
    {
        echo"Echec de la connexion",$except->getMessage();
        return FALSE;
        exit();
    }
}

?>
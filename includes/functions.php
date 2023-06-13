<?php
function isPasswordSame($pass1, $pass2)
{
    if ($pass1 != $pass2) {
        return TRUE;
    } else {
        return FALSE;
    }
    
}
?>
<?php
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
<?php
// Fonction qui retourne la valeur cryptée d'un mot de passe
function getPasswordHash($pass)
{
  return password_hash($pass, PASSWORD_DEFAULT);
}
?>
<?php
// Fonction qui vérifie la correspondance entre un mote de passe crypté et son origine
function isPasshashAndPassMatch($pass, $pass_hash)
{
    // $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
    if (password_verify($pass, $pass_hash))
    {
    return TRUE; # identique
    }
    else
    {
    return FALSE; # différent
    }
}
?>
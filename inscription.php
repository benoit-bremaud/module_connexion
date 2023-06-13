<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        fieldset {
            border: double medium red;
        }
    </style>
</head>
<body>
    <header>
        <nav></nav>
    </header>
    <main>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Formulaire d'inscription</legend>
                <table>
                    <tr>
                        <td>
                            <label for="prenom">Prénom :</label>
                        </td>
                        <td>
                            <input  type="text"
                                    name="prenom"
                                    id="prenom"
                                    pattern="^[a-zA-Z]{3,15}$"
                                    maxlength="15"
                                    value="<?php if(isset($_POST["prenom"])) echo $_POST["prenom"]?>"
                                    />
                            <!-- maintien état formulaire -->
                            <!-- <br> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="nom">Nom :</label>
                        </td>
                        <td>
                            <input  type="text"
                                    name="nom"
                                    id="nom"
                                    pattern="^[a-zA-Z]{3,15}$"
                                    maxlength="15"
                                    value="<?php if(isset($_POST["nom"])) echo $_POST["nom"]?>"/>
                            <!-- maintien état formulaire -->
                            <!-- <br> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="login">Log In :</label>
                        </td>
                        <td>
                            <input  type="text"
                                    name="login" id="login"
                                    pattern="^[a-zA-Z]{3,15}$"
                                    maxlength="15"
                                    value="<?php if(isset($_POST["login"])) echo $_POST["login"]?>"/>
                            <!-- maintien état formulaire -->
                            <!-- <br> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pword">Mot de passe :</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="pword" maxlength="20">
                            <!-- <br> -->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="pword">M.D.P. Confirmation :</label>
                        </td>
                        <td>
                            <input type="password" name="conf_password" id="pword" maxlength="20">
                            <!-- <br> -->
                        </td>
                    </tr>

                    <!-- <label for="c_pword">Confirmation m.d.p :</label>
            <input type="password" name="c_password" id="c_pword"><br> -->
                </table>
                <br>
                <input type="reset" value="Effacer">&nbsp;&nbsp;&nbsp; <!-- espace insécable &nbsp;-->
                <input type="submit" value="Inscription">
            </fieldset>
        </form>
        <?php

        // Inclusion du fichier functions.php
        include("./includes/functions.php");

        // Connexion au serveur
        $idcom=connexpdo("moduleconnexion","myparam");

        if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["login"]) && !empty($_POST["password"])) # Vérification de l'existance des saisies obligatoires
        {
            $id_utilisateurs=$idcom->lastInsertId();
            $prenom=$idcom->quote($_POST['prenom']);
            $nom=$idcom->quote($_POST['nom']);
            $login=$idcom->quote($_POST['login']);
            $password=$idcom->quote($_POST['password']);
            $conf_password=$idcom->quote($_POST['conf_password']);
            // Teste si les mots de passe sont identiques
            if ($password!=$conf_password)
            {
                echo "<script type=\"text/javascript\">
                alert('Erreur dans la confirmation du mot de passe')</script>";

            }
            else
            {
                // Requête SQL
                $requete3="INSERT INTO utilisateurs VALUES($id_utilisateurs, $login, $prenom, $nom, $password)";
                $nblignes=$idcom->exec($requete3);

                if ($nblignes!=1)
                {
                $mess_erreur=$idcom->errorInfo();
                echo "Insertion impossible, code", $idcom->errorCode(),$mess_erreur[2];
                echo "<script type=\"text/javascript\">
                alert('Erreur : ".$idcom->errorCode()."')</script>";
                }
                else
                {
                    echo "<script type=\"text/javascript\">
                    alert('Vous êtes enregistré. Votre id est le : ".$idcom->lastInsertId()."')</script>";
                $idcom=NULL;
                }
            $idcom=NULL;    
            }  
        }
        else
        {
            echo "<h3>Formulaire à compléter !</h3>";
        }
        

        // Requête sans résultats
        // $requete1="UPDATE `utilisateur` SET `nom`='Bremaud' WHERE `id`='1'"; # Ecriture de la requete dans la variable $requete1
        // $nb=$idcom->exec($requete1); # Envoi de la requete "requete1" à l'aide de la méthode exec() qui renvoi le nombre de lignes affectées
        // echo"<p>$nb ligne(s) modifiée(s)<hr></p>"; # Affichage du nombre de lignes affectées par la requete "requete1"

        // Requête avec résultats
        // $requete2="SELECT * FROM `utilisateurs`"; # Ecriture de la requete dans la variable $requete2
        // $result=$idcom->query($requete2); # Envoi de la requete "requete2" à l'aide de la méthode query() et retourne le résultat dans la variable "$result"
        // if (!$result) # Si "$result" = FALSE 
        // {
        //     $mes_erreur=$idcom->errorInfo(); # On récupère les erreurs
        //     echo "Lecture impossible, code", $idcom->errorCode(),$mes_erreur[2]; # Puis on les affiche
        // } 
        // else # Sinon si "$result" est différent de FALSE
        // {
        //     while ($row = $result->fetch(PDO::FETCH_NUM)) # Retourne un tableau de type indicé "PDO::FETCH_NUM", peu aussi être un tableau associatif "PDO::FETCH_ASSOC"
        //     {
        //         foreach ($row as $value)
        //         {
        //             echo $value,"&nbsp;";
        //         }
        //         echo "<hr>";
        //     }
        //     $result->closeCursor(); # Permet de libérer la mémoire occupée par le résultat de la requete "requete2", très utile avant d'envoyer une NOUVELLE requete au serveur
        // }
        // // Fermeture de la connexion
        // $idcom=NULL;    

        ?>

    </main>
    <footer>

    </footer>

</body>

</html>
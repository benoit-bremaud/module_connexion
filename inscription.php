<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
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
    <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post" enctype="application/x-www-form-urlencoded">
            <fieldset> 
            <legend>Formulaire d'inscription</legend>
            
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" pattern="^[a-zA-Z]{1,10}$" maxlength="15"><br>
            
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom"><br>
            
            <label for="login">Log In :</label>
            <input type="text" name="login" id="login"><br>
            
            <label for="pword">Mot de passe :</label>
            <input type="password" name="password" id="pword" maxlength="5"><br>
            
            <!-- <label for="c_pword">Confirmation m.d.p :</label>
            <input type="password" name="c_password" id="c_pword"><br> -->

            <input type="reset" value="Effacer"><br>
            <input type="submit" value="Inscription"><br>
    
            </fieldset>
        </form>
        <?php
        if (isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["login"]) && isset($_POST["password"]))
        {
            echo "<h2>Bonjour " 
            . stripslashes($_POST["prenom"]) 
            . " " . stripslashes($_POST["nom"])
            . " " . stripslashes($_POST["login"]);            
        }    

        ?>

    </main>
    <footer>

    </footer>
    
</body>
</html>
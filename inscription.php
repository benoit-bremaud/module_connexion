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
                                value="<?php if(isset($_POST["prenom"])) echo $_POST["prenom"]?>"/> <!-- maintien état formulaire -->
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
                                value="<?php if(isset($_POST["nom"])) echo $_POST["nom"]?>"/> <!-- maintien état formulaire -->
                                <!-- <br> -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="login">Log In :</label>
                    </td>
                    <td>                
                        <input  type="text"
                                name="login"
                                id="login"
                                pattern="^[a-zA-Z]{3,15}$"
                                maxlength="15"
                                value="<?php if(isset($_POST["login"])) echo $_POST["login"]?>"/>  <!-- maintien état formulaire -->
                                <!-- <br> -->
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pword">Mot de passe :</label>
                    </td>
                    <td>
                        <input  type="password"
                                name="password"
                                id="pword"
                                maxlength="15" >
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
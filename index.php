<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Module Connexion</title>
</head>
<body>
    <header>
        <nav></nav>
    </header>
    <main>
        <form action="inscription.php" method="post">
            <input type="submit" value="Inscription">
        </form>
        <form action="connexion.php" method="post">
            <input type="submit" value="Connexion">
        </form>

        <?php
        include_once("./includes/functions.php");
        $pass="Azerty2@";
        $passhash=getPasswordHash($pass);
            echo $pass. " correspond à ". $passhash."<br>";

        $pass2="Azerty2@";
        echo $pass2. " correspond à ". isPasshashAndPassMatch($pass, $passhash);
        ?>


    </main>
    <footer>

    </footer>
    
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

</head>
<body>
<h1>Inscription Validée ! :]</h1>
<h1>Page de connexion pour un compte Livre d'Or</h1>
    <?php
    
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["login"]) && isset($_POST["password"])){
        $login = $_POST["login"];
        $password = $_POST["password"];

       
        $servername = "localhost";
        $username = "root";
        $password_db = "N1610J2803C2912s?";
        $dbname = "livreor";
        $connexion = new mysqli($servername, $username, $password_db, $dbname);


        if ($connexion -> connect_error){
            die ("Erreur de connexion à la base de données" . $connexion ->connect_error);
        }

        $verifutilisateur = "SELECT * FROM user WHERE login = '$login' AND password = '$password'";
        $result = $connexion ->query($verifutilisateur); 

        if ($result -> num_rows == 1){
            $_SESSION["logged_in"] = TRUE;
            

            header("Location: index1.php");
            exit();
        }else{
            echo "Identifiants de connexion invalides .Veuillez réessayer";
        }
        $connexion -> close();

    }
    }
    ?>

<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>"method = "POST">

<label for = "login">Login : </label>
<input type = "text" id = "login" name = "login" required><br><br>

<label for = "password">Mot de passe : </label>
<input type = "password" id = "password" name = "password" required><br><br>

<input type = "submit" value = "Connexion">
</form>
    
    
    
</body>
</html>
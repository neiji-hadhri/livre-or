<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
<h1>Page d'inscription pour un compte Livre d'Or</h1>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["login"]) && isset($_POST["password"])){
        $login = $_POST["login"];
        $password = $_POST["password"];
        

        if (empty($login) || empty($password)){
            echo "Veuillez remplir tout les champs fournis.";
        }

        
        elseif(strlen($password)< 8 ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[^a-zA-Z0-9]/', $password)){
            echo "Le mot de passe fournit ne contient pas les caractères : Il doit contenir au minimum 8 caractères, une minuscule, une majuscule, un chiffre et un caractère spécial.";
        }
        else{
            $servername = "localhost";
            $username = "root";
            $dbpassword = "N1610J2803C2912s?";
            $dbname = "livreor";
            $connexion = new mysqli ($servername, $username, $dbpassword, $dbname);
        
        if ($connexion -> connect_error){
            echo ("Erreur de connexion à la base de données : ". $connexion -> connect_error);
        }
            $sql = "INSERT INTO user(login, password) VALUES ('$login', '$password')";
            if ($connexion ->query($sql) == TRUE){
                header("Location: connexion.php");
                exit();
        }else{
            echo "Erreur lors de l'inscription : " . $connexion -> error;
        }
        $connexion -> close();
    }
}
    }
    ?>
    <form action = "<?php echo $_SERVER["PHP_SELF"]; ?>"method = "POST">

    <label for = "login">Login : </label>
    <input type ="text" id = "login" name = "login" required><br><br>

    <label for = "password">Mot de passe : </label>
    <input type = "password" id = "password" name = "password" required><br><br>

    <input type = "submit" value = "Inscription">
    </form>
    
</body>
</html>
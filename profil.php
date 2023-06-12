<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (!empty($login) && !empty($password)){
        $login = $_POST["login"];
        $password = $_POST["password"];

        $servername = "localhost";
        $username = "root";
        $password_db = "N1610J2803C2912s?";
        $dbname = "livreor";
        $connexion = new mysqli($servername, $username, $password_db, $dbname);
        $ancien_login = "";
        $ancien_password = "";

        if ($connexion -> connect_error){
            die ("Erreur de connexion à la base de données" . $connexion ->connect_error);
        }
        $user_id = 1;

        $verifutilisateur = "SELECT login, password FROM user WHERE id = $user_id";
        $result = $connexion ->query($verifutilisateur); 

        if ($result -> num_rows == 1){
            $ligne = $result -> fetch_assoc();
            $ancien_login = $ligne["login"];
            $ancien_password = $ligne["password"];
        }else{ 
            echo "Utilisateur introuvable .";
        }
        
        $connexion -> close();
        }
    }
    ?>

<h1>Modifier le profil</h1>
<form action ="<?php echo $_SERVER["PHP_SELF"]; ?>"method="post">
<label for= "login">Login : </label>
<input type= "text" id ="login" name ="login" required value="<?php echo isset($ancien_login) ?$ancien_login : ''; ?>"><br>
<label for= "password">Mot de passe :</label>
<input type="password" id ="password" name= "password" required value="<?php echo isset($ancien_password) ?$ancien_password : ''; ?>" ><br>
<input type ="submit" value="Enregistrer">
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <?php
    echo "<h1>Le Livre d'Or</h1>";
    echo "<h3>Bienvenue sur le site le Livre d'Or</h3><br>";
    echo "<p>Le Livre d'Or permet aux utilisateurs de pouvoir acheter ou louer n'importe quel livre à tout moment de votre journée et tout cela avec une livraison expresse.Le Livre d'Or a en moyenne 2 ateliers dans les grandes villes de France tels que Marseille, Lyon, Paris,Toulouse, Nice, Montpellier, Monaco, etc...</p><br>";
    echo "<h3>Afin de pouvoir acheter vos livres préférés, une incription est nécessaire :";
    ?>
    <form method = "post" action = "inscription.php">
        <button type = "submit">Inscription</button>

</form>
</body>
</html>
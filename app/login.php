<!DOCTYPE html>
<html>
<head>
	<title>login</title>
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">  
    <link rel="stylesheet" href="stylelogin.css" />
</head>
<body>
<a href="index.php" ><img src="image\retour.png" width="50" height="50"></a>

<div id="container">
    <form action="" method="post" id="formulaire">
    <h1>Connexion </h1>
    <label><b>Nom d'utisateur :</b></label>
    <input type="texte" placeholder="entrer le Nom d'utilisateur" name="txtlogin" required id="zonetext">
        <br/>
    <label><b>Mot de passe    :</b></label>
    <input type="password" placeholder="entrer le Mot de Passe" name="txtpw" required id="zonetext">
    <br/>
    <input type="submit" name="btlogin" value="Login" id="submit" class="submit">
    <br/>
    <input type="submit" name="nvc" value="Crée un compte" id="submit" class="submit" onclick="window.location.href = 'nvcompte.php';">
    <input type="submit" name="nvc" value="ADMIN" id="submit" class="submit" onclick="window.location.href = 'admin.php';">
    <?php

if(isset($_POST['txtlogin']) && isset($_POST['txtpw']))
{
    // connexion à la base de données
    session_start();
    $db = mysqli_connect("localhost", "root", "root", "loccar"); 
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['txtlogin'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['txtpw']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM user where 
              login = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['txtlogin'] = $username;
           header('Location: accueil.php');
        }

    }
}

mysqli_close($db); // fermer la connexion
?>
<?php
                session_start();
                if($_SESSION['txtlogin'] !== ""){
                    
                }
            ?>
    </form>
</div> 


</body>
</html>
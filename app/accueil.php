<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styleaccueil.css" />
<style>
    .myphoto{
        width : 100px ; 
        height : 100px ; 
        border-radius : 50% ; 
        border : 1px solid ; 
    }
    .photocar{
        width: 130px;
        height: 100px;
        border-radius: 5%;
        border: 1px solid;
    }
    </style>
</head>
<body>
    <div id="entete">
        
    <img id="img_entete" src="vidcar.gif" >
    <?php 
    $user=$_SESSION['txtlogin'];
    ?>
    
        <p id="nomsite" data-text="<?php
        session_start();
         echo $_SESSION['txtlogin']; ?>">_________________</p>
        <div id="formauto" >

        </div>
        
    </div>
    <div id="glob">
        <div id="profil">
        <?php
            session_start();
            echo "Bonjour et Bienvenue ".$_SESSION['txtlogin']."<br/>";
            $conn = mysqli_connect("localhost", "root", "root", "loccar"); 
            $user=$_SESSION['txtlogin'];
            $req="select * from user where login like '$user'";
            $resultat= mysqli_query($conn , $req);
            $ligne = mysqli_fetch_assoc($resultat);
            ?>
            <img src="<?php echo $ligne['myphoto']; ?>" class="myphoto">
            <br/>
            <a href="login.php">Deconnexion</a>
</div>
<div id="tableaubord" style="text-align: center;">
<p><h1><b>liste des voitures</b></h1>
<?php
$conn = mysqli_connect("localhost", "root", "root", "loccar"); 
$req = "select * from automobile";
$resultat= mysqli_query($conn , $req);
$nbr= mysqli_num_rows($resultat); 
echo "<p>Total :<b> ".$nbr." </b>voitures </p> ";

?>
<p><a href="consulter.php?user=<?php echo $user; ?>"><img src="image\consulter1.jpg" width="50px" height="50px"></a></p>

<table width="100%" border="1" >
    <tr>
        <th>Immatriculation</th>
        <th>Marque</th>
        <th>Prix de location</th>
        <th>Photo</th>
        <th>Demander</th>
        
</tr>
<?php
while($ligne = mysqli_fetch_assoc($resultat))
{

 ?>
 <tr>
<td><?php echo $ligne['IMM']; ?></td>
<td><?php echo $ligne['MARQUE']; ?></td>
<td><?php echo $ligne['PRIX_LOC']; ?></td>
<td><img src='<?php echo $ligne['PHOTO']; ?>' class="photocar"></td>
<td><a href="demande.php?demande=<?php echo $ligne['IMM']; ?>"><img src="image\demande.png" width="50px" height="50px"></a></td>

</tr>

 <?php } ?>
</table>


</div>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="utf-8">    
    <link rel="stylesheet" href="styleaccueil.css" />
	<title></title>
    <style>
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

        <p id="nomsite" data-text="Accueil ADMIN">_________________</p>
        <div id="formauto" >

            <form name="formauto" method="post" action="">
                
            </form>
        </div>

    </div>
    <a href="login.php" ><img src="image\retour.png" width="50" height="50"></a>
    <div id="glob" style="text-align: center;">
<div id="tableaubord">
<h1><b>liste des voitures</b></h1>
<?php
$conn = mysqli_connect("localhost", "root", "root", "loccar"); 
$req = "select * from automobile";
$resultat= mysqli_query($conn , $req);
$nbr= mysqli_num_rows($resultat); 
echo "<p>Total <b>".$nbr."</b>voitures </p> ";

?>


<a href="adajout.php"><img src="image\ajout.png" width="50px" height="50px" ></a>
<a href="consulteradmin.php" style="margin-left:50px;"><img src="image\consulter1.jpg" width="50px" height="50px"></a>

<table width="100%" border="1" >
    <tr>
        <th>Immatriculation</th>
        <th>Marque</th>
        <th>Prix de location</th>
        <th>Photo</th>
        <th>Consulter</th>
        <th>Supprimer</th>
        <th>Modifier</th>
        
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
<td><a href="consultauto.php?mat=<?php echo $ligne['IMM']; ?>"><img src="image\consult.png" width="50px" height="50px"></a></td>
<td><a href="supprime.php?supcar=<?php echo $ligne['IMM']; ?>" ><img src="image\supprime.png" width="50px" height="50px"></a></td>
<td><a href="modifier.php?mod=<?php echo $ligne['IMM']; ?>"><img src="image\modifier.png" width="50px" height="50px"></a></td>

</tr>

 <?php } ?>
</table>


</div>
</div>
</body>
</html>
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

        <p id="nomsite" data-text="Tous les demandes">_________________</p>
        <div id="formauto" >

            <form name="formauto" method="post" action="">
                
            </form>
        </div>

    </div>
    <a href="admin.php" ><img src="image\retour.png" width="50" height="50"></a>

    <div id="glob" style="  text-align: center;">
<div id="tableaubord">
<h1><b>liste des voitures</b></h1>
<?php
$conn = mysqli_connect("localhost", "root", "root", "loccar"); 



$req = "select * from loc";
$resultat= mysqli_query($conn , $req);
$nbr= mysqli_num_rows($resultat); 
echo "<p>Total :<b> ".$nbr."</b> </p> ";

?>
<table width="100%" border="1" >
    <tr>
        <th>Photo</th>
        <th>Matricule</th>
        <th>CIN</th>
        <th>Date Debut</th>
        <th>Date fin</th>
        <th>Prix total</th>
        <th>nombre de jours </th>
        <th>Supprimer</th>
        <th>Modifier</th>
        
       
        
</tr>
<?php

while($ligne = mysqli_fetch_assoc($resultat))
{

 ?>
 <?php
 $mat=$ligne['matricule'];
    $conn = mysqli_connect("localhost", "root", "root", "loccar"); 
    $req1 = "select * from automobile where IMM like '$mat'";
    $resultat1= mysqli_query($conn , $req1);
    $ligne1 = mysqli_fetch_assoc($resultat1);
    
        ?>

 <tr>
<td><img src='<?php echo $ligne1['PHOTO']; ?>' class="photocar"></td>
<td><?php echo $ligne['matricule']; ?></td>
<td><?php echo $ligne['CIN']; ?></td>
<td><?php echo $ligne['date_debut']; ?></td>
<td><?php echo $ligne['date_fin']; ?></td>
<td><?php echo $ligne['prixtotal']; ?></td>
<td><?php echo $ligne['nbrjours']; ?></td>
<td><a href="supprimerconsult.php?supcarC=<?php echo $ligne['matricule']; ?>" ><img src="image\supprime.png" width="50px" height="50px"></a></td>
<td><a href="modifierconsult.php?modC=<?php echo $ligne['matricule']; ?>"><img src="image\modifier.png" width="50px" height="50px"></a></td>

</tr>

 <?php } ?>
</table>


</div>
</div>
</body>
</html>
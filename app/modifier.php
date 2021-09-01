<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="nvcompte.css" />

</head>
<body>
    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        <p id="nomsite" data-text="Modifier voiture">_____________________</p>
        <div id="formauto" >
        </div>
    </div>
    <a href="admin.php" ><img src="image\retour.png" width="50" height="50"></a>
    <div id="container">
    <form action="" method="POST" id="formulaire" enctype="multipart/form-data" name="formAdd">
    <label><b>Matricule :</b></label>
    <input type="texte" name="txtimm" id="zonetext" Value="<?php echo $_GET['mod'] ?>" readonly>
        <br/>
    <label><b>Marque    :</b></label>
    <input type="texte" placeholder="entrer la marque" name="txtmarque"  id="zonetext" required>
    <br/>
    <label><b>Prix location :</b></label>
    <input type="texte" placeholder="entrer le prix" id="zonetext" name="txtprix" required/>
</br>
    <label><b>Photo :</b></label>
    <input type="file" placeholder="entrer votre photo" name="photo" id="zonetext" required>
    <input type="submit" name="btAdd" value="Mettre a Jour" id="submit" class="submit">
    <br/>
    <label style="text-align : center ; color : #960406 ;">
        <?php
        $mod=$_GET['mod'];
             $conn = mysqli_connect("localhost", "root", "root", "loccar");
            if(isset($_POST['btAdd'])){
                $prix=$_POST['txtprix'];
                $marque=$_POST['txtmarque'];
                $image=$_FILES['photo']['tmp_name'];
                $target="image/".$_FILES['photo']['name'];
                move_uploaded_file($image,$target);
                $reqAdd="update automobile set MARQUE='$marque' , PRIX_LOC='$prix' , PHOTO='$target' where IMM='$mod'";
                $resultat= mysqli_query($conn , $reqAdd);
                if($resultat)
                {
                    echo "Mise a jour de donnée validés";
                }
                else{
                    echo "Echec de modification des données";
                }
               

            }

        ?>

    </label>
    </form>
</div>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="nvcompte.css" />

</head>
<body>
    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        <p id="nomsite" data-text="Ajouter voiture">_______________________</p>
        <div id="formauto" >
        </div>
    </div>
        <a href="admin.php" ><img src="image\retour.png" width="50" height="50"></a>

    <div id="container" >
    <form action="" method="POST" id="formulaire" enctype="multipart/form-data" name="formAdd">
    <h1>Nouveau voiture </h1>
    <label><b>Matricule :</b></label>
    <input type="texte" placeholder="entrer la matricule" name="txtimm" required id="zonetext" require>
        <br/>
    <label><b>Marque    :</b></label>
    <input type="texte" placeholder="entrer la marque" name="txtmarque" required id="zonetext" require>
    <br/>
    <label><b>Prix location :</b></label>
    <input type="texte" placeholder="entrer le prix" id="zonetext" name="txtprix" required/>
</br>
    <label><b>Photo :</b></label>
    <input type="file" placeholder="entrer votre photo" name="photo" required id="zonetext" require>
    <input type="submit" name="btAdd" value="Ajouter" id="submit" class="submit">
    <br/>
    <label style="text-align : center ; color : #960406 ;">
        <?php
             $conn = mysqli_connect("localhost", "root", "root", "loccar");
            if(isset($_POST['btAdd'])){
                $imm=$_POST['txtimm'];
                $prix=$_POST['txtprix'];
                $marque=$_POST['txtmarque'];
                $image=$_FILES['photo']['tmp_name'];
                $target="image/".$_FILES['photo']['name'];
                move_uploaded_file($image,$target);
                $reqAdd="INSERT INTO automobile (IMM , MARQUE, PRIX_LOC, PHOTO) VALUES ('$imm', '$marque',  '$prix', '$target')";
                $resultat= mysqli_query($conn , $reqAdd);
                if($resultat)
                {
                    echo "Insert des données validés";
                }
                else{
                    echo "Echec d Insertion des données";
                }
               

            }

        ?>

    </label>
    </form>
</div>

</body>
</html>
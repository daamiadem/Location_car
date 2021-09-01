<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="nvcompte.css" />

</head>
<body>
    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        <p id="nomsite" data-text="Nouveau compte">_____________________</p>
        <div id="formauto" >
        </div>
    </div>
    <a href="login.php" ><img src="image\retour.png" width="50" height="50"></a>

    <div id="container">
    <form action="" method="POST" id="formulaire" enctype="multipart/form-data" name="formAdd">
    <h1>Nouveau compte </h1>
    <label><b>CIN :</b></label>
    <input type="texte" placeholder="entrer votre CIN" name="cin" required id="zonetext" require>
        <br/>
    <label><b>Nom d'utisateur :</b></label>
    <input type="texte" placeholder="entrer votre Nom d'utilisateur" name="txtlogin" required id="zonetext" require>
        <br/>
    <label><b>Mot de passe    :</b></label>
    <input type="password" placeholder="entrer votre Mot de Passe" name="txtpw" required id="zonetext" require>
    <br/>
    <label><b>Date de naissance :</b></label>
    <input type="date" id="zonetext" name="txtdn"/>
</br>
    <label><b>Numéro de téléphone :</b></label>
    <input type="texte" placeholder="entrer votre numero" name="txtn" required id="zonetext" require>
    <br/>
    <label><b>Adresse :</b></label>
    <input type="texte" placeholder="entrer votre adresse" name="txtadresse" required id="zonetext" require>
    <br/>
    <label><b>Photo :</b></label>
    <input type="file" placeholder="entrer votre photo" name="photo" required id="zonetext" require>
    <input type="submit" name="btAdd" value="Crée" id="submit" class="submit">
    <br/>
    <label style="text-align : center ; color : #960406 ;">
        <?php
             $conn = mysqli_connect("localhost", "root", "root", "loccar");
            if(isset($_POST['btAdd'])){
                $login=$_POST['txtlogin'];
                $cin=$_POST['cin'];
                $pw=$_POST['txtpw'];
                $datenaissance=date();
                $datenaissance=$_POST['txtdn'];
                $num=$_POST['txtn'];
                $adresse=$_POST['txtadresse'];
                $image=$_FILES['photo']['tmp_name'];
                $target="image/".$_FILES['photo']['name'];
                move_uploaded_file($image,$target);
                $reqAdd="INSERT INTO USER (login , mdp, myphoto, num, adresse, datedenaissance, cin) VALUES ('$login', '$pw',  '$target', '$num' , '$adresse', '$datenaissance','$cin')";
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
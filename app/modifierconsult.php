<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="nvcompte.css" />

</head>
<body>
    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        <p id="nomsite" data-text="Modifier demande">_____________________</p>
        <div id="formauto" >
        </div>
    </div>
    <a href="accueil.php" ><img src="image\retour.png" width="50" height="50"></a>
    <div id="container">
    <form action="" method="POST" id="formulaire" enctype="multipart/form-data" name="formAdd">
    <label><b>CIN :</b></label>
    <input type="texte" name="txtimm" id="zonetext" Value="<?php echo $_GET['modC'] ?>" >
        <br/>
    <label><b>Date de  debut :</b></label>
    <input type="date" id="zonetext" name="debut"/>
</br>
<label><b>Date fin :</b></label>
    <input type="date" id="zonetext" name="fin"/>
</br>
    <label><b>Numéro de téléphone :</b></label>
    <input type="texte" placeholder="entrer votre numero" name="txtn" required id="zonetext" require>
    <br/>
    <label><b>Adresse :</b></label>
    <input type="texte" placeholder="entrer votre adresse" name="txtadresse" required id="zonetext" require>
    <br/>
    <input type="submit" name="btAdd" value="Modifier" id="submit" class="submit">
    <br/>




    <label style="text-align : center ; color : #960406 ;">
        <?php
        $mod=$_GET['modC'];
        $conn = mysqli_connect("localhost", "root", "root", "loccar");
        $req="select * from automobile where IMM like '$mod'";
                $resultat= mysqli_query($conn , $req);
                $ligne = mysqli_fetch_assoc($resultat);
              
            if(isset($_POST['btAdd'])){

                
                $cin==$_POST['txtimm'];
                $debut=date();
                $fin=date();
                $debut=$_POST['debut'];
                $fin=$_POST['fin'];
                $firstDate  = new DateTime($debut);
                $secondDate = new DateTime($fin);

                $intvl = $firstDate->diff($secondDate);
                        $nbr= $intvl->days ;
                        $total=$nbr*$ligne['PRIX_LOC'];
                

                        $cin=$_POST['cin'];
                            $debut=date();
                            $fin=date();
                            $debut=$_POST['debut'];
                            $fin=$_POST['fin'];
                            $num=$_POST['txtn'];
                            $adresse=$_POST['txtadresse'];
                              
                            $reqAdd="update loc set date_debut='$debut' , date_fin='$fin', tel='$num', adresse='$adresse',  prixtotal='$total', nbrjours='$nbr' where matricule like '$mod'";
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
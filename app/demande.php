<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styleaccueil.css" />
<link rel="stylesheet" href="nvcompte.css" />
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
    <p id="nomsite" data-text="Demande de location">_______________________</p>
        <div id="formauto" >

        </div>
        
</div>
    <a href="accueil.php" ><img src="image\retour.png" width="50" height="50"></a>
<div id="glob" >
    <div id="auto" style="margin-left: 50px;">
             <?php
            $conn = mysqli_connect("localhost", "root", "root", "loccar"); 
            if (isset($_GET['demande']))
            {
                $demande=$_GET['demande'];
                $req="select * from automobile where IMM like '$demande'";
                $resultat= mysqli_query($conn , $req);
                $ligne = mysqli_fetch_assoc($resultat);
              
            }     

            ?>
            
                <img src="<?php echo $ligne['PHOTO']; ?>" width=200 height=200 margin=5px id="imageauto"  />
                <br>
                
                <b style="color:crimson;">MATRICULE :</b> <?php echo $ligne['IMM']; ?>
                 <br>
                 <b style="color:crimson;">MARQUE :</b> <?php echo $ligne['MARQUE']; ?> 
                <br >
                <b style="color:crimson;">PRIX LOCATION :</b> <?php echo $ligne['PRIX_LOC'];?>
                
            
    </div>



    <div id="container" >
            <form action="" method="POST" id="formulaire" enctype="multipart/form-data" name="formAdd">
    <h1>Demande de location </h1>
    
    <label><b>CIN :</b></label>
    <input type="texte" placeholder="entrer votre CIN" name="cin" required id="zonetext" require>
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
    <input type="submit" name="btAdd" value="Valider" id="submit" class="submit">
    <br/>
    <label style="text-align : center ; color : #960406 ;">
    <?php
    $debut=date();
    $fin=date();
    $debut=$_POST['debut'];
    $fin=$_POST['fin'];
    $firstDate  = new DateTime($debut);
    $secondDate = new DateTime($fin);
    $intvl = $firstDate->diff($secondDate);
            $nbr= $intvl->days ;
            $total=$nbr*$ligne['PRIX_LOC'];
            
            
                
    
             $conn = mysqli_connect("localhost", "root", "root", "loccar");
            if(isset($_POST['btAdd'])){
                $cin=$_POST['cin'];
                $debut=date();
                $fin=date();
                $debut=$_POST['debut'];
                $fin=$_POST['fin'];
                $num=$_POST['txtn'];
                $adresse=$_POST['txtadresse'];
                
                
                
                
                $reqAdd="INSERT INTO loc (CIN , date_debut, date_fin, tel, adresse, matricule, prixtotal, nbrjours) VALUES ('$cin', '$debut',  '$fin', '$num' , '$adresse','$demande',' $total','$nbr')";
                $resultat= mysqli_query($conn , $reqAdd);
                



                if($resultat)
                {
                    
                    

                }
                else{
                    echo "Echec d Insertion des données";
                }
               

            }

        ?>

    </label>
    </form>
    </div>
        <div style=" 
    border : 5px solid #f1f1f1;
    box-shadow: 0 0 20px 0 regb(0,0,0,0.2),0 5px 5px 0 regb(0,0,0,0.25)  ;
    text-align: center;
    background-color: lightgreen ;
        width: 400px;
        min-height: 200px;
        padding-left: 20px ;
        padding-right: 20px ;
        position: relative;
        padding-top: 20px;
        margin-left:35% ;
        margin-top: 20px;
        border-radius: 20px;
        font-style:italic;
        font-size: 20px;
        "
         >
                <?php
                    echo "Demande validés";
                    echo "<br>";
                    echo "Le date de debut de location est : ";
                    echo $debut;
                    echo "<br>";
                    echo "Le date de fin de location est : ";
                    echo $fin;
                    echo "<br>";
                    echo "Le nombre total de jours est : ";
                    echo $nbr;
                    echo "<br>";
                    echo "Votre prix total est : ";
                    echo $total ;
                    echo "<br>";
                    echo "Merci pour votre visite";
                ?>
        </div>
</div>

</body>
</html>






























  
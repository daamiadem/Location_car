
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">    
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        
    <a href="login.php" class="login" >Login</a>
    
        
        <p id="nomsite" data-text="Location car">__________________</p>
        <div id="formauto" >

            <form name="formauto" method="post" action="">
                <input id="motcle" type="text" name="motcle" placeholder="recherche par marque"  />
                <input id="btfind" type="submit" name="btsubmit" value="recherche" /> 
            </form>
        </div>
    </div>
    

    <div id="articles">
    <div class='test'>

</div>
    <?php
        $conn = mysqli_connect("localhost", "root", "root", "loccar"); 
        if(isset($_POST['btsubmit']))
{            $mc=$_POST['motcle']; 
            $reqSelect="select * from automobile where MARQUE like '%$mc%' ";
            
        }
        else{
            $reqSelect="select * from automobile";
           
        }

        $resultat= mysqli_query($conn , $reqSelect); 
       
      
        while ($ligne = mysqli_fetch_assoc($resultat))
         {
   ?>
            
            <div id="auto" class="auto">
                
                <img src="<?php echo $ligne['PHOTO']; ?>" width=200 height=200 margin=5px id="imageauto"  />
                <br>
                <div id=information>
                <b style="color:crimson;">MATRICULE :</b> <?php echo $ligne['IMM']; ?>
                 <br>
                 <b style="color:crimson;">MARQUE :</b> <?php echo $ligne['MARQUE']; ?> 
                <br >
                <b style="color:crimson;">PRIX LOCATION :</b> <?php echo $ligne['PRIX_LOC']; ?> 
         </div>
            </div>
    
        


    
<?php } ?>

    </div>

</style>
</body>
</html>

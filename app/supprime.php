
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html" charset="utf-8">    
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div id="entete">
    <img id="img_entete" src="vidcar.gif" >
        <p id="nomsite" data-text="Supprimer voiture">_____________________</p> 
    </div>

    <div id="container">
        <form name="formdelete" id="formulaire">
        <a href="admin.php" ><img src="image\retour.png" width="50" height="50"></a>
    <?php
    $conn = mysqli_connect("localhost", "root", "root", "loccar"); 
        if (isset($_GET['supcar']))
        {
            $sup=$_GET['supcar'];
            $reqdelete="delete from automobile where IMM='$sup'";
            $resultat= mysqli_query($conn , $reqdelete);
        }

        if ($resultat)
        {
            echo "<label style='text-align: center ; color : #960406 ; '> La suppression a été corrrectement effectuée...</label>";

        }
        else {
            echo "<label style='text-align: center ; color : #960406 ; '>La suppression a échouée... </label>";
        }
    ?>
    </form>
</div>
 
</body>
</html>

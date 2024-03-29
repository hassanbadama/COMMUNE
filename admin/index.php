<?php 
      require_once("connexio.php"); 
       session_start();
        if(empty( $_SESSION['NOM'])){
            header("location:admin.php"); 
        }       
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1> <a href="../index.php">ACCUEIL</a></h1>
    <div class="connexion">
       <?php echo "Bonjours ".$_SESSION['NOM']['nom'] ?>
    </div>
    <nav class="menu3">
     <div class="menu5">
           <ul>
                <li class="menu1"> <a href="affichehistoire.php">HISTOIRE</a></li>
                <li class="menu1"> <a href="affichepersonnel.php"> PERSONNEL</a></li>
                <li class="menu1"> <a href="affichemission.php"> MISSION</a></li>
                <li class="menu1"> <a href="afficheprojet.php">PROJET</a></li>
                <li class="menu1"> <a href="afficheactivite.php"> ACTIVITE</a></li>
                <li class="menu1"> <a href="afficheannonce.php">MARIAGE</a></li>
                <li class="menu1"> <a href="affichepublic.php">MARCHE PUBLIC</a></li>
                <li class="menu1"> <a href="affichedegre.php">DEGRE</a></li>
                <li class="menu1"> <a href="affichelieutourist.php">LIEU TOURISTIQUE</a></li>
                <li class="menu1"> <a href="affichespacepub.php"> SPACE PUB</a></li>
                <li class="menu1"> <a href="affichelogo.php"> LOGO</a></li>
            </ul>
     </div>
    </nav>
</body>
</html>
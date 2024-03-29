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
    <title>histoire</title>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<h1> <a href="../index.php">ACCUEIL</a></h1>
   <div class="connexion">  <?php echo "Bonjours ".$_SESSION['NOM']['nom'] ?>  </div>
    <section class="tete">
        <div class="menu">
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
        <div class="formulaire1">
            <form action="" method="POST" enctype="multipart/form-data" class="formulaire2">
                <label class="formulaire3" for="">TITRE</label> <br>
                <input type="text" name="histoire" class="formule3">
                <label class="formulaire3"  for="">DESCRIPTION</label> <br>
                <input type="text" name="description" id="" class="formule3">
                <label class="formulaire3"  for="">IMAGE</label> <br>
                <input type="file" name="imageh" class="formule3" placeholder="">
                <label class="formulaire3"  for=""> TEXT HISTOIRE</label> <br>
                <textarea class="formule4" placeholder=" texte" name="texte" id="" ></textarea >
                <input type="submit" name="HISTOIRE" value="Envoyer" id="" class="button">
            </form>

        </div>
    </section>
    
</body>
<script src="js/java1.js"></script>
</html>
<?php 
       if (isset($_POST['HISTOIRE'])) {

        $photoh = $_FILES['imageh']['name'];
        $fichierh = $_FILES['imageh']['tmp_name'];
        move_uploaded_file($fichierh,'./images/'.$photoh);

       	if (!empty($_POST['histoire']) AND !empty($_POST['description']) AND !empty($_POST['texte'])){
              require_once("connexio.php");
       				$req= $bdd->prepare("INSERT INTO histoire(titreh, descriptionh,imagefonth, texteh) VALUES(?,?,?,?)");
       				$req->execute(array($_POST['histoire'],$_POST['description'],$photoh,$_POST['texte']));
                    header("location:affichehistoire.php");

       	}
       	else{
       	  echo "veillez remplir";
       	}
       
       }
    ?>
   
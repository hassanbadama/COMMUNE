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
                <input type="text" name="projet1" class="formule3">
                <label class="formulaire3"  for="">DESCRIPTION</label> <br>
                <input type="text" name="projet2" id="" class="formule3">
                <label class="formulaire3"  for="">IMAGE</label> <br>
                <input type="file" name="projet3" class="formule3" placeholder="">
                <label class="formulaire3"  for=""> TEXTE</label> <br>
                <textarea class="formule4" placeholder=" texte" name="projet4" id="" ></textarea >
                <input type="submit" name="projet5" value="Envoyer" id="" class="button">
            </form>

        </div>
    </section>
    
</body>
</html>
<?php 
       if (isset($_POST['projet5'])) {

        $photoh = $_FILES['projet3']['name'];
        $fichierh = $_FILES['projet3']['tmp_name'];
        move_uploaded_file($fichierh,'./images/'.$photoh);

       	if (!empty($_POST['projet1']) AND !empty($_POST['projet2'])){
              require_once("connexio.php");
       		  $req= $bdd->prepare("INSERT INTO projet(titrepr, descriptionpr,imagefontpr, textepr) VALUES(?,?,?,?)");
       		  $req->execute(array($_POST['projet1'],$_POST['projet2'],$photoh,$_POST['projet4']));            
              header("location:afficheprojet.php");
       	}
       	else{
       	  echo "veillez remplir";
       	}
       
       }
    ?>
   
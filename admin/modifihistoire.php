<?php 
    require_once("connexio.php"); 
    session_start();
    if(empty( $_SESSION['NOM'])){
         header("location:admin.php");
   }       
 ?>
<?php 

     require_once("connexio.php");
     if(!empty($_GET['code'])){
        $req= $bdd->prepare("SELECT * FROM histoire WHERE codh=?");
        $req->execute(array($_GET['code']));
        $modif=$req->fetch(); 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logo</title>
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
            <form action="modifihistoire.php" method="POST" enctype="multipart/form-data" class="formulaire2" >
               <label class="formulaire3" for="">CODE</label>
                <input type="text" name="logo" class="formule3" value="<?php echo ($modif['codh']) ?>">
                <label class="formulaire3" for="">TITRE</label> <br>
                <input type="text" name="logo1" class="formule3" value="<?php echo ($modif['titreh']) ?>">
                <label class="formulaire3"  for="">DESCRIPTION</label> <br>
                <input type="text" name="logo2" id="" class="formule3" value="<?php echo ($modif['descriptionh']) ?>">
                <label class="formulaire3"  for=""> IMAGE</label> <br>
                <input type="file" name="logo3" class="formule3" >
                <img src="images/<?php echo ($modif['imagefonth']) ?>" alt="" width="60" height="60">
                <label class="formulaire3"  for="">TEXTE</label> <br>
                <textarea name="logo4" id="" class="formule3"><?php echo ($modif['texteh']) ?></textarea>
                <input type="submit" name="logo5" value="Envoyer" id="" class="button">
            </form>

        </div>
    </section>
    
</body>
</html>

<?php 
   require_once("connexio.php");
   
 }
    if (isset($_POST['logo5'])) {
        $photo1 = $_FILES['logo3']['name'];
        $fichier1 = $_FILES['logo3']['tmp_name'];
        move_uploaded_file($fichier1,'./images/'.$photo1);
       if($photo1 === ""){
          $req= $bdd->prepare("UPDATE histoire SET titreh=?, descriptionh=?, texteh=?  WHERE codh=?");
          $req->execute(array($_POST['logo1'],$_POST['logo2'],$_POST['logo4'],$_POST['logo']));
         header("location:affichehistoire.php");
        }
        else{
            $req= $bdd->prepare("UPDATE histoire SET titreh=?, descriptionh=?, imagefonth=?, texteh=?  WHERE codh=?");
            $req->execute(array($_POST['logo1'],$_POST['logo2'],$photo1,$_POST['logo4'],$_POST['logo']));
            header("location:affichehistoire.php");
        }

    }    
?>
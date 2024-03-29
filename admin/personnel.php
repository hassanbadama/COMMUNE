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
    <title>personnel</title>
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
            <a href="affichepersonnel.php"> VOIR LES PERSONNELS</a>
            <form action="" method="POST" enctype="multipart/form-data" class="formulaire2" id="mail">
                <label class="formulaire3" for="">NOM</label> <br>
                <input type="text" name="NOM" class="formule3" placeholder="nom">              
                <label class="formulaire3"  for="">PRENOM</label> <br>
                <input type="text" name="PRENOM" id="" class="formule3" placeholder="prenom">
                <label class="formulaire3" for="">FONCTION</label> <br>
                <select name="FONCTION" class="formul">
                    <option value="Personnel">Personnel</option>
                    <option value="Conseil Municipal">Conseil Municipal</option>
                    <option value="Maire">Maire</option>
                    <option value="Premier Adjoint">Premier Adjoint</option>
                    <option value="Deuxieme Adjoint">Deuxieme Adjoint</option>
                    <option value="Troisieme Adjoint">troisieme Adjoint</option>
                    <option value="Quatrieme Adjoint">Quatrieme Adjoint</option>
                </select>
                <label class="formulaire3" for="">LOGIN</label> <br>
                <input type="password" name="LOGIN" class="formule3" placeholder=" LOGIN">
                <label class="formulaire3" for="">ADRESSE MAIL</label> <br>
                <input type="text" name="MAIL" class="formule3" placeholder=" ADRESSE MAIL">
                <div id="mail1"></div>
                <label class="formulaire3" for="">MOT DE PASSE</label> <br>
                <input type="password" name="PASSE" class="formule3" placeholder=" MOT DE PASSE" id="mail2">
                <label for="" class="formulaire3">REGION</label>
                <select name="REGION" id="" class="formul" onchange="ajax(value)">
                <?php 
                 require_once("connexio.php");
                 $bss=$bdd->prepare("SELECT nom FROM regionp");
                 $bss->execute();
                 while ($nom=$bss->fetch()){?>  
                  <option value="<?php echo $nom['nom'];?>"><?php echo $nom['nom'];?></option><?php }?>
                </select>
                <p id="depart"></p>
                <p id="arrond"></p>
                <label class="formulaire3" for="">TEXTE</label>
                <textarea name="texte"></textarea>
                <label class="formulaire3" for="">PHOTO DE PERSONNEL</label> <br>
                <input type="file" name="photo" class="formule3" placeholder=" titre"> 
                <label class="formulaire3"  for="">CV</label> <br>
                <input type="file" name="cv" id="">
                <input type="submit" name="personnel" value="Envoyer" id="" class="button" class="mail3">
            </form>
        </div>
    </section>
    <script src="js/java1.js"></script>
</body>
</html>
  <?php if (isset($_POST['personnel'])) {
        $photo1 = $_FILES['photo']['name'];
        $fichier1 = $_FILES['photo']['tmp_name'];
        move_uploaded_file($fichier1,'./images/'.$photo1);
        $photo2 = $_FILES['cv']['name'];
        $fichier2 = $_FILES['cv']['tmp_name'];
        move_uploaded_file($fichier2,'./images/'.$photo2);
       	if (!empty($_POST['NOM']) AND !empty($_POST['PRENOM']) AND !empty($_POST['FONCTION']) AND !empty($_POST['LOGIN']) AND !empty($_POST['MAIL']) AND !empty($_POST['PASSE']) AND !empty($_POST['REGION']) AND !empty($_POST['DEPART']) AND !empty($_POST['ARROND'])){
              require_once("connexio.php");
              $req= $bdd->prepare("INSERT INTO personnel(nom, prenom, fonction, login, mail, passe, region, departement, arrondissement, texte, photo,cv) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
              $req->execute(array($_POST['NOM'],$_POST['PRENOM'],$_POST['FONCTION'],$_POST['LOGIN'],$_POST['MAIL'],$_POST['PASSE'],$_POST['REGION'],$_POST['DEPART'],$_POST['ARROND'],$_POST['texte'],$photo1,$photo2));
              header("location:affichepersonnel.php");
         	}
       	else{
       	  echo "veillez remplir";
       	}
       }
   
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
        $req= $bdd->prepare("SELECT * FROM personnel WHERE codep=?");
        $req->execute(array($_GET['code']));
        $donne=$req->fetch(); 
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
            <form action="modifipersonnel.php" method="POST" enctype="multipart/form-data" class="formulaire2">
                <label class="formulaire3" for="">CODE</label> <br>
                <input type="text" name="NOM1" class="formule3" value=" <?php echo ($donne['codep']) ?>">  
                <label class="formulaire3" for="">NOM</label> <br>
                <input type="text" name="NOM" class="formule3" placeholder=" titre" value=" <?php echo ($donne['nom']) ?>" >            
                <label class="formulaire3"  for="">PRENOM</label> <br>
                <input type="text" name="PRENOM" id="" class="formule3" placeholder=" description" value=" <?php echo ($donne['prenom']) ?>">
                <label class="formulaire3" for="">FONCTION</label> <br>
                <input type="text" name="FONCTION" id="" value="<?php echo ($donne['fonction']) ?>">
                <label class="formulaire3" for="">LOGIN</label> <br>
                <input type="password" name="LOGIN" class="formule3" placeholder=" LOGIN" value=" <?php echo ($donne['login']) ?>">
                <label class="formulaire3" for="">ADRESSE MAIL</label> <br>
                <input type="email" name="MAIL" class="formule3" placeholder=" ADRESSE MAIL"value=" <?php echo ($donne['mail']) ?>">
                <label class="formulaire3" for="">MOT DE PASSE</label> <br>
                <input type="password" name="PASSE" class="formule3" placeholder=" MOT DE PASSE" value=" <?php echo ($donne['passe']) ?>">
                <label for="" class="formulaire3">REGION</label>
                <input type="text" name="REGION" id="" class="formule3" value=" <?php echo ($donne['region']) ?>">
                <label for="" class="formulaire3">DEPARTEMENT</label>
                <input type="text" name="DEPART" id="" class="formule3" value=" <?php echo ($donne['departement']) ?>">
                <label for="" class="formulaire3">ARRODISSEMENT</label>
                <input type="text" name="ARROND" id="" class="formule3" value=" <?php echo ($donne['arrondissement']) ?>">
                <label for="" class="formulaire3">texte</label>
                <textarea name="texte" id="" class="formule3"><?php echo ($donne['texte']) ?></textarea>
                <label class="formulaire3"  for=""> PHOTO</label> <br>
                <input type="file" name="logo3" class="formule3">
                <img src="images/<?php echo ($donne['photo']) ?>" alt="" width="60" height="60">
                <label class="formulaire3"  for="">CV</label> <br>
                <input type="file" name="logo4" class="formule3">
                <img src="images/<?php echo ($donne['cv']) ?>" alt="" width="60" height="60">
                <input type="submit" name="personnel" value="Envoyer" id="" class="button">
            </form>
        </div>
    </section>
</body>
</html>
<?php 
     }
        require_once("connexio.php");
       if (isset($_POST['personnel'])) {
        if(empty($_FILES['logo3']['name']) AND empty($_FILES['logo4']['name'])){
           $req= $bdd->prepare("UPDATE personnel SET nom=?, prenom=?, fonction=?, login=?, mail=?, passe=?, region=?, departement=?, arrondissement=?, texte=? WHERE codep=?");
           $req->execute(array($_POST['NOM'],$_POST['PRENOM'],$_POST['FONCTION'],$_POST['LOGIN'],$_POST['MAIL'],$_POST['PASSE'],$_POST['REGION'],$_POST['DEPART'],$_POST['ARROND'],$_POST['texte'],$_POST['NOM1']));
           header("location:affichepersonnel.php");
        }
        else if(empty($_FILES['logo3']['name'])){
            $photo2 = $_FILES['logo4']['name'];
            $fichier2 = $_FILES['logo4']['tmp_name'];
            move_uploaded_file($fichier2,'./images/'.$photo2);
           $req= $bdd->prepare("UPDATE personnel SET nom=?, prenom=?, fonction=?, login=?, mail=?, passe=?, region=?, departement=?, arrondissement=?, texte=?, cv=? WHERE codep=?");
           $req->execute(array($_POST['NOM'],$_POST['PRENOM'],$_POST['FONCTION'],$_POST['LOGIN'],$_POST['MAIL'],$_POST['PASSE'],$_POST['REGION'],$_POST['DEPART'],$_POST['ARROND'],$_POST['texte'],$photo2,$_POST['NOM1']));
           header("location:affichepersonnel.php");
          }
          else if(empty($_FILES['logo4']['name'])){
            $photo1 = $_FILES['logo3']['name'];
            $fichier1 = $_FILES['logo3']['tmp_name'];
            move_uploaded_file($fichier1,'./images/'.$photo1);
            $req= $bdd->prepare("UPDATE personnel SET nom=?, prenom=?, fonction=?, login=?, mail=?, passe=?, region=?, departement=?, arrondissement=?,texte=?, photo=? WHERE codep=?");
           $req->execute(array($_POST['NOM'],$_POST['PRENOM'],$_POST['FONCTION'],$_POST['LOGIN'],$_POST['MAIL'],$_POST['PASSE'],$_POST['REGION'],$_POST['DEPART'],$_POST['ARROND'],$_POST['texte'],$photo1,$_POST['NOM1']));
           header("location:affichepersonnel.php");    
        }
         else{
            $photo1 = $_FILES['logo3']['name'];
            $fichier1 = $_FILES['logo3']['tmp_name'];
            move_uploaded_file($fichier1,'./images/'.$photo1);
            $photo2 = $_FILES['logo4']['name'];
            $fichier2 = $_FILES['logo4']['tmp_name'];
            move_uploaded_file($fichier2,'./images/'.$photo2);
            $req= $bdd->prepare("UPDATE personnel SET nom=?, prenom=?, fonction=?, login=?, mail=?, passe=?, region=?, departement=?, arrondissement=?,texte=?, photo=?, cv=? WHERE codep=?");
            $req->execute(array($_POST['NOM'],$_POST['PRENOM'],$_POST['FONCTION'],$_POST['LOGIN'],$_POST['MAIL'],$_POST['PASSE'],$_POST['REGION'],$_POST['DEPART'],$_POST['ARROND'],$_POST['texte'],$photo1,$photo2,$_POST['NOM1']));
            header("location:affichepersonnel.php");
         }
       }
    ?>
   
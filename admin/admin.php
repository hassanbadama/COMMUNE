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
  <div class="form4">
    <div class="form3">
      <form action="" method="POST" class="form1">
        <label for="" class="form2">NOM UTLISATEUR</label>
        <input type="text" name="nom1" class="form5">
        <label for="" class="form2">MOT DE PASSE</label>
        <input type="password" name="nom2" class="form5"> <br> <br>
        <input type="submit" value="ENVOYE" name="nom3">
      </form>
    </div>
 </div>
</body>
</html>

<?php 
       if (isset($_POST['nom3'])) {
       	if (!empty($_POST['nom1']) AND !empty($_POST['nom2'])){
              require_once("connexio.php");      
       				$req= $bdd->prepare("SELECT * FROM admin WHERE nom=? AND passe=?");
       				$req->execute(array($_POST['nom1'],$_POST['nom2']));
               if($existe=$req->fetch()){
                 session_start();
                 $_SESSION['NOM']=$existe;
                 header("location:index.php");
               }
               else{
                header("location:admin.php");
               }
                  
       	}
       	else{
       	  echo "veillez remplir";
       	}
       
       }
    ?>
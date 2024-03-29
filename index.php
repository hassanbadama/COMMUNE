<?php 
    require_once("connexio.php"); 
    $reponse=$bdd->query("SELECT * FROM logo");
  	$donne=$reponse->fetch();       
 ?>    
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>site pour commune</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <header>
   <div class="logo">
     <img src="admin/images/<?php echo $donne["logo"]?>" width="60" height="60">
    <div class="LOGO1">
       <p> <?php echo $donne["titrel"]?></p>
    </div>
   </div>
   <nav id="l">
    <ul id="menu">
      <li><a href="index.php"> ACCUEIL</a></li>
      <li><a href="projet.php"> PROJET</a></li>
      <li><a href="activite.php"> ACTIVITES </a></li>
      <li><a href="lieutouristique.php"> LIEUX TOURISTIQUE </a></li>
      <li><a href=""> SPACE PUB </a></li>
   </ul>
       <div id="men">
        <span><a href="">PRESENTATION</a></li> </span>
        <div id="sous">
          <span>  <a href="histoire.php">HISTOIRE DE MAIRIE</a></span>
          <span>  <a href="personnel.php">CONSEIL MUNICIPAL</a></span>
          <span>  <a href="personnel.php">PERSONNEL</a></span>
          <span>  <a href="mission.php">MISSION</a></span>
        </div>
      </div>
     <div id="men">
        <span><a href="">ANNONCES</a></li> </span>
        <div id="sous">
          <span>  <a href="mariage.php">MARIAGES</a></span>
          <span>  <a href="degre.php">DEGRE</a></span>
          <span>  <a href="marchepublic.php">MARCHE PUBLIC</a></span>
        </div>
      </div>     
   </nav>
 </header>
 <section id="image1" >
  <img src="admin/images/<?php echo $donne["imagefont"]?>" width="100%" height="400px">
 </section>
 <section>
   <h3>
     <?php echo $donne["descriptionl"]?>  <?php echo $donne["titrel"]?>
   </h3>
 </section>
<h5 class="compteur">  <?php require_once("visite.php"); ?></h5>
 <section id="annonce">
   <h2 > <a class="lesmari" href="">ANNONCES DES MARIAGES</a> </h2>
   <ul class="mariages"> 
   <?php $reponse=$bdd->query("SELECT * FROM annonce"); ?>
  	<?php while ($donne=$reponse->fetch()) { ?>
     <li class="mariage">
       <a href="mariage.php">
        <img src="admin/images/<?php echo $donne["image"]?> " alt="" class="mari"> 
        <center> <h4> <?php echo $donne["nomh"]?> & <?php echo $donne["nomf"]?></h4> 
       <span class="marie"><?php echo $donne["description"]?> <a href="mariage.php"> <br> plus info..</a> </span>  
        </center>
       </a>
     </li>
    <?php } ?>
    </ul>
 </section>
 <?php $reponse=$bdd->query("SELECT * FROM histoire"); ?>
 <?php while ($donne=$reponse->fetch()) { ?>
  <section class="histoire" style="background: url(admin/images/<?php echo $donne["imagefonth"]?>) center;"> 
   <div class="elementhistoire">
   <h2 class="his"> <?php echo $donne["titreh"]?> </h2> 
    <p class="his"> <?php echo $donne["descriptionh"]?></p>
      <a class="his" href=""> plus infos...</a>
      <?php } ?>
   </div>
 </section>
 <section id="annonce">
   <ul class="mariages"> 
   <?php 
          $reponse=$bdd->prepare("SELECT * FROM personnel WHERE fonction=? OR fonction=? OR fonction=? OR fonction=? OR fonction=?"); ?>
          <?php $reponse->execute(array("Maire","Premier Adjoint","Deuxieme Adjoint","Troisieme Adjoint","Quatrieme Adjoint")) ?>
  	<?php while ($donne=$reponse->fetch()) { ?>
     <li class="mariage"> <a href="personnel.php">
       <img src="admin/images/<?php echo $donne["photo"]?> " alt="" class="mari"> 
       <center> <h4> <?php echo $donne["nom"]?> <?php echo $donne["prenom"]?></h4> 
       <p class="marie"> <?php echo $donne["fonction"]?> <a href="personnel.php"> <br> plus info..</a> </p> 
      </center>
      </a>
     </li>
    <?php } ?>
    </ul>
 </section>
 <section class="projet">
   <h3>PROJETS</h3>
   <div class="projet1">
     <ul class="projet2">
     <?php 
          $reponse=$bdd->prepare("SELECT * FROM projet"); ?>
          <?php $reponse->execute(array()) ?>
  	<?php while ($donne=$reponse->fetch()) { ?>
       <li class="projet3"><a href="projet.php">
       <img src="admin/images/<?php echo $donne["imagefontpr"]?> " alt="" class="mari"> 
       </a>
       <p><?php echo $donne["descriptionpr"]?></h4> </p>
      </li>
      <?php } ?>
     </ul>
   </div>
 </section>
 <footer class="parti">
 <?php 
    require_once("connexio.php"); 
    $reponse=$bdd->query("SELECT * FROM logo");
  	$donne=$reponse->fetch();   
    $reponse=$bdd->prepare("SELECT * FROM personnel WHERE fonction=?"); ?>
       <?php $reponse->execute(array("Maire")) ?>
  	<?php $don=$reponse->fetch() ?>    
  <div class="parti1">
    <div class="pied">
     <p >
     <div class="pied1">
     <h5> ARRONDISSEMENT <?php echo $donne["titrel"]?> </h5>  <br>
      <?php echo $donne["titrel"]?> compte près de 400 000 <br> <br> 
       habitants répartis <br> <br>
       dans les cantons Akwa, Bell et Deido <br> <br>
       <?php echo $don["nom"]?> <?php echo $don["prenom"]?> <br> <br>
       Le Maire <?php echo $donne["titrel"]?>
     </div>
     </p>
    </div>
    <div class="pied">
     <div class="pied1">
     <h5>LIENS UTILES</h5>
       <a class="pied2" href="index.php"> <?php echo $donne["titrel"]?></a> <br> <br>
       <a class="pied2" href="projet.php.">PROJET</a> <br> <br>
       <a class="pied2" href="mariage.php">MARIAGES</a> <br> <br>
       <a class="pied2" href="degre.php">DEGRE</a> <br> <br> 
       <a class="pied2" href="marchepublic.php">MARCHE PUBLIC</a> <br> <br>
       <a class="pied2" href="">Contact</a>
     </div>
   </div>
  </div>
 </footer>
</body>
</html>
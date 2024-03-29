<?php 
    require_once("connexio.php"); 
    $reponse=$bdd->query("SELECT * FROM logo");
  	$donne=$reponse->fetch();       
 ?>    
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>degrer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bodyplein">

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
      <li><a href="liutouristique.php"> LIEUX TOURISTIQUE </a></li>
      <li><a href="spacepub.php"> SPACE PUB </a></li>
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
 <section class="enteteh">
 <?php $reponse=$bdd->query("SELECT * FROM degre"); ?>
  	<?php while ($donne=$reponse->fetch()) { ?> <br> <br>
        <h1 class="titremariage"><?php echo $donne["titred"]?></h1>
         <?php echo $donne["texted"]?>
         <?php if($donne["imaged"]){ ?>
            <img src="admin/images/<?php echo $donne["imaged"]?> " alt="" width="800px" height="300px" class="imagemariage"> <br> <br>
          <?php } ?>
     <?php } ?>
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
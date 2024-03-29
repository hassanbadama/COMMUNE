
<?php 
    require_once("connexio.php"); 
    session_start();
    if(empty( $_SESSION['NOM'])){
         header("location:admin.php");
   }       
 ?>	
<?php  
  if(!empty($_GET['code'])){
	 $supp=$bdd->prepare("DELETE FROM lieutourist WHERE codt=?");    
	 $supp->execute(array($_GET['code']));
			//header("location:affichelogo.php");
		}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mission</title>
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
 <div class="formulai">
     
<table>
 <h3 class="lien"> <a href="lieutouristique.php">ajouter</a></h3>
   	<tr class="tab">
         <td>code</td>
         <td>TITRE LIEU TOURISTIQUE</td>
         <td>DESCRIPTION LIEU TOURISTIQUE</td>
         <td>IMAGE LIEU TOURISTIQUE</td>  
         <td>TEXTE LIEU TOURISTIQUE</td>                  		
        <td>MODIFIER</td>
    	<td>SUPPRIMER</td>
	</tr>
 	<?php $reponse=$bdd->query("SELECT * FROM lieutourist"); ?>
 	<?php while ($donne=$reponse->fetch()) { ?> 
	<tr>
        <td> <?php echo ($donne['codt']) ?> </td>
        <td> <?php echo ($donne['titre']) ?> </td>
        <td> <?php echo ($donne['descriptiont']) ?> </td>
        <td> <img src="images/<?php echo ($donne['imaget']) ?>" alt="" width="60" height="60">  </td>
        <td> <?php echo ($donne['texte']) ?> </td>                           
        <td> <a href="modifilieutourist.php?code=<?php echo ($donne['codt'])?>">modifier</a> </td>
    	<td> <a href="affichelieutourist.php?code=<?php echo ($donne['codt'])?>">supprimer</a> </td> 
	</tr>
    <?php } ?>
 </table>
 </div>
</section>
</body>
</html>


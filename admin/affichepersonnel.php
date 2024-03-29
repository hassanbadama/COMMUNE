<?php 
    require_once("connexio.php"); 
    session_start();
    if(empty( $_SESSION['NOM'])){
         header("location:admin.php");
   }       
  if(!empty($_GET['code'])){
	   $supp=$bdd->prepare("DELETE FROM personnel WHERE codep=?");    
       $supp->execute(array($_GET['code']));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>affiche persinnel</title>
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
 <div >
  <table> 
    	<h3 class="lien"> <a href="personnel.php">ajouter</a></h3>
		<h2>LES PERSONNEL</h2>
        <tr class="tab">
			<td>CODE</td>
			<td>NOM</td>
			<td>PRENOM</td>
			<td>FONCTION</td>
			<td>LOGIN</td>
			<td>EMAIL</td>
			<td>MOT DE PASSE</td>
			<td>REGION</td>
			<td>DEPARTEMENT</td>
			<td>ARRONDISSEMENT</td>
			<td>TEXTE</td>
			<td>PHOTO</td>
			<td>CV</td>
			<td>modifier</td>
			<td>supprimer</td>
    	</tr>
			<?php $reponse=$bdd->query("SELECT * FROM personnel"); 
			$don=$reponse->fetch();
			?>
      	<?php while ($don1=$reponse->fetch()) { ?>
 		<tr>		
	    	<td> <?php echo ($don1['codep']) ?> </td>
        	<td> <?php echo ($don1['nom']) ?> </td>
            <td> <?php echo ($don1['prenom']) ?> </td>
        	<td> <?php echo ($don1['fonction'] ) ?> </td>
            <td> <?php echo ($don1['login']) ?> </td>
            <td> <?php echo ($don1['mail']) ?> </td>
            <td> <?php echo ($don1['passe']) ?> </td>
        	<td> <?php echo ($don1['region']) ?> </td>
            <td> <?php echo ($don1['departement']) ?> </td>
        	<td> <?php echo ($don1['arrondissement']) ?> </td>
			<td> <?php echo ($don1['texte']) ?> </td>
			<td> <img src="images/<?php echo ($don1['photo']) ?>" alt="" width="60" height="60">  </td>
            <td> <img src="images/<?php echo ($don1['cv']) ?> " alt="" width="60" height="60"> </td>
        	<td> <a href="modifipersonnel.php?code=<?php echo ($don1['codep'])?>">modifier</a> </td>
        	<td> <a href="affichepersonnel.php?code=<?php echo ($don1['codep'])?>">supprimer</a> </td>
      </tr>			
 <?php } ?>
</table>
	<table> 
    	<h3 class="lien"> <a href="personnel.php">ajouter</a></h3>
		<h2>LE MAIRE </h2>
        <tr class="tab"> 
		    <td>CODE</td>
			<td>NOM</td>
			<td>PRENOM</td>
			<td>FONCTION</td>
			<td>LOGIN</td>
			<td>EMAIL</td>
			<td>MOT DE PASSE</td>
			<td>REGION</td>
			<td>DEPARTEMENT</td>
			<td>ARRONDISSEMENT</td>
			<td>TEXTE</td>
			<td>PHOTO</td>
			<td>CV</td>
			<td>modifier</td>
			<td>supprimer</td>
    	</tr>
        <?php 
			$repon=$bdd->prepare("SELECT * FROM personnel WHERE fonction=? OR fonction=? OR fonction=? OR fonction=? OR fonction=?"); 
		    $repon->execute(array("Maire","Premier Adjoint","Deuxieme Adjoint","Troisieme Adjoint","Quatrieme Adjoint"));
		?>
      	<?php while ($don2=$repon->fetch()) { ?>
 		<tr>		
	    	<td> <?php echo ($don2['codep']) ?> </td>          
        	<td> <?php echo ($don2['nom']) ?> </td>
            <td> <?php echo ($don2['prenom']) ?> </td>
        	<td> <?php echo ($don2['fonction']) ?> </td>
            <td> <?php echo ($don2['login']) ?> </td>
            <td> <?php echo ($don2['mail']) ?> </td>
            <td> <?php echo ($don2['passe']) ?> </td>
        	<td> <?php echo ($don2['region']) ?> </td>
            <td> <?php echo ($don2['departement']) ?> </td>
        	<td> <?php echo ($don2['arrondissement']) ?> </td>
			<td> <?php echo ($don2['texte']) ?> </td>
			<td> <img src="images/<?php echo ($don2['photo']) ?>" alt="" width="60" height="60">  </td>
            <td> <img src="images/<?php echo ($don2['cv']) ?> " alt="" width="60" height="60"> </td>
        	<td> <a href="modifipersonnel.php?code=<?php echo ($don2['codep'])?>">modifier</a> </td>
        	<td> <a href="affichepersonnel.php?code=<?php echo ($don2['codep'])?>">supprimer</a> </td>
      </tr>			
 <?php } ?>
</table>
<table>
    	<h3 class="lien" > <a href="personnel.php">ajouter</a></h3>
		<h2>LES CONSEILS MUNICIPAL</h2>
        <tr class="tab">
		    <td>CODE</td>
			<td>NOM</td>
			<td>PRENOM</td>
			<td>FONCTION</td>
			<td>LOGIN</td>
			<td>EMAIL</td>
			<td>MOT DE PASSE</td>
			<td>REGION</td>
			<td>DEPARTEMENT</td>
			<td>ARRONDISSEMENT</td>
			<td>TEXTE</td>
			<td>PHOTO</td>
			<td>CV</td>
			<td>modifier</td>
			<td>supprimer</td>
    	</tr>
		<?php $nom = "Conseil Municipal";
			$reponse=$bdd->prepare("SELECT * FROM personnel WHERE fonction=?"); 
		    $reponse->execute(array($nom)); ?>
      	<?php while ($don3=$reponse->fetch()) { ?>
 		<tr>		
	    	<td> <?php echo ($don3['codep']) ?> </td>         
        	<td> <?php echo ($don3['nom']) ?> </td>
            <td> <?php echo ($don3['prenom']) ?> </td>
        	<td> <?php echo ($don3['fonction']) ?> </td>
            <td> <?php echo ($don3['login']) ?> </td>
            <td> <?php echo ($don3['mail']) ?> </td>
            <td> <?php echo ($don3['passe']) ?> </td>
        	<td> <?php echo ($don3['region']) ?> </td>
            <td> <?php echo ($don3['departement']) ?> </td>
        	<td> <?php echo ($don3['arrondissement']) ?> </td>
			<td> <?php echo ($don3['texte']) ?> </td>
            <td> <img src="images/<?php echo ($don3['photo']) ?>" alt="" width="60" height="60">  </td>
            <td> <img src="images/<?php echo ($don3['cv']) ?> " alt="" width="60" height="60"> </td>
        	<td> <a href="modifipersonnel.php?code=<?php echo ($don3['codep'])?>">modifier</a> </td>
        	<td> <a href="affichepersonnel.php?code=<?php echo ($don3['codep'])?>">supprimer</a> </td>
      </tr>			
 <?php } ?>
</table>
</div>
</section>
</body>
</html>
                 
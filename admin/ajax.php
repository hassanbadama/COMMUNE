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
<?php $p=$_GET['nom'];?>
  <label for="" class="formulaire3">DEPARTEMENT</label> <br> <br>
  <select name="DEPART"  class="formul" id="sel" onchange="ajax1(value)"> <?php 
        require_once("connexio.php");
		$bs=$bdd->prepare("SELECT * FROM departement WHERE nomr=?");
		$bs->execute(array($p));
		 while ($code=$bs->fetch()) { ?> 
	   <option value="<?php echo $code['nomd']; ?>"> <?php echo $code['nomd'];?> </option>
	 <?php }?> 
 </select> <br>
 </body>
</html>

    	   
    	
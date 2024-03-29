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
<?php $p=$_GET['nom'];?> <label for="" class="formulaire3">ARRODISSEMENT</label> <br> <br>
    <select name="ARROND"  class="formul" id="sel">
	<?php 
        require_once("connexio.php");
	    $bs=$bdd->prepare("SELECT * FROM arrondissement WHERE nomdp=?");
		 $bs->execute(array($p));
		 while ($code=$bs->fetch()){ ?>	
			<option value="<?php echo $code['noma']; ?>"> <?php echo $code['noma']; ?> </option>    
		 <?php } ?>
   </select> <br>
 </body>
</html>

    	   
    	
<?php 
       $fichier = fopen("compte.txt", "c+");
       $compteur = intval(fgets($fichier));
       $compteur++;
       fseek($fichier,0);
       fputs($fichier, $compteur);
       fclose($fichier);
       echo $compteur ;
 ?>

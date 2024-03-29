<?php

    try{
         $bdd = new PDO("mysql:host=localhost; dbname=commune", "root", "");

       	}
    catch(Exception $e){
       die("ERREUR:". $e->getMessage());
      } 
 ?>
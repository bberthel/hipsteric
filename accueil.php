<?php

// Debut de session
session_start();

require 'conf/top.php';

// Connexion a la base de donnees
connectDb();

// Si l'utilisateur est deconnecte : fermeture de la session
if( isset($_GET['deco']) && $_GET['deco'] == 1){
		session_destroy();
}

// Si il y a inscription et si le password est bon : affiche 'inscription réussie'
// Sinon : affiche 'Erreur lors de l'inscription'
if(isset($_POST['submit_inscription'])){
	if($_POST['password'] == $_POST['password_conf']){
		if(insertUser($_POST['name'],$_POST['password']))
			echo 'inscription réussie';
		else echo 'inscription pas réussie';
	}else echo 'Erreur lors de l\'inscription';
}
?>

<html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<link rel="stylesheet" type="text/css" href="media/css/style.css">
        <link rel="shortcut icon" href="images/structured/favicon.png" type="image/x-icon" /> 
		<title>Hipsteric</title>
        <meta name="Description" content="Site de vente swag, pour une élite à moustache et rouge à lèvre.">
		<meta name="Keywords" content="hipster swag moustache stachmou vente vêtements t-shirt lunette bijoux accessoire high tech appareil photo">
    </head>
    
    <body>
    
        <div id="all">

		</div>
        
        <div id="fond_footer">
        
        	<div id="footer">
            
            	<div id="corps_footer">
                
                    <div id="footer_left">
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php"> Hipsteric.com </a>
                    </div>
                    
                    <div id="footer_right">
                        <p>Retrouvez nous sur les réseaux sociaux :</p>
                        <a href=""><img src="images/structured/facebook.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/twitter.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/you_tube.png" alt="Facebook"></a>
                    </div>
                    
                    <div id="clear"></div>
                    
                </div>
                
            </div>
            
        </div>
        
    </body>
</html>
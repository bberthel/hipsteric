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

// Si connexion reussie : ouverture de session pour l'id de l'utilisateur et chargement de la page search_twig.php
// Sinon : affiche 'Erreur d'identification'
if(isset($_POST['submit_login'])){
	$id = getUserIdAtLogin($_POST['name'], $_POST['password']);
	if($id){
		$_SESSION['id_user'] = $id;
		header('Location: search_twig.php');
	}
	else echo 'Erreur d\'identification';
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
        
            <div id="logo_tall">
                <img src="images/structured/logo_tall.png" width="411" height="182" alt="Hipsteric">
            </div>

            <p>Bienvenue sur votre site d'hipsters trop swag !</p>
            
            <div id="form">
                <form method="post" action="">
                	<div class="form_champs">
                    	<span>Adresse :</span><input type="text" name="adresse" />
                    </div>
                    <div class="form_champs">
                        <span>Mot de passe :</span><input type="password" name="password" />
                    </div>
                    <div class="submit">
                        <input id="connexion" type="submit" src="images/structured/bouton_connexion.png" alt="submit" name="submit" />
                	</div>
                </form>
            </div>
            
            <div id="clear"></div>

            <p>Pas encore membre ? <a href="inscription.php">Inscription</a></p>
           
		</div>
        
        <div id="fond_footer">
        	<div id="footer">
            	<div id="corps_footer">
                
                   <div class="footer_section">
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php"> Hipsteric.com </a>
                        <span>Retrouvez nous sur les réseaux sociaux :</span>
                        <a href=""><img src="images/structured/facebook.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/twitter.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/you_tube.png" alt="Facebook"></a>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>
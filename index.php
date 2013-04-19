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
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
    </head>
    
    <body>
    
        <div id="all">
        
            <div id="logo_tall">
                <img src="images/structured/logo_tall.png" width="411" height="182" alt="Hipsteric">
            </div>

            <p>Bienvenue sur votre site d'hipsters trop swag !</p>
            <br>
            <div id="form">
                <form method="post" action="">
                    <div id="form_left">
                        <p>Adresse :</p>
                            <input type="text" name="adresse" />
                    </div>
                    <div id="form_right">
                        <p>Mot de passe :</p>
                            <input type="password" name="password" />
                    </div>
                    <div id="clear"></div>
                    <input type="image" src="images/structured/bouton_connexion.png" alt="submit" name="submit" />
                </form>
            </div>
            <br>
            <p>Pas encore membre ? <a href="inscription.php">Inscription</a></p>
           
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
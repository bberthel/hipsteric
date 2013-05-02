<?php

// Debut de session
session_start();

require 'conf/top.php';
require 'lib/user.php';


// Connexion a la base de donnees
connectDb();

if( isset($_GET['deco']) && $_GET['deco'] == 1){
        session_destroy();
}

if(isset($_POST['submit'])){

    var_dump($_POST);
    if($_POST['password'] == $_POST['password_confirmation']){

        if(insertUser($_POST['name'],$_POST['firstname'],$_POST['mail'],$_POST['password'],$_POST['tel'],$_POST['number'],$_POST['adress'],$_POST['postal_code'],$_POST['city'])){
            echo 'inscription réussie';
        }
        else echo 'inscription pas réussie';
    }else echo 'bouh mauvais password conf';
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
            <div id="header">
                
                <div class="link">
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php $nb_produit_panier ?>)</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/connexion.php">Connexion</a></span>
                </div>
                
                <div id="clear"></div>
                
                <div class="search">
                	<form id="search" name="search" method="post" action="">
                        <input name="search" type="text" id="search" />
                        <input id="rechercher" type="submit" src="images/structured/loupe.png" alt="submit" name="submit" />
                    </form>
                </div>
            </div>
            
            <div id="menu">
            	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php"><img src="images/structured/moustache_home.png"></a></span>
            	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes.php">Lunettes</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/chapeaux.php">Chapeaux</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accessoires.php">Accessoires</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/high-tech.php">High Tech</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/bijoux.php">Bijoux</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/divers.php">Divers</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/packs.php">Packs</a></span>
            </div>
            
            <div id="content">
            
            	<div class="page_contact">Vous &ecirc;tes sur le point de d&eacute;couvrir la swagitude supr&ecirc;me. <br>
           		Remplissez ce formulaire et atteignez l'orgasme moustachique !</div>
            
            	<div class="separateur_moustache"></div>
            	
                <div id="form">
                    <form method="post" action="">
                        <div class="form_champs">
                            <span>Nom :</span><input type="text" name="name" />
                        </div>
                        <div class="form_champs">
                            <span>Pr&eacute;nom :</span><input type="text" name="surname" />
                        </div>
                        <div class="form_champs">
                            <span>Mail :</span><input type="email" name="mail" />
                        </div>
                        <div class="form_champs">
                            <span>Mot de passe :</span><input type="password" name="password" />
                        </div>
                        <div class="form_champs">
                            <span>Confirmation :</span><input type="password" name="password_confirmation" />
                        </div>
                        <div class="form_champs">
                            <span>T&eacute;l&eacute;phone :</span><input type="tel" name="tel" />
                            <br>
                        </div>
                        <div class="form_champs">
                            <span>N&deg; :</span><input type="text" name="number" />
                        </div>
                        <div class="form_champs">
                            <span>Nom :</span><input type="text" name="adress" />
                        </div>
                        <div class="form_champs">
                            <span>Code postal :</span><input type="text" name="postal_code" />
                        </div>
                        <div class="form_champs">
                            <span>Ville :</span> <input type="text" name="city" />
                        </div>
                        <div class="submit">
                            <input id="inscription" type="submit" src="images/structured/bouton_inscription.png" alt="submit" name="submit" />
                        </div>
                    </form>
                </div>
                
            </div>

		</div>
        
        <div id="fond_footer">
        	<div id="footer">
            	<div id="corps_footer">
                
                    <div class="footer_section">
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php"> Hipsteric.com </a>
                        <span>Retrouvez nous sur les réseaux sociaux :</span>
                        <a href=""><img src="images/structured/facebook.png" title="Facebook" target="_blank"></a>
                        <a href=""><img src="images/structured/twitter.png" title="Twitter" target="_blank"></a>
                        <a href="http://youtu.be/1yPfmRoSfpA"><img src="images/structured/you_tube.png" title="YouTube" target="_blank"></a>
                    </div>
                    
                    <div class="footer_section">
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/inscription.php">Inscription</a></span>
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes.php">Lunettes</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/chapeaux.php">Chapeaux</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accessoirs.php">Accessoires</a></span>
                    </div>
                    
                    <div class="footer_section">
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/high-tech.php">High Tech</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/bijoux.php">Bijoux</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/divers.php">Divers</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/packs.php">Packs</a></span>
                    </div>
                    
                    <div class="footer_section">
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php $nb_produit_panier ?>)</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/connexion.php">Connexion</a></span>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>
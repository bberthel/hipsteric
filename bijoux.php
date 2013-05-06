<?php


// Debut de session
session_start();
require 'conf/top.php';
require 'lib/user.php';
require 'lib/commande.php';

require 'lib/article.php';



connectDb();

?>

<html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<link rel="stylesheet" type="text/css" href="media/css/style.css">
        <link rel="shortcut icon" href="images/structured/favicon.png" type="image/x-icon" /> 
		<title>Hipsteric</title>
        <meta name="Description" content="Site de vente swag, pour une élite à moustache et rouge à lèvre.">
		<meta name="Keywords" content="hipster swag moustache stachmou vente vêtements t-shirt lunette bijoux accessoire high tech appareil photo">
        
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
        <script type="text/javascript" src="media/top/hautpage-seomix.js"></script>
        
    </head>
    
    <body>
    
        <div id="all">

            <div id="header">
                
                <div class="link">
                    <span>Bonjour <?php echo $_SESSION['prenom_user'] ?></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php echo $_SESSION['nombres_articles'] ?>)</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php">Déconnexion</a></span>
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
            	<div class="categorie">Bijoux<img src="images/structured/moustache.png"></div>
                    <?php
                    $result = getItemsByCat(5);
                    $results = array();
                     while( $ligne = mysql_fetch_assoc($result) )
                    {
                        $results[]=$ligne;

                     } 
                    foreach ($results as $key => $value) {
                     echo"
                    <div class=\"produit\">
                         <a href=\"\"> <img src=\"".$value["photo_article"]."\" title=\"Lunettes : Pixels\" ></a>
                         <span class=\"nom_produit\">".$value["nom_article"] ."</span>
                         <span class=\"prix_produit\">".$value["prix_article"] ."€</span>
                    ";}
                    ?>
                        <div class="info_produit">
                            <div class="info_img"><img src="images/structured/info.png"></div>
                            <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes-retro.php">Plus d'informations</a>
                        </div>
                        <div class="ajout_produit">
                            <div class="ajout_img"><img src="images/structured/ajout_panier.png"></div>
                            <a href="">Ajout panier</a>
                        </div>
                    </div>
                


                <div class="tri"><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/recherche.php">Recherche avancée</a></div>
                
<!--                 <div class="separateur_moustache"></div>
                
                
                <div class="separateur_moustache"></div>
                
                <div class="tri"><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/recherche.php">Recherche avancée</a></div> -->
                
                <button type="button" id="backtop">Haut de page</button>

            </div>
		</div>
        
        <div id="clear"></div> 
            
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
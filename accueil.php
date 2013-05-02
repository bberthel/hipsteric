<?php
require 'conf/top.php';

require 'lib/article.php';


connectDb();

$sql = 'SELECT article.nom_article, article.prix_article, article.description_article,article.photo_article, article.id_categorie, categorie.nom_categorie
                FROM article
                LEFT JOIN categorie ON article.id_categorie = categorie.id_categorie
                WHERE article.id_article =12'; 

                $result = mysql_query($sql);
                while( $results = mysql_fetch_array($result) )
                    {
                    $nom = $results["nom_article"];
                    $prix = $results["prix_article"];
                    $prix = $results["prix_article"];
                    $photo = $results["photo_article"];

                    $categorie = $results["nom_categorie"];


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
            	<div class="logo">
                    <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accueil.php"><img src="images/structured/logo_small.png"></a>
                </div>
                
                <div class="link">
                    <span>Bonjour Alizée</span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php $nb_produit_panier ?>)</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php">Déconnexion</a></span>
                </div>
                
                <div class="search">
                	<form id="search" name="search" method="post" action="">
                        <input name="search" type="text" id="search" />
                        <input id="rechercher" type="submit" src="images/structured/loupe.png" alt="submit" name="submit" />
                    </form>
                </div>
            </div>
            
            <div id="menu">
            	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes.php">Lunettes</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/chapeaux.php">Chapeaux</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accessoirs.php">Accessoirs</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/high-tech.php">Hight Tech</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/bijoux.php">Bijoux</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/divers.php">Divers</a></span>
                <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/packs.php">Packs</a></span>
            </div>
            
            <div id="content">


            	<div class="categorie">Promotions du moment<img src="images/structured/moustache.png"></div>
                
                <div class="produit">
                    <a href="<?php echo $photo ?>"><img src="images/lunettes-hipster.jpg" title="Lunettes : Pixels"></a>
                    <span class="nom_produit"><?php echo $nom ?></span>
                    <span class="prix_produit"><?php echo $prix ?>€</span>
                    <span class="type_produit">#<?php echo $categorie ?></span>
                    <div class="info_produit">
                    	<div class="info_img"><img src="images/structured/info.png"></div>
                   		<a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes-pixels.php">Plus d'informations</a>
                    </div>
                    <div class="ajout_produit">
                    	<div class="ajout_img"><img src="images/structured/ajout_panier.png"></div>
                        <a href="">Ajout panier</a>
                    </div>
                </div>
                
                <div class="produit">
					<img class="zoombox" src="images/tumblr_m48qz6kmTy1qfkglvo1_500.jpg" title="Lunettes : Retro">
                    <span class="nom_produit">Retro</span>
                    <span class="prix_produit">Prix€</span>
                    <span class="type_produit">#lunettes</span>
                    <div class="info_produit">
                        <div class="info_img"><img src="images/structured/info.png"></div>
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes-retro.php">Plus d'informations</a>
                    </div>
                    <div class="ajout_produit">
                    	<div class="ajout_img"><img src="images/structured/ajout_panier.png"></div>
                        <a href="">Ajout panier</a>
                    </div>
                </div>
                                
                <div class="produit">
                    <img class="zoombox" src="images/100329_les_commandements_du_hipster_aspx_ss_image_10_jpg_902484264_north_320x.jpg" title="Lunettes : Red John">
                	<span class="nom_produit">Red John</span>
                    <span class="prix_produit">Prix€</span>
                    <span class="type_produit">#lunettes</span>
                    <div class="info_produit">
                        <div class="info_img"><img src="images/structured/info.png"></div>
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes-redjohn.php">Plus d'informations</a>
                    </div>
                    <div class="ajout_produit">
                    	<div class="ajout_img"><img src="images/structured/ajout_panier.png"></div>
                        <a href="">Ajout panier</a>
                    </div>
                </div>
                
                <div class="produit">
                    <img class="zoombox" src="images/hipster_tee.jpg" title="T-shirt : Yesterday 1965">
                	<span class="nom_produit">Yesterday 1965</span>
                    <span class="prix_produit">Prix€</span>
                    <span class="type_produit">#t-shirt</span>
                    <div class="info_produit">
                        <div class="info_img"><img src="images/structured/info.png"></div>
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/t-shirt-yesterday1965.php">Plus d'informations</a>
                    </div>
                    <div class="ajout_produit">
                    	<div class="ajout_img"><img src="images/structured/ajout_panier.png"></div>
                        <a href="">Ajout panier</a>
                    </div>
                </div>
            </div>
		</div>
        
        <div id="clear"></div> 
            
        <div id="fond_footer">
        	<div id="footer">
            	<div id="corps_footer">
                
                    <div class="footer_section">
                        <a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accueil.php"> Hipsteric.com </a>
                        <span>Retrouvez nous sur les réseaux sociaux :</span>
                        <a href=""><img src="images/structured/facebook.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/twitter.png" alt="Facebook"></a>
                        <a href=""><img src="images/structured/you_tube.png" alt="Facebook"></a>
                    </div>
                    
                    <div class="footer_section">
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/inscription.php">Inscription</a></span>
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/lunettes.php">Lunettes</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/chapeaux.php">Chapeaux</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/accessoirs.php">Accessoirs</a></span>
                    </div>
                    
                    <div class="footer_section">
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/high-tech.php">Hight Tech</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/bijoux.php">Bijoux</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/divers.php">Divers</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/packs.php">Packs</a></span>
                    </div>
                    
                    <div class="footer_section">
                    	<span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php $nb_produit_panier ?>)</a></span>
                        <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/index.php">Déconnexion</a></span>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>
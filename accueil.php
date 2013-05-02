<?php

// Debut de session
session_start();
require 'conf/top.php';

require 'lib/article.php';



connectDb();
echo $_SESSION['nb_articles'];
echo $_SESSION['nom_user'];

echo $_SESSION['prenom_user'];

        $result = getArticle(12);
                while( $results = mysql_fetch_array($result) )
                    {
                    $nom1 = $results["nom_article"];
                    $prix1 = $results["prix_article"];
                    $desc1 = $results["description_article"];
                    $photo1 = $results["photo_article"];

                    $categorie1 = $results["nom_categorie"];
                }

                $result = getArticle(1);
                while( $results = mysql_fetch_array($result) )
                    {
                    $nom2= $results["nom_article"];
                    $prix2 = $results["prix_article"];
                    $desc2 = $results["description_article"];
                    $photo2 = $results["photo_article"];

                    $categorie2 = $results["nom_categorie"];
                }

                        $result = getArticle(2);
                while( $results = mysql_fetch_array($result) )
                    {
                    $nom3 = $results["nom_article"];
                    $prix3 = $results["prix_article"];
                    $desc3 = $results["description_article"];
                    $photo3 = $results["photo_article"];

                    $categorie3 = $results["nom_categorie"];
                }

                        $result = getArticle(4);
                while( $results = mysql_fetch_array($result) )
                    {
                    $nom4 = $results["nom_article"];
                    $prix4 = $results["prix_article"];
                    $desc4 = $results["description_article"];
                    $photo4 = $results["photo_article"];

                    $categorie4 = $results["nom_categorie"];
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
                    <span>Bonjour <?php echo $_SESSION['prenom_user'] ?></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/contact.php">Contactez-nous</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/compte.php">Mon compte</a></span>
                    <span>|</span>
                    <span><a href="http://etudiant.univ-mlv.fr/~bberthel/PHP/Projet/panier.php">Mon panier (<?php echo $_SESSION['nb_articles'] ?>)</a></span>
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
                    <a href="<?php echo $photo1 ?>"><img src="images/lunettes-hipster.jpg" title="Lunettes : Pixels" ></a>
                    <span class="nom_produit"><?php echo $nom1 ?></span>
                    <span class="prix_produit"><?php echo $prix1 ?>€</span>
                    <span class="type_produit">#<?php echo $categorie1 ?></span>
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
					<img class="zoombox" src="<?php echo $photo2 ?>" title="Lunettes : Retro" >
                    <span class="nom_produit"><?php echo $nom2 ?></span>
                    <span class="prix_produit"><?php echo $prix2 ?>€</span>
                    <span class="type_produit">#<?php echo $categorie2 ?></span>
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
                    <img class="zoombox" src="<?php echo $photo3 ?>" title="Lunettes : Red John" >
                	<span class="nom_produit"><?php echo $nom3 ?></span>
                    <span class="prix_produit"><?php echo $prix3 ?>€</span>
                    <span class="type_produit">#<?php echo $categorie3 ?></span>
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
                    <img class="zoombox" src="<?php echo $photo4 ?>" title="T-shirt : Yesterday 1965" >
                	<span class="nom_produit"><?php echo $nom4 ?></span>
                    <span class="prix_produit">p<?php echo $prix4 ?>€</span>
                    <span class="type_produit">#<?php echo $desc4 ?></span>
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
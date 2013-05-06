<html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<link rel="stylesheet" type="text/css" href="media/css/panier.css">
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
            	<div class="categorie">Votre panier trop swag<img src="images/structured/moustache.png"></div>
                                
                <TABLE> 
                    <TR class="head_table"> 
                        <TH>  </TH> 
                        <TH> Article </TH>
                        <TH> Type </TH> 
                        <TH> Caractéristiques </TH>
                        <TH> Quantité </TH>
                        <TH> Prix </TH>
                        <TH> </TH>
                    </TR> 
                                        
                    <TR> 
                        <TD> <a href="lunettes-pixels.php" title="Lunettes : Pixels"><img src="images/lunettes-hipster.jpg"></a></TD>
                        <TD> <span class="nom_article">Pixels</span> </TD> 
                        <TD> <span class="type_produit">#lunettes</span> </TD> 
                        <TD> <span class="infosup_produit">noir</span>  <span class="infosup_produit">vert</span> </TD> 
                        <TD> 1 </TD>
                        <TD> 115€ </TD>
                        <TD> <span class="del_produit">Supprimer</span> </TD>
                    </TR>
                    
                    <TR> 
                        <TD> <a href="" title="Lunettes : Retro"><img src="images/tumblr_m48qz6kmTy1qfkglvo1_500.jpg"></a> </TD>
                        <TD> <span class="nom_article">Retro</span> </TD> 
                        <TD> <span class="type_produit">#lunettes</span> </TD> 
                        <TD> <span class="infosup_produit">rouge</span> </TD> 
                        <TD> 1 </TD>
                        <TD> 98€ </TD>
                        <TD> <span class="del_produit">Supprimer</span> </TD>
                    </TR> 

                </TABLE>
                
                <div id="prix"> Prix total : 213€ </div>
                
                <div class="submit">
                	<input id="commander" type="submit" src="images/structured/bouton_commander.png" alt="submit" name="submit" />
                </div>
                
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
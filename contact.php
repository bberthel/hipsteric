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
            
            	<div class="page_contact">Une question, une petite cass'dédi, une info qui manque ? Check-nous boloss !</div>
            	
                <form method="post" action="">
					<label for="objet" class="champs">Objet :</label>
                       <select name="objet" id="objet" class="list_choice">
                           <option value="probleme_commande">Problème de commande</option>
                           <option value="probleme_livraison">Problème de livraison</option>
                           <option value="probleme_technique">Problème technique (sur notre site)</option>
                           <option value="demande_info">Demande d'information(s)</option>
                           <option value="avis">Avis de consommateur</option>
                       </select>
					<div class="clear"></div>
					<label for="message" class="champs">Message :</label><textarea cols="50" rows="7" name="message" id="message"></textarea>
					<div class="clear"></div>
                    <input id="soumission" type="submit" src="images/structured/bouton_soumission.png" alt="submit" name="submit" />
					<span class="note"> * aucun rapport sexuel </span>
				</form>
                
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
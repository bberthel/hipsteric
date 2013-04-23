<?php
require_once '../conf/settings.php';
require_once 'functions.php';
//require_once LIB_PATH . 'plat.php';
//require_once LIB_PATH . 'user.php';

/* Initialisation moteur Twig */
require_once('../lib/Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../templates'); // Re´pertoire contenant les templates
$tpl = new Twig_Environment($loader, array(
'cache' => false, // De´sactiver le cache en de´veloppement
//'cache' => 'compilation_cache' // De´commenter cette ligne en production
));


//require 'user.php';
connectDb();

  function getOrder($id_user) {
            $sql = 'SELECT  commande.id_commande,commande.prix_commande,commande.numero_adresse_facturation,commande.numero_adresse_livraison,commande.adresse_facturation,commande.adresse_livraison,commande.CP_facturation,commande.CP_livraison,commande.ville_facturation,commande.ville_livraison,commande.id_user 
			FROM commande, est_commande_article 
            INNER JOIN article 
            ON article.id_article = est_commande_article.id_article 
			WHERE commande.id_user='.$id_user;
            $result = mysql_query($sql);
            $results = array(); 
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
			var_dump($results);

            return $results;
    }
    getOrder(1);

/*  */
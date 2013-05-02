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

  function getItemOfOrder($id_user) {
            $sql = 'SELECT commande.id_commande, commande.prix_commande, commande.numero_adresse_facturation, commande.numero_adresse_livraison, commande.adresse_facturation, commande.adresse_livraison, commande.CP_facturation, commande.CP_livraison, commande.ville_facturation, commande.ville_livraison, commande.id_user,article.id_article, article.nom_article, article.prix_article, article.description_article,article.id_categorie
            FROM commande
            INNER JOIN est_commande_article ON commande.id_commande = est_commande_article.id_commande
            INNER JOIN article ON article.id_article = est_commande_article.id_article
            WHERE commande.id_user ='.$id_user;
            echo $sql;
            $result = mysql_query($sql);
            $results = array(); 
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
			var_dump($results);

            return $results;
    }
    getItemOfOrder(2);

    function createCommande($id_user){
        $sql = "INSERT INTO `hipsteric`.`commande` (`id_commande`, `prix_commande`, `numero_adresse_livraison`, `numero_adresse_facturation`, `adresse_facturation`, `adresse_livraison`, `ville_facturation`, `ville_livraison`, `CP_livraison`, `CP_facturation`, `id_user`) 
        VALUES (NULL, '', '', '', '', '', '', '', '', '', '$id_user')";
        echo $sql;
        $result = mysql_query($sql);
    }



    function insertItemToOrder($id_article,$id_commande){
        $sql = "INSERT INTO `hipsteric`.`est_commande_article` (`id_article`, `id_commande`) 
        VALUES ('".mysql_real_escape_string($id_article)."', '".mysql_real_escape_string($id_commande)."')";
        echo $sql;
        $result = mysql_query($sql);

    }
    //insertItemToOrder(11, 2);

    function insertAdress($id_user,$prix_commande,$numero_adresse_livraison,$numero_adresse_facturation,$adresse_livraison,$adresse_facturation,$CP_livraison,$CP_facturation,$ville_livraison,$ville_facturation){
        $sql = 'UPDATE  hipsteric.commande 
        SET  commande.prix_commande ='.$prix_commande.',
        commande.numero_adresse_livraison ='.$numero_adresse_livraison.',
        commande.numero_adresse_facturation ='.$numero_adresse_facturation.',
        commande.adresse_facturation = \''.$adresse_facturation.'\',
        commande.adresse_livraison =\''.$adresse_livraison.'\',
        commande.CP_facturation='.$CP_facturation.',
        commande.CP_livraison='.$CP_livraison.',
        commande.ville_facturation =\''.$ville_facturation.'\',
        commande.ville_livraison =\''.$ville_livraison.'\'
        WHERE  commande.id_user ='.$id_user;
        echo $sql;
        $result = mysql_query($sql);
    }

?>
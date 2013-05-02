<?php
//require_once '../conf/settings.php';
require_once 'functions.php';
//require_once LIB_PATH . 'plat.php';
//require_once LIB_PATH . 'user.php';




//require 'user.php';
connectDb();


    // on utilise mysql_fetch_assoc au lieu de mysql_fetch_array pour avoir un tableau associatif uniquement
    // (il s'agit là d'un choix quant à vos préférences personnelles)


   /* function getAllItems() {
        // on fait un left join au lieu d'un inner join car on veut aussi les plats qui ne sont pas dans un menu
    	$sql = 'SELECT article.id_article,article.nom_article,article.description_article,article.prix_article, article.photo_article FROM article, menu.nom as menu from plat
                INNER JOIN type ON type.id_type = plat.id_type 
                LEFT JOIN menu ON menu.id_menu = plat.id_menu';    	
    	$result = mysql_query($sql);
		$results = array();
		while ($ligne = mysql_fetch_assoc($result)) {
			$results[] = $ligne;
		}
		return $results;
    }

    function getAllMenus() {
            $sql = 'SELECT id_menu,nom from menu';
            $result = mysql_query($sql);
            $results = array() ;
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
            return $results;
    }

    function getAllTypes() {
            $sql = 'SELECT id_type,nom from type';
            $result = mysql_query($sql);
            $results = array() ;
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
            return $results;
    }*/
       function getArticle($id_article){ 
            $sql = 'SELECT article.nom_article, article.prix_article, article.description_article
                FROM article
                WHERE article.id_article ='. $id_article;   
            return $sql;
    }
   

    //affiche les articles contenus dans un pack
    function getItempsByPack($id_pack) {
           
            $sql='SELECT * FROM pack AS p, compose c
            INNER JOIN article AS a
            On c.id_article = a.id_article 
            WHERE p.id_pack ='. $id_pack;
            $result = mysql_query($sql);
            $results = array(); 
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
            var_dump($results);
            return $results;
    }
    //getItempsByPack(4);

// ajouter un article à la base de donnée
    function addItems($nom_article,$prix_article,$description_article,$photo_article,$id_categorie ){
        $sql = "INSERT INTO `hipsteric`.`article` (`id_article`, `nom_article`, `prix_article`, `description_article`, `photo_article`, `id_categorie`) 
        VALUES (NULL, '".mysql_real_escape_string($nom_article)."','".mysql_real_escape_string($prix_article)."', '".mysql_real_escape_string($description_article)."', '".mysql_real_escape_string($photo_article)."', '".mysql_real_escape_string($id_categorie)."')";
        echo $sql;
        $result = mysql_query($sql);
    }
    //addItems('pixel', 50, 'parce qu\'on a trop le swaag', 'http://localhost:8888/images/lunettes-hipster.jpg',4 );

// ajouter un pack à la base de donnée
function addPack($nom_pack,$prix_pack,$photo_pack,$description_pack){
        $sql = "INSERT INTO `hipsteric`.`pack` (`id_pack`, `nom_pack`, `prix_pack`, `photo_pack`, `description_pack`) 
        VALUES (NULL, '".mysql_real_escape_string($nom_pack)."','".mysql_real_escape_string($prix_pack)."', '".mysql_real_escape_string($photo_pack)."', '".mysql_real_escape_string($description_pack)."')";
        echo $sql;
        $result = mysql_query($sql);
    }
    //addPack('packstachemou', 10, 'http://localhost:8888/images/lunettes-hipster.jpg','I love moustache' );    

/*    TRI EN FONCTION DU PRIX       */

// Items
    function getItemsOrderedByPrixAsc() {
        $sql = 'SELECT article.id_article, article.nom_article, article.prix_article, article.description_article, article.id_categorie 
                FROM article
                ORDER BY article.prix_article';   
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        var_dump($results);
        return $results;
    }
    //getItemsOrderedByPrixAsc();

     function getItemsOrderedByPrixDesc() {
        $sql = 'SELECT article.id_article, article.nom_article, article.prix_article, article.description_article, article.id_categorie 
                FROM article
                ORDER BY article.prix_article DESC';   
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        var_dump($results);
        return $results;
    }
    //getItemsOrderedByPrixDesc();

// Pack
    function getPacksOrderedByPrixAsc() {
        $sql = 'SELECT pack.id_pack, pack.nom_pack, pack.prix_pack, pack.description_pack
                FROM pack
                ORDER BY pack.prix_pack';   
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        var_dump($results);
        return $results;
    }
    //getPacksOrderedByPrixAsc();

     function getPacksOrderedByPrixDesc() {
        $sql = 'SELECT article.id_article, article.nom_article, article.prix_article, article.description_article, article.id_categorie 
                FROM article
                ORDER BY article.prix_article DESC';   
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        var_dump($results);
        return $results;
    }
    //getItemsOrderedByPrixDesc();    


/*
    function getPlatsLimit($nb) {
        $sql = 'SELECT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
                INNER JOIN type ON type.id_type = plat.id_type 
                LEFT JOIN menu ON menu.id_menu = plat.id_menu
                LIMIT '.mysql_real_escape_string($nb);  
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        return $results;
    }
    function getPlatsByTypes($types) {
        $types_sql = implode(',',$types);
        $sql = 'SELECT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
                INNER JOIN type ON type.id_type = plat.id_type 
                LEFT JOIN menu ON menu.id_menu = plat.id_menu
                WHERE type.id_type IN ('.$types_sql.')';  
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        return $results;
    }

    function getPlatsByKeyword($keyword) {
        $sql = 'SELECT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
                INNER JOIN type ON type.id_type = plat.id_type 
                LEFT JOIN menu ON menu.id_menu = plat.id_menu
                WHERE plat.description LIKE \'%'.mysql_real_escape_string($keyword).'%\' 
                    OR plat.nom LIKE \'%'.mysql_real_escape_string($keyword).'%\''; 
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        return $results;
    }


    /* 
        Ici, on fait toute la recherche en une seule requête.
        Il faut être vigilant sur la concaténation des différentes parties de la requête SQL :
            - faire un maximum de tests (les variables existent-elles ?)
            - attention aux oublis d'espace et autre
            - ne pas hésiter à bien décomposer la requête SQL pour + de lisibilité
        La condition  if($variable) permet de savoir si la variable est définie.
    
    function getPlatsByMultipleArgs($menu_id,$order,$limit, $types, $keyword) {
            $types_sql = implode(',',$types);
            $sql = 'SELECT DISTINCT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
            INNER JOIN type ON type.id_type = plat.id_type
            LEFT JOIN menu ON menu.id_menu = plat.id_menu 
            LEFT JOIN index_plat ON index_plat.id_plat = plat.id_plat ';

            if ($menu_id || $types_sql || $keyword) {
                $sql .= 'WHERE ';
                if ($menu_id) {
                    $sql .= '(';
                    $sql .= 'menu.id_menu = '.mysql_real_escape_string($menu_id);
                    $sql .= ') AND ';
                }
                if ($types_sql) {
                    $sql .= '(';
                    $sql .= 'type.id_type IN ('.$types_sql.')';
                    $sql .= ') AND ';
                }
                if ($keyword) {
                    // ancienne technique avec le LIKE sur plat.description et/ou plat.nom
                    
                    $sql .= '(';
                    $sql .= 'plat.description LIKE \'%'.mysql_real_escape_string($keyword).'%\' 
                    OR plat.nom LIKE \'%'.mysql_real_escape_string($keyword).'%\'';
                    $sql .= ') AND ';
                    

                    // nouvelle technique avec la table d'indexation !!!
                    /*$sql .= '(';
                    $sql .= 'index_plat.cle LIKE \'%'.mysql_real_escape_string($keyword).'%\'';
                    $sql .= ') AND ';
                }
                $sql .= '1 ';
            }
            if ($order) {
                $sql .= 'ORDER BY '.$order.' ASC ';
            }
            if ($limit) {
                $sql .= 'LIMIT '.$limit;
            }

            $result = mysql_query($sql);
            $results = array() ;
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
            return $results;        
    }*/


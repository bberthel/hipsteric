<?php

    // on utilise mysql_fetch_assoc au lieu de mysql_fetch_array pour avoir un tableau associatif uniquement
    // (il s'agit là d'un choix quant à vos préférences personnelles)


    function getAllPlats() {
        // on fait un left join au lieu d'un inner join car on veut aussi les plats qui ne sont pas dans un menu
    	$sql = 'SELECT plat.id_plat,plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
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
    }
    function getPlatsByMenu($menu_id) {
            $sql = 'SELECT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
            INNER JOIN type ON type.id_type = plat.id_type
            LEFT JOIN menu ON menu.id_menu = plat.id_menu
            WHERE menu.id_menu = '.mysql_real_escape_string($menu_id);
            $result = mysql_query($sql);
            $results = array() ;
            while ($ligne = mysql_fetch_assoc($result)) {
                $results[] = $ligne;
            }
            return $results;
    }
    function getPlatsOrderedBy($order) {
        $sql = 'SELECT plat.nom,plat.description,plat.prix, type.nom as type, menu.nom as menu from plat
                INNER JOIN type ON type.id_type = plat.id_type 
                LEFT JOIN menu ON menu.id_menu = plat.id_menu
                ORDER BY '.$order. ' ASC';   
        $result = mysql_query($sql);
        $results = array();
        while ($ligne = mysql_fetch_assoc($result)) {
            $results[] = $ligne;
        }
        return $results;
    }

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
    */
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
                    $sql .= ') AND ';*/
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
    }


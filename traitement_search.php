<?php
	require 'conf/top.php';

	connectDb();
	$plats = null;
    $menus = getAllMenus();
    $types = getAllTypes();

    $menu_get =  null;
    $orderby_get = null;
    $limit_get = null;
    $keyword_get = null;
    $types_get = array();


    if (!empty($_GET)) {
        if (isset($_GET['menu'])) {
            $menu_get = (integer) $_GET['menu'];
        }
        if (isset($_GET['orderby'])) {
            switch($_GET['orderby']) {
                case 'alpha_n':
                    $orderby_get = 'nom';
                    break;
                case 'alpha_d':
                    $orderby_get = 'description';
                    break;
                case 'price':
                    $orderby_get = 'prix';
                    break;
                default:
                    $orderby_get = null;
                    break;
            }
        }
        if (isset($_GET['limit'])) {
            $limit_get = (integer) $_GET['limit'];
        }
        if (isset($_GET['type'])) {
            foreach($_GET['type'] as $type) {
                $types_get[] = (integer) $type;
            }
        }
        if (isset($_GET['keyword'])) {
            $keyword_get = $_GET['keyword'];
        }

        $plats = getPlatsByMultipleArgs($menu_get,$orderby_get,$limit_get, $types_get, $keyword_get);

    }
    else {
        $plats = getAllPlats();
    }

echo json_encode($plats);
?>
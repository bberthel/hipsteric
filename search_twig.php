<?php

	require_once('conf/top.php');
	try{
		$template = $tpl->loadTemplate('search.html');
	}catch(Twig_Error $e){
		echo $e->getMessage();
	}
	//ici, le code PHP traitant le moteur de recherche
	connectDb();
	session_start();
	if(!isset($_SESSION['id_user'])){
		header('Location: index.php');
	}

	$pseudo = getUserById($_SESSION['id_user']);
    $plats = NULL;
    $menus = getAllMenus();
    $types = getAllTypes();

    $menu_get =  NULL;
    $orderby_get = NULL;
    $limit_get = NULL;
    $keyword_get = NULL;
    $types_get = array();
	$nb_results = array(2,5,10,15);


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
                    $orderby_get = NULL;
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
	
	//on envoie les infos nécessaires à notre template
	$count_plats = count(plats);
	echo $template->render(array('MEDIA_PATH' => MEDIA_PATH,'plats' => $plats, 'menus' => $menus, 'menu_get' => $menu_get, 'limit_get' => $limit_get, 'orderby_get' => $orderby_get, 'nb_results' => $nb_results, 'types'=>$types, 'types_get'=>$types_get, 'keyword_get'=>$keyword_get, 'count_plats'=>$count_plats, 'pseudo'=>$pseudo));
	
?>
<?php

	require 'conf/top.php';

	// Connexion a la base de donnees
	connectDb();
	
	// Ouverture de la session
	session_start();
	
	// Si l'utilisateur est bien enregistre, on envoit un en-tete HTTP via index.php
	if(!isset($_SESSION['id_user'])){
		header('Location: index.php');
	}

	// Declaration des variables
	$pseudo = getUserById($_SESSION['id_user']);
    $menus = getAllMenus();
    $types = getAllTypes();
    $plats = null;
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

    } else {
        $plats = getAllPlats();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>Carte de restaurant</title>
    <link rel="stylesheet" type="text/css" href="<?php echo MEDIA_PATH . 'css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo MEDIA_PATH . 'css/style.css'; ?>">
    <script src="media/jquery.js"></script>
    <script>
	window.onload = function() {
		$('#submit-search').click(function(e) {
			e.preventDefault();
			var form_keyword = $('#keyword').val();
			$.ajax({
				   type: "GET",
				   url: "traitement_search.php",
				   data: {keyword:form_keyword},
				   success: function(data){
					   alert(data);
				   }
			});
		});
	}
	</script>
</head>
<body>
    <div id="intro" class="small">
        <h1>TD 06 - Création d'un moteur de recherche <small>(2)</small></h1>
        <p class="lead">Au cours de ce td, nous allons réutiliser un modèle de base de données relationnelle déjà
étudié, pour créer un moteur de recherche et utiliser différentes requêtes SQL.</p>
	<p> <?php echo $pseudo; ?> (<a href="index.php?deco=1">Déconnexion</a>)</p>
    </div>
    <div id="search">
        <form method="get" action="search.php" class="form-inline">
            <div class="form-elem">
                <div>Filtrer par menu</div>
                <select name="menu">
                    <option value="">---</option>
                    <?php foreach($menus as $menu): 
                        $selected = '';
                        if ($menu_get == $menu['id_menu']) {
                            $selected = 'selected';
                        }
                    ?> 
                        <option <?php echo $selected; ?> value="<?php echo $menu['id_menu']; ?>"><?php echo $menu['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-elem">
                <div>Ordonner les résultats</div>
                <select name="orderby">
                    <option value="">---</option>
                    <option value="alpha_n" <?php if($orderby_get == "nom") echo 'selected'; ?>>Ordre alphabétique (nom)</option>
                    <option value="alpha_d" <?php if($orderby_get == "description") echo 'selected'; ?>>Ordre alphabétique (description)</option>
                    <option value="price" <?php if($orderby_get == "prix") echo 'selected'; ?>>Prix</option>
                </select>
            </div>
            <div class="form-elem">
                <div>Nombre de résultats à afficher</div>
                <select name="limit">
                    <option value="">---</option>
                    <option value="2" <?php if($limit_get == "2") echo 'selected'; ?>>2</option>
                    <option value="5" <?php if($limit_get == "5") echo 'selected'; ?>>5</option>
                    <option value="10" <?php if($limit_get == "10") echo 'selected'; ?>>10</option>
                    <option value="15" <?php if($limit_get == "15") echo 'selected'; ?>>15</option>
                </select>
            </div>

            <div class="form-elem">
                <div>Type de plat</div>
                <?php foreach($types as $type): 
                    $checked = '';
                    foreach($types_get as $type_get) {
                        if ($type_get == $type['id_type']) {
                            $checked = 'checked';
                        }
                    }
                ?>
                    <label class="checkbox">
                        <input type="checkbox" <?php echo $checked; ?> name="type[]" value="<?php echo $type['id_type'] ?>" /> <?php echo $type['nom']; ?>
                    </label>
                <?php endforeach; ?>
            </div>

            <div class="form-elem">
                <div>Recherche</div>
                <input type="text" name="keyword"  value="<?php echo $keyword_get; ?>" placeholder="Entrer un mot clé..." />
            </div>
            <div class="form-elem-submit">
                <input type="submit" value="Rechercher" class="btn btn-primary" id="submit-search"/>
            </div>
        </form>
    </div>

    <div id="results">
        <?php if (count($plats) > 0): ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix (€)</th>
                    <th>Menu</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($plats as $plat):
                ?>
                    <tr>
                        <td><?= $plat['nom']; ?></td>
                        <td><?= $plat['description']; ?></td>
                        <td><?= $plat['prix']; ?></td>
                        <td><?= $plat['menu']; ?></td>
                        <td><?= $plat['type']; ?></td>
                    </tr>
                <?php
                    endforeach;
                ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Aucun résultat n'a été trouvé.</p>
        <?php endif; ?>
    </div>
    <div id="footer">
        <dl class="dl-horizontal">
          <dt>TD</dt>
          <dd>IMAC1 - TD 06</dd>
          <dt>Contact</dt>
          <dd>aliceloeser.cours@gmail.com</dd>
          <dt>Etape 1</dt>
          <dd><a href="search_simple.php">search_simple.php</a></dd>
          <dt>Etape 2</dt>
          <dd><a href="search.php">search.php</a></dd>
          <dt>Script d'indexation</dt>
          <dd><a href="indexation.php">indexation.php</a></dd>
        </dl>
    </div>


</body>
</html>
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
        /* 
            Pour chaque variable $_GET, on regarde si elle est définie.
            Si elle est définie, on envoie la recherche suivant ce paramètre, grâce à une fonction dédiée.
        */
        if (isset($_GET['menu'])) {
            /*
                effectuer un "cast" sur $_GET['menu'] permet d'être sûr que l'utilisateur n'a pas entré
                une chaîne de caractère ou autre... 
            */ 
            $menu_get = (integer) $_GET['menu'];
            $plats = getPlatsByMenu($menu_get);
        }
        else if (isset($_GET['orderby'])) {
            $orderby_get = $_GET['orderby'];
            switch($orderby_get) {
                case 'alpha_n':
                    $plats = getPlatsOrderedBy('nom');
                    break;
                case 'alpha_d':
                    $plats = getPlatsOrderedBy('description');
                    break;
                case 'price':
                    $plats = getPlatsOrderedBy('prix');
                    break;
                default:
                    // si jamais l'utilisateur a rentré n'importe quoi, on affiche tout
                    $plats = getAllPlats();
                    break;
            }
            
        }
        else if (isset($_GET['limit'])) {
            $limit_get = (integer) $_GET['limit'];
            $plats = getPlatsLimit($limit_get);
        }
        else if (isset($_GET['type'])) {
            foreach($_GET['type'] as $type) {
                $types_get[] = (integer) $type;
            }
            $plats = getPlatsByTypes($types_get);
        }
        else if (isset($_GET['keyword'])) {
            $keyword_get = $_GET['keyword'];
            $plats = getPlatsByKeyword($keyword_get);
        }

    }
    else {
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

</head>
<body>
    <div id="intro" class="small">
        <h1>TD 06 - Création d'un moteur de recherche <small>(1)</small></h1>
        <p class="lead">Au cours de ce td, nous allons réutiliser un modèle de base de données relationnelle déjà
étudié, pour créer un moteur de recherche et utiliser différentes requêtes SQL.</p>
    </div>
    <div id="search">
        <form method="get" action="index.php" class="form-inline">
            <div>Filtrer par menu</div>
            <select name="menu">
                <option value="">---</option>
                <?php foreach($menus as $menu):
                    /* 
                        On regarde ce que contient $menu_get (initialisé précédemment)
                        afin de donner de la "mémoire" au formulaire : 
                        ainsi l'utilisateur ne perd pas ses critères de recherche,
                        on présélectionne son choix précédent dans le menu "select"
                    */ 
                    $selected = '';
                    if ($menu_get == $menu['id_menu']) {
                        $selected = 'selected';
                    }
                ?> 
                    <option <?php echo $selected; ?> value="<?php echo $menu['id_menu']; ?>"><?php echo $menu['nom']; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Rechercher" class="btn" />
        </form>
        <form method="get" action="index.php" class="form-inline">
            <div>Ordonner les résultats</div>
            <select name="orderby">
                <option>---</option>
                <option value="alpha_n" <?php if($orderby_get == "alpha_n") echo 'selected'; ?>>Ordre alphabétique (nom)</option>
                <option value="alpha_d" <?php if($orderby_get == "alpha_d") echo 'selected'; ?>>Ordre alphabétique (description)</option>
                <option value="price" <?php if($orderby_get == "price") echo 'selected'; ?>>Prix</option>
            </select>
            <input type="submit" value="Rechercher" class="btn" />
        </form>
        <form method="get" action="index.php" class="form-inline">
            <div>Nombre de résultats à afficher</div>
            <select name="limit">
                <option value="">---</option>
                <option value="2" <?php if($limit_get == "2") echo 'selected'; ?>>2</option>
                <option value="5" <?php if($limit_get == "5") echo 'selected'; ?>>5</option>
                <option value="10" <?php if($limit_get == "10") echo 'selected'; ?>>10</option>
                <option value="15" <?php if($limit_get == "15") echo 'selected'; ?>>15</option>
            </select>
            <input type="submit" value="Rechercher" class="btn" />
        </form>
        <form method="get" action="index.php" class="form-inline">
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

            <input type="submit" value="Rechercher" class="btn" />
        </form>
        <form method="get" action="index.php" class="form-inline">
            <div>Recherche</div>
            <input type="text" name="keyword"  value="<?php echo $keyword_get; ?>" placeholder="Entrer un mot clé..." />
            <input type="submit" value="Rechercher" class="btn" />
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
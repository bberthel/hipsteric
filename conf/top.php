<?php

require_once 'settings.php';
require_once LIB_PATH . 'functions.php';
//require_once LIB_PATH . 'plat.php';

/* Initialisation moteur Twig */
require_once(LIB_PATH . 'Twig/Autoloader.php');
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('templates'); // Repertoire contenant les templates
$tpl = new Twig_Environment($loader, array(
'cache' => false, // Desactiver le cache en developpement
//'cache' => 'compilation_cache' // Decommenter cette ligne en production
));

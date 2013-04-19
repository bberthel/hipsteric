<?php

	require 'conf/top.php';

	// Connexion a la base de donnees
	connectDb();

	// Le "script d'indexation", à exécuter une seule fois
	$plats = getAllPlats();
	foreach($plats as $plat) {
		$cles_index = $plat['nom']. ' '.$plat['description'];
		$cles_array = explode(' ',$cles_index);
		foreach($cles_array as $cle) {
			// condition sur la longueur de la "clé", afin de ne pas entrer des mots trop courts dans base
			if (strlen($cle) > 2) {
				$sql = 'INSERT INTO index_plat VALUES (\''.mysql_real_escape_string($cle).'\','.$plat['id_plat'].')';
				//	pour exécuter le script, décommentez la ligne suivante attention, il ne faut l'exécuter qu'une fois !

				//$result = mysql_query($sql);
			}
		}
	}
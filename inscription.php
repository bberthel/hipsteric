<?php
session_start();

// Debut de session

require 'conf/top.php';
require 'lib/user.php';


// Connexion a la base de donnees
connectDb();

if( isset($_GET['deco']) && $_GET['deco'] == 1){
        session_destroy();
}

if(isset($_POST['submit_inscription'])){
    echo 'coucou';
    var_dump($_POST);
    if($_POST['password'] == $_POST['password_confirmation']){

        if(insertUser($_POST['name'],$_POST['firstname'],$_POST['mail'],$_POST['password'],$_POST['tel'],$_POST['number'],$_POST['adress'],$_POST['postal_code'],$_POST['city'])){
            echo 'inscription réussie';
        }
        else echo 'inscription pas réussie';
    }else echo 'bouh mauvais password conf';
}


?>

<html>
    <head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    	<link rel="stylesheet" type="text/css" href="media/css/style.css">
        <link rel="shortcut icon" href="images/structured/favicon.png" type="image/x-icon" /> 
		<title>Hipsteric</title>
        <meta name="Description" content="Site de vente swag, pour une élite à moustache et rouge à lèvre.">
		<meta name="Keywords" content="hipster swag moustache stachmou vente vêtements t-shirt lunette bijoux accessoire high tech appareil photo">
    </head>
    
    <body>
    
        <div id="all">
        
            <div id="logo_tall">
                 <img src="images/structured/logo_tall.png" width="411" height="182" alt="Hipsteric">
           </div>

            <p>Vous &ecirc;tes sur le point de d&eacute;couvrir la swagitude supr&ecirc;me. <br>
            Remplissez ce formulaire et atteignez l'orgasme moustachique !</p>
            <br>
            <div id="form">
                <form method="post" action="">
                    <div id="form_left">
                    	<p>Nom :</p>
                        <p>Pr&eacute;nom :</p>
                        <p>Mail :</p>
                        <p>Mot de passe :</p>
                        <p>Confirmation :</p>
                     	<p>T&eacute;l&eacute;phone :</p>
                        <br>
                        <p>N&deg; :</p>
                        <p>Nom :</p>
                        <p>Code postal :</p>
                        <p>Ville :</p>
                    </div>
                    <div id="form_left">
                    	<input type="text" name="name" /><br>
                        <input type="text" name="firstname" /><br>
                        <input type="email" name="mail" /><br>
                        <input type="password" name="password" /><br>
                        <input type="password" name="password_confirmation" /><br>
                        <input type="text" name="tel" /><br>

                        <br>
                        <input type="text" name="number" /><br>
                        <input type="text" name="adress" /><br>
                        <input type="text" name="postal_code" /><br>
                        <input type="text" name="city" />
                    </div>
                    <div id="clear"></div>
                    <input type="submit" src="images/structured/bouton_inscription.png" alt="submit" name="submit_inscription" />
                </form>
            </div>
           
		</div>
        
    </body>
</html>
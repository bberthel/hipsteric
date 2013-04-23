<?php
require 'conf/top.php';
require 'lib/user.php';
connectDb();



if(isset($_POST['submit_login'])){
	$id = getUserIdAtLogin($_POST['adresse'], $_POST['password']);
	if($id){
        session_start();
		$_SESSION['id_user'] = $id;

	}
	else {
        echo 'fail to login';
    }
}
?>

<html>
    <head>
    <link rel="stylesheet" type="text/css" href="media/css/style.css">
    </head>
    
    <body>
    
        <div id="all">
        
            <div id="logo_tall">
                <img src="images/structured/logo_tall.png" width="411" height="182" alt="Hipsteric">
            </div>

            <p>Bienvenue sur votre site d'hipsters trop swag !</p>
            <br>
            <div id="form">
                <form method="post" action="">
                    <div id="form_left">
                        <p>Adresse :</p>
                            <input type="text" name="adresse" />
                    </div>
                    <div id="form_right">
                        <p>Mot de passe :</p>
                            <input type="password" name="password" />
                    </div>
                    <div id="clear"></div>
                    <input type="submit" src="images/structured/bouton_connexion.png" alt="submit" name="submit_login" />
                </form>
            </div>
            <br>
            <p>Pas encore membre ? <a href="inscription.php">Inscription</a></p>
           
        </div>
        
    </body>
</html>


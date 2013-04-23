<?php
require_once 'conf/top.php';
connectDb();

function insertUser($lastname,$firstname,$email,$password,$tel,$number,$adress,$CP,$city){

	if(empty($lastname) || empty($password))return false;
	$lastname = mysql_escape_string(htmlspecialchars($lastname));
	$firstname = mysql_escape_string(htmlspecialchars($firstname));
	$tel=mysql_escape_string(htmlspecialchars($tel));
	$password = mysql_escape_string(htmlspecialchars($password));
	$number = mysql_escape_string(htmlspecialchars($number));
	$adress = mysql_escape_string(htmlspecialchars($adress));
	$CP = mysql_escape_string(htmlspecialchars($CP));
	$city = mysql_escape_string(htmlspecialchars($city));
	$email = mysql_escape_string(htmlspecialchars($email));




	$sql = "INSERT INTO user(nom_user,prenom_user,mdp_user,tel_user,numero_adresse_user,adresse_user,ville_user,CP_user,mail) VALUES('$lastname','$firstname','$password','$tel','$number','$adress','$city','$CP','$email')";
	if(!mysql_query($sql)){
            echo 'FAIL';
            return 0;   
        }else{
            echo 'SUCCEED <br/>';
            return 1;   
        }
        	$request = mysql_query($sql);
	return $request;
}

function getUserIdAtLogin($mail,$password){
	if(empty($mail) || empty($password))return false;
	$mail = mysql_escape_string(htmlspecialchars($mail));
	$password = mysql_escape_string(htmlspecialchars($password));
	
	$sql = "SELECT id_user FROM user WHERE email='$mail' AND mdp_user='$password';";
	$result = mysql_query($sql);
	$ligne = mysql_fetch_array($result);
	//$result = mysql_result($result,0);
	
	return intval($ligne);
}
/*
function getUserById($id){
	if(!is_int($id)) return false;
	
	$sql = "SELECT pseudo FROM user WHERE id=$id";
	$result = mysql_query($sql);
	$result = mysql_result($result,0);
	
	return $result;
}*/


?>
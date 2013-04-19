<?php


function insertUser($pseudo,$pwd){
	if(empty($pseudo) || empty($pwd))return false;
	$pseudo = mysql_escape_string(htmlspecialchars($pseudo));
	$pwd = mysql_escape_string(htmlspecialchars($pwd));
	$sql = "INSERT INTO user(pseudo, password) VALUES('$pseudo','$pwd')";
	$request = mysql_query($sql);
	return $request;
}

function getUserIdAtLogin($pseudo,$pwd){
	if(empty($pseudo) || empty($pwd))return false;
	$pseudo = mysql_escape_string(htmlspecialchars($pseudo));
	$pwd = mysql_escape_string(htmlspecialchars($pwd));
	
	$sql = "SELECT id FROM user WHERE pseudo='$pseudo' AND password='$pwd';";
	$result = mysql_query($sql);
	$result = mysql_result($result,0);
	
	return intval($result);
}

function getUserById($id){
	if(!is_int($id)) return false;
	
	$sql = "SELECT pseudo FROM user WHERE id=$id";
	$result = mysql_query($sql);
	$result = mysql_result($result,0);
	
	return $result;
}


?>
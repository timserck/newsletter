<?php
function nettoyage($value){
return trim(strip_tags($value));
}

function regex($subject, $pattern){
	preg_match($pattern, $subject);
}



//feed





function admin_validation($connexion, $mail, $password){

$query = "SELECT * FROM users WHERE mail = :mail AND pwd = :password AND privilege = 'admin' ";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':mail', $mail);
$preparedStatement->bindParam(':password', $password);
$preparedStatement->execute();
return $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
}

function get_mail($connexion){

$query = "SELECT * FROM users WHERE validate_user = 'yes'" ;
$preparedStatement = $connexion->prepare($query);
$preparedStatement->execute();
return $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
}

function update_mail($connexion, $id, $mail, $date, $privilege){
$validate_user = "yes";
$query = "UPDATE users SET mail = :mail , date = :date, privilege = :privilege WHERE id = :id";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':id', $id);
$preparedStatement->bindParam(':mail', $mail);
$preparedStatement->bindParam(':date', $date);
$preparedStatement->bindParam(':privilege', $privilege);
$preparedStatement->execute();
}

function delete_mail($connexion, $id){

$query = "DELETE FROM users WHERE id = :id";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':id', $id);
$preparedStatement->execute();
}

function insert_mail($connexion, $mail,$date,$privilege){
	$query = "INSERT INTO users (mail, date, privilege) VALUES (:mail, :date, :privilege)";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':mail', $mail);
$preparedStatement->bindParam(':date', $date);
$preparedStatement->bindParam(':privilege', $privilege);
$preparedStatement->execute();
return $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
}

function last_id($connexion){
$query = "SELECT id FROM users ORDER BY id DESC LIMIT 0, 1";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->execute();
return $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
}

function date_db($connexion, $id){

$query = "SELECT date FROM users WHERE :id = id ";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':id', $id);
$preparedStatement->execute();
return $result = $preparedStatement->fetchAll(PDO::FETCH_ASSOC);
}

function email_validate($connexion, $id){
$validate_user = "yes";
$query = "UPDATE users SET validate_user = :validate_user WHERE id = :id";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':id', $id);
$preparedStatement->bindParam(':validate_user', $validate_user);
$preparedStatement->execute();
}

function compare_date($connexion,$id, $date_now , $date_db){


	if ($date_db + 1800 > $date_now) {
		echo "compte desactivé";


	}else{
		echo "compte activé";
		email_validate($connexion, $id);
	}

}









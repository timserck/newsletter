<?php
session_start();
include "inc/connect.php";
include "inc/functions.php";
if (!$_SESSION && !$_SESSION['user'] == "admin") {
	header('Location: index.php');

}
$all_mail = get_mail($connexion);

if ($_POST) {
	$add_id =  nettoyage($_POST['id']);
	$add_mail =  nettoyage($_POST['mail']);
	$add_date =  nettoyage($_POST['date']);
	$add_privilege =  nettoyage($_POST['privilege']);

$result = update_mail($connexion, $add_id, $add_mail, $add_date, $add_privilege);
header('Refresh: 2; URL=platform.php');

}


include 'inc/template/header.php';
include 'inc/template/admin_page.php';
include 'inc/template/footer.php';



 ?>
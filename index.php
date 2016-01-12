<?php
session_start();
include "inc/connect.php";
include "inc/functions.php";

if ($_POST) {
  

  $mail=nettoyage($_POST['mail']);
  $password=nettoyage($_POST['password']);
  $result = admin_validation($connexion, $mail, $password);
  if ($result) {
  	$_SESSION['user'] = "admin";
  	header('Location: platform.php');
  
  }
  else{
  	echo "go back";
  }

}
include 'inc/template/header.php';
include 'inc/template/client_page.php';
include 'inc/template/footer.php';

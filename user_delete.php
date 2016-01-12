<?php
include "inc/connect.php";
include "inc/functions.php";

if ($_POST) {

$id = nettoyage($_POST['id']);
delete_mail($connexion, $id);
echo "l'id a bien été suprimer".$id;
header('Refresh: 2; URL=platform.php');
}else{

}


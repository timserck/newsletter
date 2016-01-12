<?php
include "inc/connect.php";
include "inc/functions.php";

if ($_GET) {

$id = nettoyage($_GET["id"]);
echo "compte creer";
$date_now = strtotime(date("Y-m-d H:i:s"));

$date_db = date_db($connexion, $id);
$date_db = strtotime($date_db[0]['date']);


compare_date($connexion,$id, $date_now , $date_db);


header('Refresh: 5; URL=index.php');
}else{

}
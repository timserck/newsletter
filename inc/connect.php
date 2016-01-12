<?php 
/* Connexion à une base ODBC avec l'invocation de pilote */
$host = 'localhost';
$dbname = 'exam_php';
$user = 'root';
$password = '';
try{

 $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
 $connexion = new PDO($dsn, $user, $password);
}catch(PDOException $e){
 echo $e->getMessage();
}
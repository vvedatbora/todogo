<?php 
session_start();


try{
	$db = new PDO('mysql:host=localhost;dbname=todogo;charset=utf8', 'root','');
}catch (PDOException $e){
	echo $e -> getMessage();
}
 ?>
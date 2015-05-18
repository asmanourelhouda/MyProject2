<?php

/**
 * Page index qui ce charge de dispatcher les affiche
 * @  mail : tech.neji.17@gmail.com
 */ 
session_start();
include_once 'Connextion.php';
ini_set('display_errors', '1');
define('WEBRT', dirname(__FILE__));  // On défini où se trouve le webroot
define('DROOT', dirname(realpath(__FILE__)).'/');
define('WEBRoot', 'http://192.168.2.102/MyProject');  // On défini la racine du projet
define('DS', DIRECTORY_SEPARATOR);  // On défini les spérateurs 
require 'librairie/loadall.php';
// connection système 
$cnx=  filter_input(INPUT_POST,'cnx'); 
if($cnx==1){

   $Login=  filter_input(INPUT_POST,'Login');
    $mdp=  filter_input(INPUT_POST,'mdp');
    $MsgConx=Con($Login, $mdp);
    if($MsgConx!=1){
        $_SESSION['msg']=$MsgConx;
        $_SESSION['type']="alert-danger";
    }else{
        $_SESSION['msg']='Bonjour '.$_SESSION['user']['login'];
         $_SESSION['type']="alert-success";
    }
}
// récupération des fichier et reperoire le lien index.php?page=chemain/du/fichier sans extation
$Pga = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);


$Dex = filter_input(INPUT_GET, 'task', FILTER_SANITIZE_STRING);
if ($Dex != "") {
    $Dex();
}
if ($Pga == '') {
    $Pga = 'default';
}
if (!file_exists("pages/" . $Pga . ".php")) {
    if (!file_exists("pages/" . $Pga . "/default.php")) {
       // $pgerecherch = "pages/" . $Pga . ".php";
        $Pga = '404';
    } else {
        $Pga = $Pga . "/default";
    }
}
if(!isset($_SESSION) || empty($_SESSION['user'])){
   ob_start();
$pages = ob_get_contents();
ob_end_clean();
include 'tpl/Login.php';
}else{
ob_start();
include "pages/" . $Pga . '.php';
$pages = ob_get_contents();
ob_end_clean();
if($Pga=="404"){
    include 'tpl/404.php';
}else{
    include 'tpl/tpl.php';
}
}

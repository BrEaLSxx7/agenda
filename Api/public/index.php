<?php
require_once './../libs/frontController.php';
require_once './../libs/dataSource.php';
$gestor=fopen('../config/.env', 'r');
$config=explode('
',fread($gestor,filesize("../config/.env")));
$driver = [];
foreach($config as $key=>$value){
		array_push($driver,explode("=",$value));
}
$app= new frontController($driver);
$app->run();
//$data=new dataSource($driver);

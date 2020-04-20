<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');

include_once __DIR__ . '/../models/post.php';

if($_REQUEST['action'] === 'index'){
  echo json_encode(Posts::all());
}





 ?>

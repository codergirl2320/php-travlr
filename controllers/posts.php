<?php

header('Content-Type: application/json');

include_once __DIR__ . '/../models/post.php';

if($_REQUEST['action'] === 'index'){
  echo json_encode(Posts::all());
}



 ?>

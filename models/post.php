<?php

$dbconn = null;
if(getenv('DATABASE_URL')){
    $connectionConfig = parse_url(getenv('DATABASE_URL'));
    $host = $connectionConfig['host'];
    $user = $connectionConfig['user'];
    $password = $connectionConfig['pass'];
    $port = $connectionConfig['port'];
    $dbname = trim($connectionConfig['path'],'/');
    $dbconn = pg_connect(
        "host=".$host." ".
        "user=".$user." ".
        "password=".$password." ".
        "port=".$port." ".
        "dbname=".$dbname
    );
} else {
    $dbconn = pg_connect("host=localhost dbname=travelposts");
}

class Post {
  public $id;
  public $title;
  public $body;
  public $location;
  public $image;
  public $year;
  public function __construct($id, $title, $body, $location, $image, $year) {
    $this->id = $id;
    $this->title = $title;
    $this->body = $body;
    $this->location = $location;
    $this->image = $image;
    $this->year = $year;
  }
}

class Posts {
  static function all(){
    $posts = array();

    $results = pg_query("SELECT * FROM posts");

    $row_object = pg_fetch_object($results);
    while($row_object !== false){
      var_dump($row_object);
      $row_object = pg_fetch_object($results);
    }

    die();

    return $posts;
  }
}

 ?>

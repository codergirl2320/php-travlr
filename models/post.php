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

    $post1 = new Post(1, 'title', 'body', 'Italy', 'url', 2008);
    $post2 = new Post(1, 'title', 'body', 'Italy', 'url', 2008);
    $post3 = new Post(1, 'title', 'body', 'Italy', 'url', 2008);

    $posts[] = $post1;
    $posts[] = $post2;
    $posts[] = $post3;

    return $posts;
  }
}

 ?>

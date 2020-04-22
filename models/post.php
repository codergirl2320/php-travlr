<?php

$dbconn = null;
if(getenv('DATABASE_URL')){
    $connectionConfig = parse_url(getenv('DATABASE_URL'));
    $conn = pg_connect(getenv("DATABASE_URL"));
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
    while($row_object){
      $new_post = new Post(
        intval($row_object->id),
        $row_object->title,
        $row_object->body,
        $row_object->location,
        $row_object->image,
        intval($row_object->year)
      );
      $posts[] = $new_post;
      $row_object = pg_fetch_object($results);
    }
    return $posts;
  }

  static function create($posts){
    $query = "INSERT INTO posts (title, body, location, image, year) VALUES ($1, $2, $3, $4, $5)";
    $query_params = array($posts->title, $posts->body, $posts->location, $posts->image, $posts->year);
    pg_query_params($query, $query_params);
    return self::all();
  }

  static function update($updated_post){
    $query = "UPDATE posts SET title = $1, body = $2, location = $3, image = $4, year = $5 WHERE id = $6";
    $query_params = array($updated_post->title, $updated_post->body, $updated_post->location, $updated_post->image, $updated_post->year, $updated_post->id);
    $results = pg_query_params($query, $query_params);
    return self::all();
  }

  static function delete($id){
    $query = "DELETE FROM posts WHERE id = $1";
    $query_params = array($id);
    $results = pg_query_params($query, $query_params);
    return self::all();
  }
}

 ?>

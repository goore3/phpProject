<?php

namespace app\models;

use app\core\Db;
class Movies {
  /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getAllMovies() {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, title, description, imdb_rating, release_year FROM movies');
    return $response;
  }


  public static function findMovie($text) {
    $conn = new Db();
    $response = $conn -> execQuery("
      SELECT id, title, description, imdb_rating, release_year
      FROM movies
      WHERE title LIKE '%". $text['search_text'] . "%' OR description LIKE '%" . $text['search_text'] . "%'
    ");
    return $response;
  }

//   $response = $conn -> execQuery("
//   SELECT id, title, description, imdb_rating, release_year
//   FROM movies
//   WHERE title='%". $text['search_text'] . "%' OR description='%" . $text['search_text'] . "%'
// ");
    /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getTop5MoviesByRating() {
    $conn = new Db();
    $response = $conn->execQuery('
    SELECT id, title, description, imdb_rating, release_year 
    FROM movies 
    ORDER BY imdb_rating DESC 
    LIMIT 5');
    return $response;
  }

  public static function insertMovie($movie) {
    $conn = new Db();
    $response = $conn->execQueryInsertOrDelete('
    INSERT INTO movies (title, description, imdb_rating, release_year) 
    VALUES ("'. $movie['title'] . '","'. $movie['description'] . '","' . $movie['imdb_rating'] . '","' . $movie['release_year'] .'")');
    return $response;
  }


  public static function updateMovie($movie, $id) {
    $conn = new Db();
    $response = $conn->execQueryInsertOrDelete('
    UPDATE movies set 
    title="'. $movie['title'] . '",description="' . $movie['description'] . '", imdb_rating="'. $movie['imdb_rating'] .'", release_year="'. $movie['release_year'] . '" 
    where id="' . $id . '"
    ');
    return $response;
  }

  public static function deleteMovieById(int $id) {
    $conn = new Db();
    $response = $conn->execQueryInsertOrDelete('
    DELETE FROM movies WHERE id=?;
    ',array('i', [$id]));
    return $response;
  }

  /**
  * Método para a obtenção de um Movie pelo id correspondente
  * @param    int     $id   Id. do movie
  *
  * @return   array
  */
  public static function findMovieById(int $id) {
    $conn = new Db();
    $response = $conn->execQuery('SELECT id, title, imdb_rating, description, release_year FROM movies WHERE id = ?', array('i', array($id)));
    return $response;
  }
}

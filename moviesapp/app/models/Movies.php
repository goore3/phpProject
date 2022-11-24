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
    $response = $conn->execQuery('SELECT id, title, imdb_rating, release_year FROM movies');
    return $response;
  }


  public static function findMovie($text) {
    $conn = new Db();
    $response = $conn -> execQuery("
      SELECT id, title, imdb_rating, release_year
      FROM movies
      WHERE title='". $text['search_text'] . "'
    ");
    return $response;
  }
    /**
  * Método para obtenção do dataset de todos os filmes
  *
  * @return   array
  */
  public static function getTop5MoviesByRating() {
    $conn = new Db();
    $response = $conn->execQuery('
    SELECT id, title, imdb_rating, release_year 
    FROM movies 
    ORDER BY imdb_rating DESC 
    LIMIT 5');
    return $response;
  }

  public static function insertMovie($movie) {
    $conn = new Db();
    $response = $conn->execQueryInsertOrDelete('
    INSERT INTO movies (title, imdb_rating) VALUES (?, ?)
    ',array('ss', [$movie['title'],$movie['imdb_rating']]));
    return $response;
  }


  public static function updateMovie($movie, $id) {
    $conn = new Db();
    $response = $conn->execQueryInsertOrDelete('
    UPDATE movies set title=?, imdb_rating=? where id=?
    ',array('ssi', [$movie['title'], $movie['imdb_rating'], $id]));
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
    $response = $conn->execQuery('SELECT id, title, imdb_rating, release_year FROM movies WHERE id = ?', array('i', array($id)));
    return $response;
  }
}
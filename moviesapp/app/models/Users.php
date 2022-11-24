<?php

namespace app\models;

use app\core\Db;
class Users {
    public static function checkUser($username) {
        $conn = new Db();
        $response = $conn -> execQuery("
            SELECT username 
            FROM users
            WHERE username = ?
        ", array('s',[$username]));
        return $response;
    }

    public static function checkPassword($username, $password) {
        $conn = new Db();
        $response = $conn -> execQuery("
            SELECT username 
            FROM users
            WHERE username = ? AND password = ?
        ", array('ss',[$username,$password]));
        return $response;
    }

    public static function createUser($username, $password) {
        $conn = new Db();
        $response = $conn -> execQueryInsertOrDelete('
        INSERT INTO users (username, password)
        VALUES (?,?)
        ',array('ss', [$username, $password]));
        return $response;   
    }

    public static function loginUser($username, $password) {
        $conn = new Db();
        $response = $conn -> execQuery('
            SELECT username, role 
            FROM users
            WHERE username = ? AND password = ?
        ', array('ss',[$username,$password]));
        session_start();
        $_SESSION['username'] = $response[0]['username'];
        $_SESSION['role'] = $response[0]['role'];
    }

};
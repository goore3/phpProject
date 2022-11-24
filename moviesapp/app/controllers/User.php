<?php
use app\core\Controller;
use app\services\UploaderService;

class User extends Controller {
  // invocação da view index.php de /home
  public function index() {
    
    $Movies = $this->model('Movies'); // é retornado o model Movies()
    $data = $Movies::getTop5MoviesByRating();

    $this->view('user/register', ['movies' => $data]);
  }

  public function register() {
    $Users = $this->model('Users');
    if($_POST) {
        $user = $_POST;
        $alerts = array();
        if(strlen($user['username'])<6) {
            array_push($alerts, "Username field needs to have 6 or more characters");
        }
        if(strlen($user['password'])<6) {
            array_push($alerts, "Password field needs to have 6 or more characters");
        }
        if(strlen($user['password_repeat'])<6) {
            array_push($alerts, "Repeat password field needs to have 6 or more characters");
        }
        if(strcmp($user['password'],$user['password_repeat']) != 0) {
            array_push($alerts, "Password and Repeat Password is not identical");
        }
        if(!empty($Users::checkUser($user['username']))){
            array_push($alerts, "This user already exists");
        }
        if(!empty($alerts)) {
            $this->view('user/register', ['alerts' => $alerts]);
            exit;
        } else {
            $Users::createUser($user['username'], $user['password']);
            $Users::loginUser($user['username'], $user['password']);
            // header("Location: " . PROJECT_URL . "/movie/index");
            exit;
        }
    }
    
    $this->view('user/register', ['alerts' => []]);
  }

  public function login() {
    $Users = $this -> model('Users');
    if($_POST) {
        $user = $_POST;
        $alerts = array();
        if(strlen($user['username'])<6) {
            array_push($alerts, "Username field needs to have 6 or more characters");
        }
        if(strlen($user['password'])<6) {
            array_push($alerts, "Password field needs to have 6 or more characters");
        }
        if(empty($Users::checkUser($user['username']))){
            array_push($alerts, "This user doesnt exist");
        } else if(empty($Users::checkPassword($user['username'],$user['password']))){
            array_push($alerts, "Password incorrect");
        }
         
        if(!empty($alerts)) {
            $this->view('user/login', ['alerts' => $alerts]);
            exit;
        } else {
            $Users::loginUser($user['username'], $user['password']);
            header("Location: ".PROJECT_URL."/movie/index");
            exit;
        }
    }
    $this -> view('user/login', ['alerts'=> []]);
  } 
  public function logout() {
    session_start();
    if(isset($_SESSION['username'])) {
        session_destroy();
        header("Location: ".PROJECT_URL."/movie/index");
        exit;
    } else {
        header("Location: ".PROJECT_URL."/user/login");
        exit;
    }
  }
}

?>
<?php
use app\core\Controller;

class Home extends Controller {
  // invocação da view index.php de /home
  public function index() {
    
    $Movies = $this->model('Movies'); // é retornado o model Movies()
    $data = $Movies::getTop5MoviesByRating();

    $this->view('home/index', ['movies' => $data]);

    //$this->view('home/index');
  }
}

?>
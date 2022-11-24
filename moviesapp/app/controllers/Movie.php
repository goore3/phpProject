<?php
use app\core\Controller;
use app\services\UploaderService;

class Movie extends Controller {
  /**
  * Invocação da view index.php
  */
  public function index() {
    $Movies = $this->model('Movies');
    $data = $Movies::getAllMovies();
    $this->view('movie/index', ['movies' => $data]);
  }

  public function search() {
    $Movies = $this->model('Movies');
    if($_POST) {
      $text = $_POST;
      $data = $Movies::findMovie($text);
      $this -> view('movie/search', ['movies' => $data]);
    }
  }

  public function create() {
    
    if($_POST) {
      $movie = $_POST;
    
      $Movies = $this->model('Movies');
      $Movies::insertMovie($movie);

      header("Location: ".PROJECT_URL."/movie");
      exit;
    }

    $Movies = $this->model('Movies');
    $data = $Movies::getAllMovies();

    $this->view('movie/create', ['movies' => $data]);
  }

  /**
  * Invocação da view get.php
  *
  * @param  int   $id   Id. movie
  */
  public function get($id = null) {
    if (is_numeric($id)) {

      $Movies = $this->model('Movies');
      $data = $Movies::findMovieById($id);
      $this->view('movie/get', ['movies' => $data]);
    } else {
      $this->pageNotFound();
    }
  }


  public function delete($id = null) {
    if (is_numeric($id)) {

      $Movies = $this->model('Movies');
      $Movies::deleteMovieById($id);
      
      header("Location: ".PROJECT_URL."/movie/index");
      exit;
    } else {
      $this->pageNotFound();
    }
  }

  

  public function update($id = null) {
    if($_POST) {
      $movie = $_POST;
    
      $Movies = $this->model('Movies'); // é retornado o model Movies()
      $Movies::updateMovie($movie, $id);

      header("Location: ".PROJECT_URL."/movie/index");
      exit;
    }
    if (is_numeric($id)) {
      
      $Movies = $this->model('Movies');
      $data = $Movies::findMovieById($id);

      $this->view('movie/update', ['movies' => $data, 'id'=>$id ]);


    } else {
      $this->pageNotFound();
    }
  }

  public function upload() {

    // necessita de ter um input do tipo texto/number
    if($_POST) {
      $uploaderService = new UploaderService();

      if(count($_FILES['files']['name']) > 1) {
        $uploaderService->upload($_FILES['files']);
      } else {
        $uploaderService->uploadFile($_FILES['file']);
      }
      exit;
    }
    $Movies = $this->model('Movies'); // é retornado o model Movies()
    
    $this->view('movie/upload', []);
  }

}

// :: Scope Resolution Operator
// Utilizado para acesso às propriedades e métodos das classes
?>
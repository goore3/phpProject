<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
      <h1>Login into your account:</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <form method="POST" action="<?php echo PROJECT_URL; ?>/user/login">
            <label>Username:</label>
            <input required type="text" name="username">
            <br>
            <br>
            <label>Password:</label>
            <input required type="password" name="password"><br>
            <button type="submit">Login</button>
        </form> 
      </div>
      <div>
        Dont have an account? 
      </div>
      <a href="<?php echo PROJECT_URL; ?>/user/register">Register</a>
    </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>

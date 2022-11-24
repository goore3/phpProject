<?php
  require SERVER_PATH.'\app\views\_includes\header.php';
?>

    <div class="container">
    
        <h1>Register your account:</h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">

        <form method="POST" action="<?php echo PROJECT_URL; ?>/user/register">
            <label>Username:</label>
            <input required type="text" name="username">
            <br>
            <br>
            <label>Password:</label>
            <input required type="password" name="password">
            <br>
            <br>
            <label>Repeat Password:</label>
            <input required type="password" name="password_repeat">
            <button type="submit">Create User</button>
        </form> 

      </div>
      
    </div>

<?php
  require SERVER_PATH.'\app\views\_includes\footer.php';
?>
<?php 

  require_once 'function/koneksi.php'; 

  session_start();

  if(isset($_SESSION['user'])){
    header('Location: index.php');
  } 

  $error = '';

  if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];


    if(!empty(trim($username)) && !empty(trim($password))){

      $sql = "SELECT * FROM user WHERE username='$username'";
      $query = mysqli_query($koneksi, $sql);
    
      if(mysqli_num_rows($query) != 0){

        $row = mysqli_fetch_assoc($query);

        if(password_verify($password, $row['password'])){

          $_SESSION['user'] = $row['username'];
          header('Location: index.php');

        }else{
          $error = 'username atau password salah';
        }
        

      }else{
        $error = 'username belum ada';
      }

    }else{
      $error = 'Data tidak boleh kosong';
    }
  
  }


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/signin.css">
</head>
<body class="text-center">

  <form class="form-signin" action="" method="post">
    <img class="mb-4" src="" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Login User</h1>

    <?php if($error) : ?>
    <div class="alert alert-danger">
      <?php echo $error; ?>
    </div>
    <?php endif; ?>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>
  </form>

</body>
</html>

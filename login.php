<?php
  //memulai session
  session_start();

  //jika ada session, maka akan diarahkan ke halaman dashboard admin
  if(isset($_SESSION['id_user'])){
      //mengarahkan ke halaman dashboard admin
      header("Location: ./index.php");
      die();
  }

  include "config.php";
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      html,
      body {
        height: 100%;
      }
      body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }
      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>

    <title>Login</title>
  </head>
  <body>
    <?php
    //apabila tombol login di klik akan menjalankan skript dibawah ini
    if(isset($_REQUEST['login'] ) ){

      //mendeklarasikan data yang akan dimasukkan ke dalam database
      $username = $_REQUEST['username'];
      $password = $_REQUEST['password'];

      //skript query ke insert data ke dalam database
      $sql = mysqli_query($conn, "SELECT id_user, username FROM users WHERE username='$username' AND password=MD5('$password')");

      //jika skript query benar maka akan membuat session
      if($sql){
        list($id_user, $username) = mysqli_fetch_array($sql);

        //membuat session
        $_SESSION['id_user'] = $id_user;
        $_SESSION['username'] = $username;

        header("Location: ./index.php");
        die();
      } else {
        $_SESSION['err'] = '<strong>ERROR!</strong> Username dan Password tidak ditemukan.';
        header('Location: ./');
        die();
      }

    } else {
    ?>
    <form class="form-signin" method="post" action="" role="form">
      <?php
      if(isset($_SESSION['err'])){
        $err = $_SESSION['err'];
        echo '<div class="alert alert-warning alert-message">'.$err.'</div>';
              unset($_SESSION['err']);
      }
      ?>
      <h1 class="mb-3 font-weight-normal"><center>Login</center></h1>
      <label class="sr-only">Username</label>
      <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
      <label class="sr-only">Password</label>
      <input type="password" class="form-control" placeholder="Password" name="password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
    </form>
    <?php
      }
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(".alert-message").alert().delay(3000).slideUp('slow');
    </script>
  </body>
</html>
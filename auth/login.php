<?php
        require_once "../_config/config.php";

            if (isset($_SESSION['user'])){
                echo "<script> window.location='".base_url('')."'; </script>" ;
            } else {}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('css/custom.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url('css/signin.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/bootstrap-social.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('css/font-awesome.css')?>">
  </head>


  <body class="text-center">
    <div class="container" style="max-width: 800px">
      <div class="row justify-content-center">
        <ul class="list-unstyled components">
          <li>
            <img src="<?=base_url('images/logo.png')?>" style="width: 150px;">
          </li>
          <li>
            <h1 class="h6 font-weight-bold">"Belajar dengan bar-bar tanpa ribet"</h1>
          </li>
        </ul>
      </div>

      <div class="row">

      <?php
                    if(isset($_POST['login'])){
                        $user = trim(mysqli_real_escape_string($con,$_POST['username']));
                        $pass = sha1(trim(mysqli_real_escape_string($con,$_POST['kata-sandi'])));
                        $sql_login = mysqli_query($con,"select * from tb_username where username = '$user' and password = '$pass'") or die (mysqli_error($con)); 
                        if (mysqli_num_rows($sql_login) > 0){
                            $_SESSION['user'] = $user ; 
                            echo "<script> window.location='".base_url('')."'; </script>" ;
                        } else {    ?>
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-3">
                                        <div class= "alert alert-danger alert-dismissable">
                                            <a href="#" class= "close" data-dismiss = "alert" aria-label="close">&times;</a> 
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <strong>Gagal Login!!</strong> Username/password salah
                                        </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
            
            ?>
        <form class="form-signin" action="dashboard.html">
          <h1 class="h5 font-weight-normal">Sudah punya akun?<br>Masuk disini!</h1>
          <label for="inputEmail" class="sr-only">E-mail</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<!--       <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div> -->
          <button class="btn btn-lg btn-primary btn-block form-control" type="submit">Masuk</button>
          <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
          <h1 class="h5 font-weight-normal">atau</h1>
          <a class="btn btn-block btn-social btn-google py-1" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-md']);" style="color: white"><i class="fa fa-google"></i>Sign in with Google</a>
          <a class="btn btn-block btn-social btn-facebook py-1" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-md']);" style="color: white"><i class="fa fa-facebook"></i>Sign in with Facebook</a>
          <hr>
          <p style="text-align: left;"><a href="#">Lupa password?</a><br>atau belum punya akun?</p>
          <p>Daftar sebagai...</p>
          <div class="row">
            <div class="col">
              <a class="nav-link btn btn-primary" href="#">Pelajar</a>
            </div>
            <div class="col">
              <a class="nav-link btn btn-warning" href="#">Pengajar</a>
            </div>
          </div>

        </form>
      </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


  </body>
</html>

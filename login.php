<?php include "koneksi.php"; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary" style="background-image: url('https://media.suara.com/pictures/970x544/2018/09/27/43335-gedung-pencakar-langit.jpg');">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="user" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="pass" name="password" placeholder="***********">
                    </div>
                    <div class="form-group">
                      <select name="level" style="border-radius: 20px;" class="form-control">
                        <option value="">Level</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <?php  
                    if (isset($_POST['login'])) {
                      $user = $_POST['username'];
                      $pass = $_POST['password'];
                      $level = $_POST['level'];

                      $data = $koneksi->query("SELECT * FROM user WHERE username = '$user' AND password = '$pass' AND level = '$level'");
                      $data_akun = $data->num_rows;
                      if ($data_akun == 1) {
                        $akun = $data->fetch_assoc();
                        $_SESSION['user'] = $akun;
                        echo "<script>document.location='index.php';</script>";
                      } else 
                      {
                        echo "<div class='alert alert-danger text-center'>Username atau Password Salah !</div>";
                      }
                    }
                  ?>
                  <hr>
                  <div class="text-center">
                    <p>Copyright &copy; 2022 Ap-Arsip</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

  
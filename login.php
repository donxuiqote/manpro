<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link href="login.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
            <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootst
rap.min.css"
            rel="stylesheet"
            integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous">
        </head>
    <body  style="background-color: #eee;">

        <?php
session_start();
?>
<?php include('navbar.php')?>
    
<section class="container py-5">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <h4 class="mt-1 mb-5 pb-1 fw-bold">Welcome to NEWS</h4>
                </div>
                <form action="loginproccess.php" method="post">
                  <p>Silahkan login menggunakan akun anda</p>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="id">ID</label>
                    <input type="text" name="id" id="id" class="form-control"
                      placeholder="Masukkan ID anda" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password_user">Password</label>
                    <input type="password" name="password_user" id="password_user" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                   <button type="submit" class="btn btn-dark" name="login" id="btn">Login</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<script src="js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
       if (isset($_SESSION['status'])&& $_SESSION['status']!='')
       {
           ?> 
           <script>
               swal.fire({
                   title:"<?php echo $_SESSION['status']; ?>",
                   icon:"<?php echo $_SESSION['icon']; ?>",
                   text:"<?php echo $_SESSION['text']; ?>",
               })
           </script>
           <?php
           unset($_SESSION['status']);
           unset($_SESSION['icon']);
           unset($_SESSION['text']);
       }
       ?>

    </body> 
</html
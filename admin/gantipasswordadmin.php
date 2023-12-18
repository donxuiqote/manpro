<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <style>
    #menu a:hover {
      backdrop-filter: blur(10px) saturate(180%);
      -webkit-backdrop-filter: blur(10px) saturate(180%);
      background-color: rgba(156, 156, 165, 0.78);
    }

    .container {
      display: flex;
      justify-content: center;
      flex-direction: row;
    }

    .card-body {
      background-color: #e4dfdf;
    }
  </style>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['login'])) {
    header("location:../login.php");
    exit;
  }
  include "../koneksi.php";
  $query = mysqli_query($koneksi, "SELECT * FROM  user WHERE id='$_SESSION[id]'");
  $data = mysqli_fetch_array($query);
  ?>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-3 bg-dark">
        <?php include('sidebar.php') ?>
      </div>
      <div class="col-9">
        <div class="row flex-nowrap">
          <div class="col py-5">

            <div class="container py-5">
              <div class="card" style="height:500px; margin-top:50px; width:400px;">
                <div class="card-body">
                  <form action="gantipasswordadminprocces.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                      <label for="currentPassword" class="form-label">Password Lama</label>
                      <input type="password" name="currentPassword" id="currentPassword" class="form-control" require="required">
                    </div>
                    <div class="mb-4">
                      <label for="newPassword" class="form-label">Password Baru</label>
                      <input type="password" name="newPassword" id="newPassword" class="form-control" require="required">
                    </div>
                    <div class="mb-4">
                      <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                      <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" require="required">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-dark" name="submit">Konfirmasi</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <script src="../js/bootstrap.min.js"></script>
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <?php
          if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
          ?>
            <script>
              swal.fire({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['icon']; ?>",
                text: "<?php echo $_SESSION['text']; ?>"
              })
            </script>
          <?php
            unset($_SESSION['status']);
            unset($_SESSION['icon']);
            unset($_SESSION['text']);
          }
          ?>
</body>

</html>
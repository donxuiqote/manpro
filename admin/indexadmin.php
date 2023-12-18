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
    html{
      height: 100%;
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

      <div class="col py-3 ">
        <?php include('navbar.php') ?>
        <?php
        $level = "admin";
        include "../koneksi.php";
        $data = mysqli_fetch_array($query);
        $dataadmin = $koneksi->query("SELECT COUNT(*) as jumlah FROM user WHERE level_user='$level'")->fetch_assoc();
        $databerita = $koneksi->query("SELECT COUNT(*) as jumlah FROM berita")->fetch_assoc();

        ?>
        <section class="content py-5">
          <div class="container-fluid">
            <div class="row p-5 ">
              <div class="col-lg-3 col-6 ">
                <div class="small-box bg-info">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Admin</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $dataadmin['jumlah'] ?> <i class="bi bi-people-fill"></i></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Berita</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $databerita['jumlah'] ?> <i class="bi bi-list-columns"></i></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Admin</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $dataadmin['jumlah'] ?> <i class="bi bi-people-fill"></i></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Berita</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $databerita['jumlah'] ?> <i class="bi bi-list-columns"></i></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Admin</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $dataadmin['jumlah'] ?> <i class="bi bi-people-fill"></i></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                  <div class="inner" style="margin-top:10px; height:100px;">
                    <h4 style="text-align:center;">Jumlah Berita</h4>
                    <h1 class="fw-bold" style="text-align:center;"><?= $databerita['jumlah'] ?> <i class="bi bi-list-columns"></i></h1>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </section>
      </div>
      <script src="../js/bootstrap.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <?php
      if (isset($_SESSION['berhasil']) && $_SESSION['berhasil'] != '') {
      ?>
        <script>
          swal.fire({
            title: "Login Sukses",
            icon: "success"
          })
        </script>
      <?php
        unset($_SESSION['berhasil']);
      }
      ?>
    </div>
  </div>
</body>

</html>
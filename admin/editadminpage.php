
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <style>
        #menu a:hover{
    backdrop-filter: blur(10px) saturate(180%);
    -webkit-backdrop-filter: blur(10px) saturate(180%);
    background-color: rgba(156, 156, 165, 0.78);
        }
  
      </style>
    </head>
    <body>
        <?php
	    session_start();
   if(!isset($_SESSION['login'])){
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
                    <div class="col py-3">

                        <?php include('navbar.php') ?>
        <?php
if (isset($_GET['id'])) {
include "../koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE 
id='$id'");
$data = mysqli_fetch_array($query);
?>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold text-white">Edit Data Admin</h2>
                                <a href="menudataadminpage.php" class="btn btn-secondary fw-bold">Daftar Data Admin</a>
                            </div>
                        </div>
                        <div class="card">
                        <div class="card-body" style="background-color:#e4dfdf;" >
                            <form action="editproccessadmin.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="mb-4">
                                    <label for="username" class="form-label">Username</label>
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="form-control"
                                        value="<?= $data['username'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" disabled value="<?=
                                    $data['email'] ?>">
                                </div>
                                <div class="mb-4">
                                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jeniskelamin" id="jeniskelamin" class="form-select">
                                        <option
                                            value="Laki-Laki"
                                            <?= $data['jeniskelamin'] == "Laki-Laki" ? "Selected" : "" ?>>Laki-Laki</option>
                                        <option
                                            value="Perempuan"
                                            <?= $data['jeniskelamin'] == "Perempuan" ? "Selected" : "" ?>>Perempuan</option>
                                    </select>
                                </div>
                               <input type="hidden" id="pekerjaan" name="pekerjaan" value="admin">
                                <div class="mb-4">
                                    <label for="gambar_berita" class="Thumbnail">Foto Profile</label>
                                    <br>
                                    <img
                                        src="../images/<?= $data['thumbnail'] ?>"
                                        class="img-fluid img-thumbnail my-3"
                                        width="100">
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                </div>
                                <div class="text-center">
                                <button type="submit" name="edit" class="btn btn-dark">Edit</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script src="../js/bootstrap.min.js"></script>
    </body>
</html>
<?php
}
?>
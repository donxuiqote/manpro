<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
    <div class="col py-3" style="display:flex; justify-content:center;">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="fw-bold text-white">Tambah Data Admin</h2>
                                <a href="menudataadminpage.php" class="btn btn-secondary fw-bold">Daftar Data Admin</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body" style="background-color:#e4dfdf;">
                              <form action="tambahadminproses.php" method="post"enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="id" class="form-label">USER ID</label>
                                    <input type="text" name="id" id="id" class="form-control" required="required" autocomplete="off">
                                </div>
                                <div class="mb-4">
                                    <label for="usename" class="form-label">Name</label>
                                    <input
                                        type="text"
                                        name="username"
                                        id="username"
                                        class="form-control"
                                        required="required">
                                </div>
                                  <input type="hidden" id="pekerjaan" name="pekerjaan" value="admin"       >
                                <div class="mb-4">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="email"
                                        class="form-control"
                                        required="required">
                                </div>
                                   <div class="mb-4">
                                    <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                    <select name="jeniskelamin" id="jeniskelamin" class="form-select">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="form-label">Password</label>
                                    <input
                                        type="password"
                                        name="password"
                                        id="password"
                                        class="form-control"
                                        required="required">
                                </div>
                                <div class="mb-4">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        name="confirm_password"
                                        id="confirm_password"
                                        class="form-control"
                                        required="required">
                                </div>
                                <div class="mb-4">
                                  <label for="thumbnail" class="Thumbnail">Thumbnail</label>
                                  <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                </div>
                                <div class="text-center">
                                <input type="hidden" id="level" name="level" value="admin"       >
                                <button type="submit" class="btn btn-dark text-white" name="registeradmin">Register</button>
                                </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/bootstrap.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <?php
   if (isset($_SESSION['status'])&& $_SESSION['status']!='')
   {
       ?> 
       <script>
           swal.fire({
               title:"<?php echo $_SESSION['status'];?>",
               icon:"<?php echo $_SESSION['icon'];?>",
               text:"<?php echo $_SESSION['text'];?>"
           })
       </script>
       <?php
       unset($_SESSION['status']);
       unset($_SESSION['icon']);
       unset($_SESSION['text']);
   }
   ?>
                            <body>
                                </html>
                                
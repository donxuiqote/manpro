<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita Page</title>
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
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header" style="background-color:black;">
                            <div class="d-flex justify-content-between">
                                <h2 class="text-white fw-bold">Tambah Berita</h2>
                                <a href="databeritapage.php" class="btn btn-secondary fw-bold">Daftar Berita</a>
                            </div>
                        </div>
                        <div class="card-body" style="background-color:#e4dfdf;">
                            <form action="tambahprosesberita.php" method="post" enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="judul_berita" class="form-label">Judul Berita</label>
                                    <input type="text" name="judul_berita" id="judul_berita" class="form-control">
                                </div>
                                 <div class="mb-4">
                                    <label for="penulis_berita" class="form-label">Penulis Berita</label>
                                    <input type="text" name="penulis_berita" id="penulis_berita" class="form-control">
                                </div>
                                <div class="mb-4">
                                    <label for="isi_berita" class="form-label">Content</label>
                                    <textarea name="isi_berita" id="isi_berita" class="form-control"></textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="id_kategori" class="category">Category</label>
                                    <select name="id_kategori" id="id_kategori" class="form-select">
                                        <option value="1">Tokoh</option>
                                        <option value="2">Kegiatan Sekolah</option>
                                        <option value="3">Pendidikan Internasional</option>
                                        <option value="4">Teknologi Digital</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                <label for="tgl_berita">Tanggal</label>
                                <input type="date" name="tgl_berita" value="<?php echo date('Y-m-d'); ?>" />
                                </div>
                                <div class="mb-4">
                                    <label for="gambar_berita" class="Thumbnail">Thumbnail</label>
                                    <input type="file" name="gambar_berita" id="gambar_berita" class="form-control">
                                </div>
                                <div class="text-center">
                                <button type="submit" name="add" class="btn btn-dark">Tambah</button>
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
    </body>
</html>
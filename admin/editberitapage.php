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
        #menu a:hover {
            backdrop-filter: blur(10px) saturate(180%);
            -webkit-backdrop-filter: blur(10px) saturate(180%);
            background-color: rgba(156, 156, 165, 0.78);
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
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark ">
                <?php include('sidebar.php') ?>
            </div>
            <div class="col py-3">
<?php include('navbar.php')?>
                <?php
                if (isset($_GET['id_berita'])) {
                    include "../koneksi.php";
                    $id_berita = $_GET['id_berita'];
                    $query = mysqli_query($koneksi, "SELECT * FROM berita WHERE 
id_berita='$id_berita'");
                    $data = mysqli_fetch_array($query);
                ?>
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0">
                                    <div class="card-header" style="background-color:black;">
                                        <div class="d-flex justify-content-between">
                                            <h2 class="text-white fw-bold">Edit Berita</h2>
                                            <a href="databeritapage.php" class="btn btn-secondary fw-bold">Daftar Berita</a>
                                        </div>
                                    </div>
                                    <div class="card-body" style="background-color:#e4dfdf;">
                                        <form action="editproccessberita.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_berita" value="<?= $id_berita ?>">
                                            <div class="mb-4">
                                                <label for="judul_berita" class="form-label">Judul Berita</label>
                                                <input type="text" name="judul_berita" id="judul_berita" class="form-control" value="<?= $data['judul_berita'] ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="penulis_berita" class="form-label">Penulis Berita</label>
                                                <input type="text" name="penulis_berita" id="penulis_berita" class="form-control" value="<?= $data['penulis_berita'] ?>">
                                            </div>
                                            <div class="mb-4">
                                                <label for="isi_berita" class="form-label">Isi Berita</label>
                                                <textarea name="isi_berita" id="isi_berita" class="form-control"><?=
                                                                                                                    $data['isi_berita'] ?></textarea>
                                            </div>
                                            <div class="mb-4">
                                                <label for="id_kategori" class="form-label">Kategori</label>
                                                <select name="id_kategori" id="id_kategori" class="form-select">
                                                    <option value="1" <?= $data['id_kategori'] == "1" ? "Selected" : "" ?>>tokoh</option>
                                                    <option value="2" <?= $data['id_kategori'] == "2" ? "Selected" : "" ?>>Kegiatan Sekolah</option>
                                                    <option value="3" <?= $data['id_kategori'] == "3" ? "Selected" : "" ?>>Pendidikan Internasional</option>
                                                    <option value="4" <?= $data['id_kategori'] == "4" ? "Selected" : "" ?>>Teknologi Digital</option>
                                                </select>
                                            </div>
                                            <div class="mb-4">
                                                <label for="tgl_berita">Tanggal</label>
                                                <input type="date" name="tgl_berita" value="<?php echo date('Y-m-d'); ?>" />
                                            </div>
                                            <div class="mb-4">
                                                <label for="gambar_berita" class="Thumbnail">Thumbnail</label>
                                                <br>
                                                <img src="../images/<?= $data['gambar_berita'] ?>" class="img-fluid img-thumbnail my-3" width="100">
                                                <input type="file" name="gambar_berita" id="gambar_berita" class="form-control">
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
            <script src="../js/bootstrap.min.js"></script>
</body>

</html>
<?php
                }
?>
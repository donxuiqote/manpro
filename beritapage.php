<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
     <link rel="stylesheet" href="assets/style/style.css">
     <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<?php include('navbar.php') ?>
<section id="content">
      <div class="container">
          <div class="card" style="margin-top:10px;">
<?php 
include "koneksi.php";
    $id = $_GET['id_berita'];
    $query = mysqli_query($koneksi,"SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE id_berita='$id'");
    $data = mysqli_fetch_array($query);
?>

          <div class="row" style="background-color:#eee">
          <div class="card-header" style="background-color:black;">
                 <h1 class="fw-bold text-center text-white">NEWS</h1>
          </div>
                <div class="col-sm">
                  <div class="media">
                    <div class="media-title text-center" style="margin-top:20px; margin-bottom:20px;">
                        <h2 class="mt-0 fw-bold"><?= $data['judul_berita'] ?></h2>
                    </div>
                    <div class="w-100 text-center">
                        <img src="images/<?= $data['gambar_berita']?>" alt="" class="image-artikel">
                    </div>
                    <div class="text-center" style="margin-top:10px;">
                        <p class="mt-0 ">Kategori :   <?= $data['nama_kategori'] ?></p>
                        <small class="mt-0">Penulis : <?= $data['penulis_berita'] ?></small> |
                        <small class="mt-0">Publish : <?= $data['tgl_berita'] ?></small>
                    </div>
                    <hr>
                    <div class="media-body">
                     <?php 
                              echo'<p class="category_text lead fw-normal" style="text-align:justify; margin:15px;"' 
                            . implode('.</p><p class="category_text lead fw-normal" style="text-align:justify; margin:15px;">', explode('. ',$data['isi_berita'] ))
                            .'</p>';
                        ?>
                    </div>
                  </div>
                <hr>
                <h3>Berita Lainnya</h3>
                <div class="row row-cols-1 row-cols-md-2 row-cols-1 row-cols-lg-3 g-3 g-lg-2 m-0 w-100" style="padding-bottom:15px;">
        <?php
        $nama=$data['nama_kategori'];
            $qry= $koneksi->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori ORDER BY RAND() LIMIT 3");
          
            while ($data=mysqli_fetch_array($qry))  {  
        ?>
                <div class="col">
                    <div class="card border-0 h-100 mb-1 mb-md-3">
                        <span class="label-category p-1"><?=$data['nama_kategori']?></span>
                        <img src="images/<?=$data['gambar_berita']?>" alt="" class="thumbnail-latets" style="width:100%;">
                        <div class="card-body p-0" style="background-color:black;">
                            <p class="card-title-latets mb-2 mb-md-2 multi-line-truncate text-white" style="margin:15px;"><?=$data['judul_berita']?></p>
                            <a href="beritapage.php?id_berita=<?= $data['id_berita'] ?>"class="stretched-link"></a>
                            <div class="d-flex justify-content-between" style="margin:15px;">
                                <small class="text-white"><?= $data['tgl_berita']?></small>
                                <small class="text-white"><?= $data['penulis_berita']?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
                ?>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "footer.php";
?>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
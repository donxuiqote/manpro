<?php
$limit = 5;  
if (isset($_GET["page"])) {
	$page  = $_GET["page"]; 
	} 
	else{ 
	$page=1;
	};  
$start_from = ($page-1) * $limit;  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <style>
    .card{
      border:none;
    }
    .card-title a{
      text-decoration:none;
      color:black;
    }
   .card-title a:hover{
      color:blue!important
    }
    .table a{
      text-decoration:none;
      color:black
    }
    .table a:hover{
      color:blue;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><h2>EduCendekia</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="event_pendidikan.php">Event Pendidikan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="karya_tulis.php">Karya Tulis</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kategori Berita
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="tokoh.php">Tokoh</a></li>
                        <li><a class="dropdown-item" href="kegiatan_sekolah.php">Kegiatan Sekolah</a></li>
                        <li><a class="dropdown-item" href="pendidikan_internasional.php">Pendidikan Internasional</a></li>
                        <li><a class="dropdown-item" href="teknologi_digital.php">Teknologi Digital</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
            <form class="d-flex" role="search" method="post">
                <input class="form-control me-2" type="text" name="keyword" placeholder="Cari Judul Berita" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit" name="cari"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>
</nav>
        <section id="content">
        <div class="container py-5" style="margin-top:50px;">
             <div id="content-news" class="row">
<div class="py-3 pb-3">
<p > <h1>
        We cover inequality and innovation in education with in-depth journalism that uses research, data and stories from classrooms and campuses to show the public how education can be improved and why it matters.
        </h1></p>
</div>
             

                <div class="col-12 col-md-8">
                    <h3 class="fw-bold">BACA BERITA</h3>
                    <hr>
                        <?php 
                          include "koneksi.php";
                        error_reporting(0);
$no = 1;
$keyword=$_POST['keyword'];

    if ($keyword !=''){
       $result = mysqli_query($koneksi, "SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori WHERE judul_berita LIKE '%$keyword%' LIMIT $start_from, $limit");
    }
          else{
            $result = mysqli_query($koneksi,"SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori ORDER BY RAND() LIMIT $start_from, $limit");
          }
            while ($data=mysqli_fetch_array($result))  {  
        ?>
                    <div class="card border-0 w-100">
                      
                        <div class="row g-0 align-items-center">
                            <div class="col-md-4 col-4 position-relative">
                                <img src="images/<?=$data['gambar_berita']?>" class="img-fluid rounded my-auto" style="width:100%; height:100%;">
                            </div>
                            <div class="col-md-8 col-8">
                                <div class="card-body p-2 p-md-3">
                                    <span class="text-danger fw-bold list-label"><?=$data['nama_kategori']?></span>
                                    <h5 class="card-title multi-line-truncate list-judul my-lg-4"><?=$data['judul_berita']?></h5>
                                    <a href="beritapage.php?id_berita=<?= $data['id_berita'] ?>"class="stretched-link"></a>
                                    <small class="text-muted penulis me-4"><?=$data['penulis_berita']?></small>
                                    <small class="text-muted"><?=$data['tgl_berita']?></small>
                                </div>
                            </div>
                        </div>
                        <hr class="m-2">
                    </div> 
                      <?php
        }
        ?>
        <?php  

$result_db = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM berita"); 
$row_db = mysqli_fetch_row($result_db);  
$total_records = $row_db[0];  
$total_pages = ceil($total_records / $limit); 
/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'><a class='page-link bg-dark text-white' href='index.php?page=".$i."'>".$i."</a></li>";	
}
echo $pagLink . "</ul>";  
?>

            </div>
         <div class="col-md-4 border-start d-none d-md-block">
                    <h3 class="fw-bold">Berita Terbaru</h3>
                    <hr>
                    <table class="table table-striped border" style="border-radius:15px;">
                      <?php
                      $no=1;
                           include "koneksi.php";
            $query= $koneksi->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori=kategori.id_kategori  ORDER BY tgl_berita DESC LIMIT 10");
            while ($data=mysqli_fetch_array($query))  {  
                      ?>
                        <tr>
                            <th scope="row"><?=$no++?></th>
                            <td>
                                <span class="fw-bold text-dark"><?= $data['nama_kategori']?></span>
                                <br>
                                <a href="beritapage.php?id_berita=<?= $data['id_berita'] ?>" class="multi-line-truncate mb-0 mt-2"><?=$data['judul_berita']?></a>
                            </td>
                        </tr>
                     
                     <?php
            }?>
        </table>
          
      </div>
         </div>
    </div>
  </section>
</div>

      </div>
    </section>
      </div>
 <!-- Remove the container if you want to extend the Footer to full width. -->
<?php
include "footer.php"
?>
<script src="js/bootstrap.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
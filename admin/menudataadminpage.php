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
        #menu a:hover{
            backdrop-filter: blur(10px) saturate(180%);
            -webkit-backdrop-filter: blur(10px) saturate(180%);
            background-color: rgba(156, 156, 165, 0.78);
        }
        .card-header{
            background-color:black;
          }
        .card-body{
            background-color:#e4dfdf;
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
        <div class="container my-5">                
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h2 class="text-white fw-bold">DATA ADMIN</h2>
                                <a href="tambahadminpage.php" class="btn btn-secondary fw-bold">Tambah Admin</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Foto Profile</th>
                                        <th>Action<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include "../koneksi.php";
                                        error_reporting (0);
                                        $limit = 5;  
                                            if (isset($_GET["page"])) {
                                            $page  = $_GET["page"]; 
                                            } 
                                            else{ 
                                            $page=1;
                                            };  
                                        $start_from = ($page-1) * $limit; 
                                        $level="admin";
                                        $no = 1;
                                        $keyword=$_POST['keyword'];
                                            if ($keyword !=''){
                                                 $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username LIKE '%$keyword%' AND level_user='$level'");
        
                                            }else{
                                                $query = mysqli_query($koneksi, "SELECT * FROM user WHERE level_user='$level' ORDER BY id  ASC LIMIT $start_from, $limit");
                                            } 
                                            while ($data=mysqli_fetch_array($query)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><b><?= $data['username'] ?><b></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?=$data['jeniskelamin']?></td>
                                        <td>
                                            <img src="../images/<?= $data['thumbnail'] ?>" class="img-fluid img-thumbnail" style="width:100px; height:100px;">
                                        </td>
                                        <td>
                                            <div class="btn-group" style="margin-top:40px;">
                                                <a href="editadminpage.php?id=<?= $data['id'] ?>" class="btn btn-dark" style="width:50px; font-size:12px; margin:2px;">Edit</a>
                                                <a href="deleteadmin.php?id=<?= $data['id'] ?>" class="btn btn-secondary delete-link" style="width:70px; font-size:12px; margin:2px;">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            
                                $result_db = mysqli_query($koneksi,"SELECT COUNT(*) as jumlah FROM user WHERE level_user='$level'"); 
                                $row_db = mysqli_fetch_row($result_db);  
                                $total_records = $row_db[0];  
                                $total_pages = ceil($total_records / $limit); 
                                $pagLink = "<ul class='pagination'>";  
                                    for ($i=1; $i<=$total_pages; $i++) {
                                         $pagLink .= "<li class='page-item'><a class='page-link bg-dark text-white' href='menudataadminpage.php?page=".$i."'>".$i."</a></li>";	
                                    }
                            echo $pagLink . "</ul>";  
                            ?>
                        </div>
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
</body>
</html>
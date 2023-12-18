<div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
    <ul class="nav flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start">
        <li class="nav-item">
            <a href="indexadmin.php" class="py-5 pb-5 d-flex align-items-center pb-0 mb-md-0 me-md-auto text-white text-decoration-none">
                <img src="../images/<?= $data['thumbnail'] ?>" style="width :80px; height:80px; border-radius:50%;" class="d-inline-block align-text-top">
                <span class="fs-5 d-none d-sm-inline p-3"> <?= $data['username'] ?></span>
            </a>
        </li>
        <li>
            <a href="databeritapage.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-newspaper"></i> <span class="ms-1 d-none d-sm-inline">Daftar Berita</span></a>
        </li>
        <li>
            <a href="menudataadminpage.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-people-fill"></i> <span class="ms-1 d-none d-sm-inline">Daftar Admin</span></a>
        </li>
        <li>
            <a href="gantipasswordadmin.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-lock-fill"></i> <span class="ms-1 d-none d-sm-inline">Ubah Password</span> </a>
        </li>
        <li>
            <a href="../logout.php" class="nav-link px-0 align-middle">
                <i class="fs-4 bi-power"></i> <span class="ms-1 d-none d-sm-inline">Log Out</span> </a>
        </li>
    </ul>

</div>
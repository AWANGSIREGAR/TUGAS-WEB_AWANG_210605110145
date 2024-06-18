<?php
session_start();
require 'koneksi.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if (!isset($_SESSION['user'])) {
    die("Anda belum login");
}
$user = $_SESSION['user']; 
$sql = "SELECT * from datauser where user='$user'"; 
$query = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Administrasi Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css_L/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
</nav>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="administrasi_Artikel.php">Welcome <?php echo $user ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <div class="sb-sidenav-menu-heading">Database</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Dashboard
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="administrasi_Artikel.php">Artikel</a>
                                <a class="nav-link" href="administrasi_Kategori.php">Kategori</a>
                                <a class="nav-link" href="administrasi_User.php">User</a>
                                
                            </nav>
                        </div>

                        <div class="sb-sidenav-menu-heading">Logout</div>
                        <a class="nav-link" href="logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-external-link-alt"></i></div>
                            Keluar
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Database Artikel</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Isi Artikel</li>
                    </ol>


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Table Artikel
                        </div>
                        <div class="card-body">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#modalTambah">
                                Tambah data
                            </button>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Judul Artikel</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Terbit</th>
                                        <th>Ditulis Oleh</th>
                                        <th>Isi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM dataartikel";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        $nomor = 1;
                                        while ($row = mysqli_fetch_array($result)) {
                                            $id = $row['id'];
                                            $kategori = $row['kategori'];
                                            $judul = $row['judul'];
                                            $tanggal = $row['tanggal'];
                                            $penulis = $row['penulis'];
                                            $isi = $row['isi'];
                                            $gambar = $row['gambar'];

                                            ?>
                                            <tr>
                                                <td>
                                                    <?= $nomor++; ?>
                                                </td>
                                                <td>
                                                    <?= $judul; ?>
                                                </td>
                                                <td>
                                                    <?= $kategori; ?>
                                                </td>
                                                <td>
                                                    <?= $tanggal; ?>
                                                </td>
                                                <td>
                                                    <?= $penulis; ?>
                                                </td>
                                                <td>
                                                    <?= $isi; ?>
                                                </td>
                                                <td>
                                                    
                                                <p><?= '' . $gambar; ?></p>


                                                </td>
                                                <td>
                                                    <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $nomor ?>">Ubah</a>
                                                    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $nomor ?>">Hapus</a>
                                                </td>
                                            </tr>

                                            <!-- Awal Modal Ubah-->
                                            <div class="modal fade" id="modalUbah<?= $nomor ?>" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Form Edit
                                                                Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="fungsi.php" enctype="multipart/form-data">
                                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Judul Artikel</label>
                                                                    <input type="text" class="form-control" name="judul" value="<?= $judul?>"
                                                                        placeholder="Masukkan Judul Yang Anda Minati!">
                                                                </div>
                                                                <div class="mb-3">
                                                            <label class="form-label">Kategori</label>
                                                            <select class="form-control" name="kategori">
                                                                <?php
                                                                $sql_kategori = "SELECT * FROM datakategori";
                                                                $result_kategori = mysqli_query($conn, $sql_kategori);

                                                                if (mysqli_num_rows($result_kategori) > 0) {
                                                                    while ($row_kategori = mysqli_fetch_array($result_kategori)) {
                                                                        $selected = ($kategori == $row_kategori['kategori']) ? 'selected' : '';
                                                                        echo '<option value="' . $row_kategori['kategori'] . '" ' . $selected . '>' . $row_kategori['kategori'] . '</option>';
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                                    <label class="form-label">Tanggal Terbit</label>
                                                                    <input type="date" class="form-control" name="tanggal" value="<?= $tanggal ?>" placeholder="Masukkan tanggal terbit!">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Penulis</label>
                                                                    <input type="text" class="form-control" name="penulis" value="<?= $penulis?>"
                                                                        placeholder="Masukkan password!">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Upload Gambar</label>
                                                                    <input type="file" class="form-control" name="gambar">
                                                                    <label class="custom-file-label">Choose File</label>
                                                                    <small class="form-text text-muted mb-3">Max Size 3Mb</small>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Isi</label>
                                                                    <textarea class="form-control" name="isi" placeholder="Masukkan email Anda!"><?= $isi?> </textarea>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary"
                                                                        name="ubahArtikel">Simpan Data</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Ubah-->

                                            <!-- Awal Modal Hapus-->
                                            <div class="modal fade" id="modalHapus<?= $nomor ?>" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Form Penghapusan
                                                                Data</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="POST" action="fungsi.php">
                                                                <input type="hidden" name="id" value="<?= $id ?>">
                                                                <h5>Apakah Anda yakin ingin menghapus Artikel ini?><br>
                                                                <span class="text-danger"><?= $penulis?> - <?= $judul?></span>
                                                                </h5>

                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-danger"
                                                                        name="hapusArtikel">Hapus</button>
                                                                    <button type="button" class="btn btn-secondary" 
                                                                        data-bs-dismiss="modal">Keluar</button>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Akhir Modal Hapus-->


                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!-- Awal Modal Tambah-->
                            <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Form Penambahan Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="fungsi.php" enctype="multipart/form-data">
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Judul</label>
                                                    <input type="text" class="form-control" name="judul"
                                                        placeholder="Masukkan judul artikel!">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Kategori</label>
                                                    <select class="form-control" name="kategori">
                                                        <option>Pilih Kategori</option>
                                                        <?php
                                                            $sql = "SELECT * FROM datakategori";
                                                            $result = mysqli_query($conn,$sql);
                                                            while($row = mysqli_fetch_array($result)){
                                                        ?>
                                                            <option value="<?= $row['kategori']?>"><?= $row['kategori']?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </div>  
                                                <div class="form-group mb-3">
                                                <label class="form-label">Tanggal Terbit</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d', strtotime($tanggal)) ?>" placeholder="Masukkan tanggal terbit!">
                                            </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label">Penulis</label>
                                                    <input type="text" class="form-control" name="penulis"
                                                        placeholder="Masukkan penulis!">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Upload Gambar</label>
                                                    <input type="file" class="form-control" name="gambar">
                                                    <label class="custom-file-label">Choose File</label>
                                                    <small class="form-text text-muted mb-3">Max Size 3Mb</small>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label">Isi</label>
                                                    <textarea class="form-control" name="isi"
                                                        placeholder="Masukkan isi artikel!"></textarea>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary"
                                                        name="tambahDataArtikel">Simpan</button>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                </div>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Akhir Modal Tambah-->

                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js_L/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js_L/datatables-simple-demo.js"></script>
</body>

</html>
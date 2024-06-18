<?php
require 'koneksi.php';

$kategori = $_GET['kategori'];
$sql_kategori = "SELECT * FROM datakategori WHERE kategori='$kategori'";
$result_kategori = mysqli_query($conn, $sql_kategori);
$data_kategori = mysqli_fetch_assoc($result_kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kategori : <?= $data_kategori['kategori'] ?> - Wonderful Indonesia</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets_B/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css_B/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css_L/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .card-img {
            height: 200px; /* atur tinggi gambar sesuai kebutuhan */
            object-fit: cover; /* agar gambar memenuhi area tanpa mempertahankan aspek rasio */
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Pesona Malang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="tentang.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page content-->
    <div class="container mt-5">
        <h1 class="my-4">Kategori : <?= $data_kategori['kategori'] ?></h1>
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <?php
                $sql = "SELECT * FROM dataartikel WHERE kategori='$kategori'";
                $result = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($result)) {
                    ?>
                    <div class="card mb-4">
                    <a href="artikel.php?myid=<?= $row['id'] ?>" style="pointer-events: none;">
                        <img class="card-img-top rounded" src="administrasi/<?= $data['gambar'] ?>" alt="...">
                    </a>

                        <div class="card-body">
                            <div class="small text-muted">
                                <?= $data['tanggal']; ?>
                            </div>
                            <h2 class="card-title">
                                <?= $data["judul"] ?>
                            </h2>
                            <?php
                                $raw_desc = strip_tags($data['isi']);
                                if (strlen($raw_desc) > 200) {
                                    $trimmedIsi = substr($raw_desc, 0, 200); // Memotong menjadi 200 karakter
                                    $lastSpace = strrpos($trimmedIsi, ' '); // Mencari posisi spasi terakhir
                                    $trimmedIsi = substr($trimmedIsi, 0, $lastSpace); // Memotong hingga spasi terakhir
                                    $trimmedIsi .= '...'; // Menambahkan tanda "..."
                                } else {
                                    $trimmedIsi = $isi; // Teks tidak diubah jika kurang dari 200 karakter
                                }
                            ?>
                            <p class="card-text">
                                <?php echo $trimmedIsi; ?>
                            </p>
                            <a class="btn btn-primary" href="artikel.php?myid=<?= $data['id'] ?>">Read more →</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-unstyled mb-0">
                                    <?php
                                    $sql = "SELECT kategori FROM datakategori";
                                    $result = mysqli_query($conn, $sql);
                                    $nomor = 1; // inisialisasi nomor urut
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                        <li style="margin-bottom: 5px;">
                                            <span style="margin-right: 5px;"><?= $nomor ?>.</span>
                                            <a href="kategori.php?kategori=<?= $row['kategori'] ?>"><?= $row['kategori'] ?></a>
                                        </li>
                                        <?php
                                        $nomor++; // tambahkan nomor urut setiap kali loop
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side widget-->
                <div class="card mb-4"><div class="card mb-4 about-widget">
                                    <div class="card-header">Tentang Penulis</div>
                                    <div class="card-body">
                                        <h3 class="card-title">Halo Semua!</h3>
                                        <p class="card-text">Saya adalah Awang Siregar, seorang penulis dengan semangat tinggi untuk berbagi pengetahuan dan pengalaman. Berasal dari Tulungagung, saya memiliki kecintaan yang mendalam terhadap dunia tulis-menulis dan berbagi informasi yang bermanfaat.</p>
                                        <p class="card-text">Dengan beragam pengalaman dan pengetahuan yang saya miliki, saya berharap dapat memberikan konten yang inspiratif dan informatif melalui blog ini. Mari bersama-sama kita eksplorasi dan temukan berbagai hal menarik bersama!</p>
                                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js_B/scripts.js"></script>
</body>

</html>

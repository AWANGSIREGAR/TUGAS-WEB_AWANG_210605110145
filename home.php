<?php
    require 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Home Page : Pesona Malang</title>
<!-- Favicon-->
<link rel="icon" type="image/x-icon" href="assets_HP/favicon.ico">
<!-- Core theme CSS (includes Bootstrap)-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet">
<link href="css_L/styles.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    nav.navbar {
        background-color: #343a40;
    }

    nav.navbar a.navbar-brand,
    nav.navbar a.nav-link {
        color: #fff;
    }

    .card {
        border: none;
        transition: all 0.3s;
        border-radius: 15px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-weight: 500;
        color: #333;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .card-text {
        color: #555;
        font-size: 1.2rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        font-size: 1.2rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        font-size: 1.2rem;
        color: #333;
    }

    .list-unstyled li {
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .list-unstyled li a {
        color: #333;
    }

    .search-form {
        position: relative;
        margin-bottom: 1rem;
    }

    .search-form input[type="text"] {
        border-radius: 25px;
        padding: 0.5rem 2rem;
        font-size: 1.2rem;
    }

    .search-form button {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto;
        border-radius: 50%;
        font-size: 1.2rem;
        padding: 0.5rem;
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .about-widget {
        background-color: #f8f9fa;
        border-radius: 15px;
        padding: 1.5rem;
        color: #333;
    }

    .about-widget h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .about-widget p {
        font-size: 1.2rem;
        line-height: 1.6;
    }
</style>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">PESONA MALANG</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="tentang.php">About</a></li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-light border-bottom mb-4">
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <?php
                    $sql = "SELECT * FROM dataartikel ORDER BY id DESC LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){?>
                       <a href="artikel.php?myid=<?=$row['id']?>"><img class="card-img-top" src="administrasi/<?php echo $row['gambar'];?>" alt="..." /></a>

                        <div class="card-body">
                            <div class="small text-muted"><?=$row['tanggal']; ?></div>
                            <h2 class="card-title"><?=$row['judul']; ?></h2>
                            <?php
                                $raw_desc = strip_tags($row['isi']);
                                if (strlen($raw_desc) > 200) {
                                    $trimmedIsi = substr($raw_desc, 0, 200); // Memotong menjadi 200 karakter
                                    $lastSpace = strrpos($trimmedIsi, ' '); // Mencari posisi spasi terakhir
                                    $trimmedIsi = substr($trimmedIsi, 0, $lastSpace); // Memotong hingga spasi terakhir
                                    $trimmedIsi .= '...'; // Menambahkan tanda "..."
                                } else {
                                    $isi = "Belum ada karakter";
                                    $trimmedIsi = $isi; // Teks tidak diubah jika kurang dari 200 karakter
                                }
                            ?>
                            <p class="card-text"><?php echo $trimmedIsi; ?></p>
                            <a class="btn btn-primary" href="artikel.php?myid=<?=$row['id']?>">Read more →</a>
                    </div>
                    <?php
                    }
                ?>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                <?php
                    $sql = "SELECT * FROM dataartikel ORDER BY id ASC LIMIT 8";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-lg-6">
                    <!-- Blog post-->
                    <div class="card mb-4">
                    <a href="artikel.php?myid=<?=$row['id']?>"><img class="card-img-top" src="administrasi/<?php echo $row['gambar'];?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?=$row['tanggal'];?></div>
                            <h2 class="card-title h4"><?=$row['judul'];?></h2>
                            <?php
                                 $raw_desc = strip_tags($row['isi']);
                                 if (strlen($raw_desc) > 200) {
                                     $trimmedIsi = substr($raw_desc, 0, 50); // Memotong menjadi 200 karakter
                                     $lastSpace = strrpos($trimmedIsi, ' '); // Mencari posisi spasi terakhir
                                     $trimmedIsi = substr($trimmedIsi, 0, $lastSpace); // Memotong hingga spasi terakhir
                                     $trimmedIsi .= '...'; // Menambahkan tanda "..."
                                 } else {
                                     $trimmedIsi = $isi; // Teks tidak diubah jika kurang dari 200 karakter
                                 }
                            ?>
                            <p class="card-text"><?php echo $trimmedIsi ?></p>
                            <a class="btn btn-primary" href="artikel.php?myid=<?= $row ['id']?>">
                                Read more →</a>
                        </div>
                        </div>
                        </div>
                        <?php
                                        }
                                    ?>
                        </div>
                        </div>
                        <!-- Side widgets-->
                        <div class="col-lg-4">
                        <!-- Search widget-->
                                    <div class="card mb-4">
                                    <div class="card-header">Search</div>
                                    <div class="card-body">
                                    <form class="search-form">
                                    <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term...">
                                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                    </form>
                                    </div>
                                    </div>
                        <!-- Categories widget-->
                        <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                        <ul class="list-unstyled">
                        <?php
                                            $sql2 = "SELECT kategori FROM datakategori";
                                            $result2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($result2) > 0) {
                                                $counter = 1;
                                                while ($row = mysqli_fetch_array($result2)) {
                                                    ?>
                        <li class="mb-3">
                        <span class="mr-2"><?= $counter ?>.</span>
                        <a href="kategori.php?kategori=<?= $row['kategori'] ?>"><?= $row['kategori'] ?></a>
                        </li>
                        <?php
                                                    $counter++;
                                                }
                                            } else {
                                                ?>
                        <li>No categories found</li>
                        <?php
                                            }
                                            ?>
                        </ul>
                        </div>
                        </div>
                        <!-- About widget-->
                                    <div class="card mb-4 about-widget">
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
                                    <script src="js/scripts.js"></script>
                        </body>
                        </html>
                        ```

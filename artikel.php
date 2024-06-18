<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Wonderful Indonesia</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets_HP/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css_HP/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css_L/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php"> Pesona Malang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
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
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <?php
                include "koneksi.php";

                $id = $_GET["myid"];
                $sql = "SELECT * FROM dataartikel WHERE $id =id";
                $result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_array($result)) {
                ?><article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?= htmlspecialchars($rows['judul']) ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">
                            <span><?= htmlspecialchars($rows['penulis']) ?>, </span><?= htmlspecialchars($rows['tanggal']) ?>
                        </div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="kategori.php?kategori=<?= urlencode($rows['kategori']) ?>"><?= htmlspecialchars($rows['kategori']) ?></a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <a href="artikel.php?myid=<?= $rows['id'] ?>">
                            <img class="img-fluid rounded" src="administrasi/<?= htmlspecialchars($rows['gambar']) ?>" alt="..." />
                        </a>
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        <p class="fs-5 mb-4 text-start" style="text-decoration: none;"><?= nl2br(htmlspecialchars($rows['isi'])) ?></p>
                    </section>
                </article>

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
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <!-- Categories widget -->
                <!-- Categories widget -->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
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
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
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
    <script src="admin/js/scripts1.js"></script>
</body>

</html>

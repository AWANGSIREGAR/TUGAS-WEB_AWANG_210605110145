<?php
include('koneksi.php');
if (isset($_GET['id'])) {
    $sql = "SELECT * FROM dataartikel WHERE id='" . $_GET['id'] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $gambar = $row['gambar'];
        ?>
        <img class="img-fluid rounded" src="administrasi/assets_L/img/<?= $gambar ?>" alt="...">
        <?php
    } else {
        echo "Gambar tidak ditemukan";
    }
} else {
    header('location:home.php');
}

?>

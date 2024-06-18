<?php

session_start();
require 'koneksi.php';

//Ambil data dari base untuk LOGIN
if(isset($_POST['tombolLogin'])){
  $user = $_POST['user'];
  $password = $_POST['password'];

  // Cek apakah user atau password kosong
  if(empty($user) || empty($password)) {
    echo "<script>
            alert('User atau password tidak boleh kosong');
            window.location.href = 'index.php';
          </script>";
    exit();
  }

  // Disarankan menggunakan prepared statements untuk keamanan
  $stmt = $conn->prepare("SELECT * FROM datauser WHERE user = ? AND password = ?");
  $stmt->bind_param("ss", $user, $password);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0){
    $data = $result->fetch_array();
    $_SESSION['user'] = $data['user'];
    header('Location: administrasi_Artikel.php');
    exit();
  } else {
    echo "<script>
            alert('Username atau password salah');
            window.location.href = 'index.php';
          </script>";
    exit();
  }
}

//eror

//Simpan data ke database Untuk ADMINISTRASI USER
if(isset($_POST['tambahdatauser'])){
  $nim = $_POST['nim'];
  $user = $_POST['user'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $sql = "INSERT INTO datauser (user, password, email, NIM) 
          VALUES ('$user',
                  '$password',
                  '$email',
                  '$nim')";

  if($result = mysqli_query($conn, $sql)){
    echo "<script>
          alert ('Simpan Data Berhasil!')
          <script>";
    header('location: administrasi_User.php');
  }else{
    echo "<script>
    alert ('Simpan Data Gagal!')
    <script>";
    header('location: administrasi_User.php');
  }
}

//Ubah data dari database untuk ADMINSTRASI USER
if(isset($_POST['ubah'])){
  $id = $_POST['id'];
  $nim = $_POST['nim'];
  $user = $_POST['user'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $sql = "UPDATE datauser SET NIM='$nim', user='$user', password='$password', email='$email' WHERE id='$id'";

  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>
          alert ('Simpan Data Berhasil!')
          <script>";
    header('location: administrasi_User.php');
  }else{
    echo "<script>
    alert ('Simpan Data Gagal!')
    <script>";
    header('location: administrasi_User.php');
  }
}

//Hapus data dari databse untuk ADMINSTRASI USER
if(isset($_POST['hapus'])){
  $id = $_POST['id'];
  $sql = "DELETE FROM datauser WHERE id ='$id'";

  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>
          alert ('Simpan Data Berhasil!')
          <script>";
    header('location: administrasi_User.php');
  }else{
    echo "<script>
    alert ('Simpan Data Gagal!')
    <script>";
    header('location: administrasi_User.php');
  }
}

// Simpan data ke database Untuk ADMINISTRASI ARTIKEL
if (isset($_POST['tambahDataArtikel'])) {
  $judul = $_POST['judul'];
  $kategori = $_POST['kategori'];
  $tanggal = $_POST['tanggal'];
  $penulis = $_POST['penulis'];
  $isi = $_POST['isi'];
  $image = $_FILES['gambar'];

  if ($image['tmp_name']) {
      $info = getimagesize($image['tmp_name']);
      if (!$info) {
          die("File is not an image");
      }
      $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/' . basename($image['name']);

      if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/')) {
          mkdir($_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/', 0777, true);
      }
      
      if (move_uploaded_file($image['tmp_name'], $imagePath)) {
          $imagePathDB = 'assets_L/img/' . basename($image['name']);
          // Lanjutkan dengan operasi lain yang Anda perlukan
      } else {
          // Tampilkan pesan kesalahan jika gagal memindahkan file
          echo "Gagal memindahkan file.";
      }
      

          // Gunakan prepared statements untuk query SQL
          $stmt = $conn->prepare("INSERT INTO dataartikel (judul, kategori, tanggal, penulis, isi, gambar) VALUES (?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $judul, $kategori, $tanggal, $penulis, $isi, $imagePathDB);

          if ($stmt->execute()) {
              echo "<script>
                    alert('Simpan Data Berhasil!');
                    window.location.href = 'administrasi_Artikel.php';
                    </script>";
          } else {
              echo "<script>
                    alert('Simpan Data Gagal!');
                    window.location.href = 'administrasi_Artikel.php';
                    </script>";
          }

          $stmt->close();
      } else {
          echo "<script>
                alert('Gagal mengunggah gambar!');
                </script>";
      }
  }


// Ubah Data
if (isset($_POST['ubahArtikel'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
    $tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
    $penulis = mysqli_real_escape_string($conn, $_POST['penulis']);
    $image = $_FILES['gambar'];
    $isi = mysqli_real_escape_string($conn, $_POST['isi']);

    // Pengecekan apakah ada file yang diunggah
    if (isset($image['tmp_name']) && $image['tmp_name'] != '') {
        $info = getimagesize($image['tmp_name']);
        if (!$info) {
            die("File is not an image");
        }
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/' . basename($image['name']);

        if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/')) {
            mkdir($_SERVER['DOCUMENT_ROOT'] . '/administrasi/assets_L/img/', 0777, true);
        }
        
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            $imagePathDB = 'assets_L/img/' . basename($image['name']);
            // Lanjutkan dengan operasi lain yang Anda perlukan
        } else {
            // Tampilkan pesan kesalahan jika gagal memindahkan file
            echo "Gagal memindahkan file.";
        }
        
            $sql = "UPDATE dataartikel SET 
                    judul='$judul', 
                    kategori='$kategori',
                    tanggal='$tanggal', 
                    penulis='$penulis', 
                    isi='$isi',
                    gambar='$imagePathDB'
                    WHERE id='$id'";
        } else {
            echo "<script>
                  alert('Gagal mengunggah gambar!');
                  window.location.href = 'administrasi_Artikel.php';
                  </script>";
            exit; // Exit to prevent further execution
        }
    } else {
        // Jika tidak ada file yang diunggah, update tanpa kolom gambar
        $sql = "UPDATE dataartikel SET 
                judul='$judul', 
                kategori='$kategori',
                tanggal='$tanggal', 
                penulis='$penulis', 
                isi='$isi'
                WHERE id='$id'";
    }

    // Jalankan query setelah memastikan nilai-nilai sudah di-escape dengan benar
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>
              alert('Simpan Data Berhasil!');
              window.location.href = 'administrasi_Artikel.php';
              </script>";
    } else {
        echo "<script>
              alert('Simpan Data Gagal!');
              window.location.href = 'administrasi_Artikel.php';
              </script>";
    }


//Hapus data dari databse untuk ADMINSTRASI ARTIKEL
if(isset($_POST['hapusArtikel'])){
  $id = $_POST['id'];
  $sql = "DELETE FROM dataartikel WHERE id ='$id'";

  $result = mysqli_query($conn, $sql);

  if($result){
    echo "<script>
          alert ('Simpan Data Berhasil!')
          <script>";
    header('location: administrasi_Artikel.php');
  }else{
    echo "<script>
    alert ('Simpan Data Gagal!')
    <script>";
    header('location: administrasi_Artikel.php');
  }
}

//Simpan data ke database Untuk ADMINISTRASI KATEGORI
if(isset($_POST['tambahdatakategori'])){
  $kategori = $_POST['kategori'];
  $jumlahart = $_POST['jumlahart'];
  $sql = "INSERT INTO datakategori (kategori, jumlahart) 
          VALUES ('$kategori',
                  '$jumlahart')";

  if($result = mysqli_query($conn, $sql)){
    echo "<script>
          alert ('Simpan Data Berhasil!')
          <script>";
    header('location: administrasi_Kategori.php');
  }else{
    echo "<script>
    alert ('Simpan Data Gagal!')
    <script>";
    header('location: administrasi_Kategori.php');
  }
}

// Ubah data dari database untuk ADMINSTRASI KATEGORI
if (isset($_POST['ubahkategori'])) {
  // Assuming you have a database connection in $conn
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $new_kategori = mysqli_real_escape_string($conn, $_POST['kategori']);
  $jumlahart = mysqli_real_escape_string($conn, $_POST['jumlahart']);

  // Fetch the current category based on the ID
  $current_query = "SELECT kategori FROM datakategori WHERE id='$id'";
  $current_result = mysqli_query($conn, $current_query);
  $current_data = mysqli_fetch_assoc($current_result);

  if ($current_data) {
      $current_kategori = $current_data['kategori'];

      // Start a transaction
      mysqli_begin_transaction($conn);

      try {
          // Disable foreign key checks
          mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=0");

          // Update the category in the datakategori table
          $sql_update_kategori = "UPDATE datakategori SET kategori='$new_kategori', jumlahart='$jumlahart' WHERE id='$id'";
          $result_update_kategori = mysqli_query($conn, $sql_update_kategori);

          if ($result_update_kategori) {
              // Update the articles with the new category
              $sql_update_artikel = "UPDATE dataartikel SET kategori='$new_kategori' WHERE kategori='$current_kategori'";
              $result_update_artikel = mysqli_query($conn, $sql_update_artikel);

              if ($result_update_artikel) {
                  // Commit the transaction
                  mysqli_commit($conn);

                  // Re-enable foreign key checks
                  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

                  echo "<script>
                        alert('Simpan Data Berhasil!');
                        window.location.href = 'administrasi_Kategori.php';
                        </script>";
              } else {
                  // Rollback the transaction if updating dataartikel fails
                  mysqli_rollback($conn);

                  // Re-enable foreign key checks
                  mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

                  echo "<script>
                        alert('Update Kategori di Tabel Artikel Gagal!');
                        window.location.href = 'administrasi_Kategori.php';
                        </script>";
              }
          } else {
              // Rollback the transaction if updating datakategori fails
              mysqli_rollback($conn);

              // Re-enable foreign key checks
              mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

              echo "<script>
                    alert('Simpan Data Gagal!');
                    window.location.href = 'administrasi_Kategori.php';
                    </script>";
          }
      } catch (Exception $e) {
          // Rollback the transaction in case of any other exception
          mysqli_rollback($conn);

          // Re-enable foreign key checks
          mysqli_query($conn, "SET FOREIGN_KEY_CHECKS=1");

          echo "<script>
                alert('Terjadi kesalahan: " . $e->getMessage() . "');
                window.location.href = 'administrasi_Kategori.php';
                </script>";
      }
  } else {
      echo "<script>
            alert('Data kategori tidak ditemukan!');
            window.location.href = 'administrasi_Kategori.php';
            </script>";
  }
}

// Hapus data dari database untuk ADMINSTRASI KATEGORI
if (isset($_POST['hapuskategori'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);

  // Start a transaction
  mysqli_begin_transaction($conn);

  try {
    // Check if there are articles linked to this category
    $check_artikel_query = "SELECT COUNT(*) AS total FROM dataartikel WHERE kategori=(SELECT kategori FROM datakategori WHERE id='$id')";
    $check_artikel_result = mysqli_query($conn, $check_artikel_query);
    $check_artikel_data = mysqli_fetch_assoc($check_artikel_result);

    if ($check_artikel_data['total'] == 0) {
      $sql = "DELETE FROM datakategori WHERE id='$id'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        // Commit the transaction
        mysqli_commit($conn);

        echo "<script>
              alert('Hapus Data Berhasil!');
              window.location.href = 'administrasi_Kategori.php';
              </script>";
      } else {
        // Rollback the transaction if deletion fails
        mysqli_rollback($conn);

        echo "<script>
              alert('Hapus Data Gagal!');
              window.location.href = 'administrasi_Kategori.php';
              </script>";
      }
    } else {
      // Jika ada artikel yang terhubung, hapus artikel tersebut terlebih dahulu
      $sql_delete_artikel = "DELETE FROM dataartikel WHERE kategori=(SELECT kategori FROM datakategori WHERE id='$id')";
      $result_delete_artikel = mysqli_query($conn, $sql_delete_artikel);

      if ($result_delete_artikel) {
        // Kemudian hapus kategori
        $sql = "DELETE FROM datakategori WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
          // Commit the transaction
          mysqli_commit($conn);

          echo "<script>
                alert('Hapus Data Berhasil!');
                window.location.href = 'administrasi_Kategori.php';
                </script>";
        } else {
          // Rollback the transaction if deletion fails
          mysqli_rollback($conn);

          echo "<script>
                alert('Hapus Data Gagal!');
                window.location.href = 'administrasi_Kategori.php';
                </script>";
        }
      } else {
        // Rollback the transaction if deleting articles fails
        mysqli_rollback($conn);

        echo "<script>
              alert('Gagal menghapus artikel yang terkait!');
              window.location.href = 'administrasi_Kategori.php';
              </script>";
      }
    }
  } catch (Exception $e) {
    // Rollback the transaction in case of any other exception
    mysqli_rollback($conn);

    echo "<script>
          alert('Terjadi kesalahan: " . $e->getMessage() . "');
          window.location.href = 'administrasi_Kategori.php';
          </script>";
  }
}
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2024 at 03:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataartikel`
--

CREATE TABLE `dataartikel` (
  `id` int NOT NULL,
  `kategori` varchar(255) COLLATE armscii8_bin NOT NULL,
  `judul` varchar(255) COLLATE armscii8_bin NOT NULL,
  `tanggal` date NOT NULL,
  `penulis` varchar(255) COLLATE armscii8_bin NOT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE armscii8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Dumping data for table `dataartikel`
--

INSERT INTO `dataartikel` (`id`, `kategori`, `judul`, `tanggal`, `penulis`, `isi`, `gambar`) VALUES
(2, 'Studi Kampus', 'Universitas Islam Negeri', '2024-06-01', 'AWANG SIREGAR', 'Universitas Islam Negeri (UIN) Malang berdiri berdasarkan Surat Keputusan Presiden No. 50 tanggal 21 Juni 2004. Bermula dari gagasan para tokoh Jawa Timur untuk mendirikan lembaga pendidikan tinggi Islam di bawah Departemen Agama, dibentuklah Panitia Pendirian IAIN Cabang Surabaya melalui Surat Keputusan Menteri Agama No. 17 Tahun 1961 yang bertugas untuk mendirikan Fakultas Syariah yang berkedudukan di Surabaya dan Fakultas Tarbiyah yang berkedudukan di Malang. Keduanya merupakan fakultas cabang IAIN Sunan Kalijaga Yogyakarta dan diresmikan secara bersamaan oleh Menteri Agama pada 28 Oktober 1961. Pada 1 Oktober 1964 didirikan juga Fakultas Ushuluddin yang berkedudukan di Kediri melalui Surat Keputusan Menteri Agama No. 66/1964.              ', 'assets_L/img/UIN-malang.jpg'),
(4, 'Taman Indah', 'Taman Merjo Bagus', '2024-06-06', 'AWANG PERMEI', 'Taman Merjosari merupakan Ruang Terbuka Hijau (RTH) hasil pembangunan P2KH pada tahun 2012 dan P2KH 2013. Taman seluas 29.012 meter persegi ini menawarkan tempat yang nyaman bagi keluarga untuk menikmati waktu bersama. Dikelilingi pepohonan rindang yang menyejukkan suasana, tersedia juga banyak gazebo yang bisa dimanfaatkan untuk menikmati waktu bersama keluarga. Bahkan, gazebo tersebut seringkali digunakan sebagai tempat makan bersama dan bercengkerama keluarga yang datang berkunjung. Selain menawarkan tempat yang nyaman, ada beberapa fasilitas yang tersedia di tempat ini, yang bisa dimanfaatkan oleh pengunjung, seperti taman kebugaran, yang didalamnya tersedia beberapa alat untuk berolahraga dan bisa digunakan dengan bebas oleh masyarakat.     ', 'assets_L/img/merjo.jpg'),
(10, 'Bendungan/Waduk', 'Karangkates', '2024-05-22', 'Awang Siregar Lenggah', 'Bendungan Karangkates atau disebut juga Waduk Ir. Sutami merupakan sebuah bendungan yang menciptakan suatu waduk karena tertahannya aliran Sungai Brantas. Air yang tertahan pada bendungan ini berasal dari mata air di Gunung Arjuno dan ditambah air hujan.\r\n\r\nDi kawasan sekitar bendungan dibangun sebuah taman dengan pepohonan yang rindang. Taman tersebut juga dilengkapi dengan wahana permainan serta gazebo untuk bersantai. Adapula area yang bisa digunakan untuk memancing ikan. Selain itu, terdapat beberapa fasilitas olahraga, seperti lapangan tenis dan lapangan golf. ', 'assets_L/img/katangkates.jpeg'),
(11, 'Hutan di Malang yang Menarik Sekali', 'Hutan Malabar', '2024-05-22', 'Awanggg', 'Hutan Malabar Sebagai Hutan Pendidikan Kota Malang.                                                              \r\n\r\nPada tanggal 4 April 2016 Walikota Malang dengan didampingi Ketua Tim Penggerak PKK Kota Malang dan Presiden Direktur PT Amerta Indah Otsuka meresmikan hutan kota Malabar yang berlokasi di Jalan Ijen menjadi Hutan Pendidikan.   Tujuan diresmikan hutan kota Malabar adalah sebagai sarana pembelajaran bagi masyarakat untuk mengenal jenis pohon dan tumbuh-tumbuhan, selain itu untuk memperbaiki iklim mikro dan pelestarian ekosistem lingkungan sehingga penyediaan Ruang Terbuka Hijau (RTH) bagi masyarakat kota Malang semakin terpenuhi. \r\n\r\nRuang Terbuka Hijau sangat penting sebagai paru-paru kota yang berfungsi menjaga suhu kota yang sejuk, mengurangi kandungan polusi di udara dan menjadi area resapan air.  Selain itu dengan adanya hutan pendidikan Malabar seluas 16.718 m2 yang dibangun dengan dana CSR dari PT Amerta Indah Otsuka ini diharapkan dapat mengembalikan Malang sebagai kota bunga dan kota yang sejuk, hal ini sesuai dengan komitmen Pemerintah Kota Malang terhadap pemenuhan kebutuhan RTH perkotaan sebesar 20 % Ruang Terbuka Hijau Publik dan 10 % Ruang Terbuka Hijau Privat sesuai Undang-Undang nomor 26 Tahun 2007 tentang Penataan Ruang.  Selain itu dengan peresmian hutan pendidikan Malabar diharapkan dapat mewujudkan lingkungan yang kondusif bagi kehidupan yang sehat dan mampu memicu produktifitas serta menumbuhkan perekonomian masyarakat.     ', 'assets_L/img/Malabar.jpg'),
(14, 'Bendungan/Waduk', 'Waduk Selorejo', '2024-05-22', 'Awang SLP', 'Menyambut liburan akhir tahun banyak lokasi wisata menarik di wilayah Jawa Timur yang bisa menjadi rujukan. Salah satunya di Bendungan Selorejo, spot wisata yang menyuguhkan keindahan bendungan dengan udara yang sejuk bisa menjadi pilihan liburan saat momen tahun baru nanti. \r\n\r\nPasca pandemi, pergantian tahun nanti menjadi momen pertama setelah pemerintah mengizinkan aktivitas dengan mengundang banyak massa. Tentunya, kabar baik tersebut menjadi angin segar bagi bidang usaha seperti hotel, restaurant dan taman wisata. \r\n\r\nPromo menarik pun ditawarkan juga Selorejo Hotel and Resort yang dikelola Perum Jasa Tirta I. Hotel ini menawarkan panorama bendungan Selorejo yang asri, sangat cocok untuk dijadikan destinasi wisata keluarga di akhir tahun.\r\n\r\nBerlokasi di Banturejo, Ngantang, Kabupaten Malang, Taman Wisata Bendungan Selorejo Hotel & Resort tidak hanya menawarkan wisata bendungan. Naming juga fasilitas-fasilitas lain seperti camping ground, restaurant, kolam renang, recreation area dan wisata perahu. \r\n\r\nDengan banyaknya hal yang ditawarkan, tidak heran jika banyak orang mengunjungi Taman Wisata Bendungan Selorejo Hotel & Resort. Baik untuk liburan atau sekedar melepas penat dari kesibukan daerah perkotaan. ', 'assets_L/img/selorejo.jpeg'),
(15, 'Studi Kampus', 'Universitas Brawijaya', '2024-04-30', 'awang', 'Universitas BRawijaya didirikan pada tanggal 5 Januari 1963 di Malang, Jawa Timur, sebagai hasil dari gagasan untuk mendirikan sebuah Universitas Kotapraja (Gemeentelijke Universiteit). Kemudian pada 1 Juli 1960 universitas ini mengalami perubahan nama menjadi Universitas Brawijaya.\r\n\r\nPada tahun 2022, UB meraih peringkat ketiga dalam daftar universitas terbaik di Indonesia menurut Webometrics World University Ranking. UB juga menduduki peringkat 239 dalam daftar kampus terbaik di Asia versi QS Asian University Rankings pada tahun yang sama, dan masuk ke dalam kategori 10 besar kampus terbaik di Indonesia menurut Kementerian Riset, Teknologi, dan Perguruan Tinggi (Kemenristekdikti). ..   ', 'assets_L/img/universitas-brawijaya-ub-malang_169.jpeg'),
(16, 'Hutan di Malang yang Menarik Sekali', 'Hutan Pinus Bendosari', '2024-05-22', 'saya ', 'Seperti namanya, sajian utama kawasan ini adalah taman pinus, atau hutan pinus, yang tinggi menjulang. Kamu yang menyukai aktivitas outdoor, dijamin akan terkesima dengan tempat yang satu ini.\r\n\r\nBerlokasi di Dusun Cungkal, Desa Bendosari, Kecamatan Pujon, Kabupaten Malang, tempat ini sangat cocok bagi kamu yang sedang jenuh dengan rutinitas harian. Letaknya kurang dari 100 meter dari jalan poros Malang-Kediri.\r\n\r\nAda banyak aktivitas yang dapat dicoba disini seperti menyewa trail mini, menyewa hammoc, hingga berkemah serta jangan lupa mengabadikan momen liburanmu di hutan pinus yang instagramable ini. ', 'assets_L/img/pinus.jpg'),
(19, 'Taman Indah', 'Batu Malang Garden', '2024-05-09', 'Awang', ' Wisata Batu Flower Garden Malang, merupakan taman bunga yang menyediakan banyak spot foto keren dan dekat dengan wisata air terjun bernama Coban Rais.\r\n\r\nTerletak di Kota Batu yang mana menjadi kota otonom yang terpisah dari Kota Malang, tempat wisata yang satu ini lebih dikenal dengan Batu Flower Garden yang terletak di Kota Malang.\r\n\r\nDi sini, kamu dapat menikmati warna-warni tanaman bunga yang tentunya sangat instagrammable untuk kamu yang mencari spot foto ketika berlibur kesana.\r\n\r\nNah, jika kamu berencana untuk berkunjung kesini, ada beberapa informasi yang harus kamu tau terlebih dahulu tentang Wisata Batu Flower Garden Malang.', 'assets_L/img/batu-flower-garden-malang.jpg'),
(25, 'Pantai Indah di Malang', 'Pantai Ngliyep', '2024-05-09', 'Awang Siregar', 'Pantai Ngliyep (Baca: ngliyêp; ejaan: ngêliyêp) adalah sebuah pantai di pesisir selatan yang terletak di tepi Samudra Hindia tepatnya di Desa Kedungsalam, Kecamatan Donomulyo, Kabupaten Malang, Jawa Timur[1] sekitar 62 km arah selatan dari Kota Malang. Dari Kota Malang, Ngliyep sangat mudah dijangkau karena sejak tahun 1980 akses menuju pantai telah diaspal. Jika menggunakan angkutan umum dari Kota Malang bisa naik mikrolet jalur GN1, yaitu jalur Gadang-Ngliyep lewat Donomulyo atau jalur GN2, yakni jalur Gadang-Ngliyep lewat Sumbermanjing kulon atau yang sekarang dikenal dengan nama Kecamatan Pagak.\r\n\r\nLuas areal wisata Pantai Ngliyep kurang lebih 10 Ha yang terdiri dari hutan lindung, areal wisata, penginapan, dan lahan parkir. Fasilitas yang ada di Pantai Ngliyep antara lain pesanggrahan 4 buah, penginapan 6 buah, dan cottage 2 buah. Pada era 1980-an, Pantai Ngliyep merupakan daerah tujuan wisata favorit di Jawa Timur. Bahkan sebelum pantai Balekambang dan Pantai Sendangbiru dikenal para wisatawan, pantai ini jauh lebih dulu dikenal. Konon pantai ini ditemukan pertama kali oleh Mbah Atun, perantauan asal Jogjakarta, pada 1919 dan mulai dibuka secara resmi pada 1951. Sayangnya, sekarang Ngliyep kurang dikelola dengan baik karena masih terjadi persengketaan lahan antara pemerintah daerah dengan Perum Perhutani. ', 'assets_L/img/ngliyep.jpg'),
(26, 'Pantai Indah di Malang', 'Pantai Ngudel', '2024-05-01', 'Awang', 'Pantai Ngudel Malang\r\nBerikut informasi terkait Pantai Ngudel\r\n\r\nRute Menuju Pantai Ngudel Malang\r\nAda dua jalur utama yang dapat Anda pilih untuk menuju ke Pantai Ngudel dari Kota Malang:\r\n\r\nJalur Melalui Gondanglegi\r\nDari Kota Malang, arahkan perjalanan Anda ke Gondanglegi. Patokan awal rute ini adalah Pasar Gondanglegi. Ambil arah kanan pada persimpangan di Pasar Gondanglegi, lalu menuju Jalan Diponegoro. Lanjutkan hingga mencapai Puskesmas Gondanglegi di Jalan Diponegoro. Setelah itu, ambil arah kiri pada persimpangan di sebelah Puskesmas Gondanglegi. Lanjutkan perjalanan hingga Anda mencapai Kecamatan Bantur. Ketika Anda sampai di Jalan Raya Rejosari di Kecamatan Bantur, Anda akan menemui persimpangan di depan pemakaman umum. Ambil arah kiri pada persimpangan tersebut. Lanjutkan perjalanan hingga Anda bertemu dengan jalan raya utama, yang merupakan jalan lintas selatan Jawa Timur. Di persimpangan selanjutnya, ambil arah kanan yang menuju Pantai Ngudel. Total jarak perjalanan melalui jalur ini adalah sekitar 62,7 km dengan waktu tempuh kurang lebih 1 jam 55 menit.\r\n\r\nJalur Melalui Kepanjen\r\nDari Kota Malang, arahkan perjalanan Anda menuju Kepanjen. Setelah Anda mencapai Kepanjen, gunakan Bendungan Sengguruh sebagai patokan awal. Ikuti jalan raya utama yang menuju Kecamatan Pagak. Setelah beberapa waktu perjalanan, Anda akan menemui persimpangan lain. Ambil arah kiri pada persimpangan ini menuju Pasar Wonokerto. Lanjutkan perjalanan hingga Anda tiba di Pasar Wonokerto. Di persimpangan Pasar Wonokerto, ambil arah kanan yang akan membawa Anda ke Kecamatan Bantur. Di persimpangan ini, jalur dari Kota Malang via Kecamatan Gondanglegi akan bergabung. Total jarak perjalanan melalui jalur ini adalah sekitar 66 km dengan waktu tempuh kurang lebih 2 jam 7 menit.', 'assets_L/img/ngudel.jpg'),
(27, 'Wisata Gunung ', 'Gunung Semeru', '2024-05-24', 'Awang', 'Gunung Semeru atau Gunung Meru adalah sebuah gunung berapi kerucut di Jawa Timur, Indonesia. Gunung Semeru merupakan gunung tertinggi di Pulau Jawa, dengan puncaknya Mahameru, 3.676 meter dari permukaan laut (mdpl). Gunung ini terbentuk akibat subduksi Lempeng Indo-Australia kebawah Lempeng Eurasia. Gunung Semeru juga merupakan gunung berapi tertinggi ketiga di Indonesia setelah Gunung Kerinci di Sumatra dan Gunung Rinjani di Nusa Tenggara Barat.[1] Kawah di puncak Gunung Semeru dikenal dengan nama Jonggring Saloko.\r\n\r\nGunung Semeru secara administratif termasuk dalam wilayah dua kabupaten, yakni Kabupaten Malang dan Kabupaten Lumajang, Provinsi Jawa Timur. Gunung ini termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru. Semeru mempunyai kawasan hutan Dipterokarp Bukit, hutan Dipterokarp Atas, hutan Montane, dan Hutan Ericaceous atau hutan gunung. Posisi geografis Semeru terletak antara 8°06\' LS dan 112°55\' BT.\r\n\r\nPada tahun 1913 dan 1946 Kawah Jonggring Saloka memiliki kubah dengan ketinggian 3.744,8 m hingga akhir November 1973. Di sebelah selatan, kubah ini mendobrak tepi kawah menyebabkan aliran lava mengarah ke sisi selatan meliputi daerah Pronojiwo dan Candipuro di Lumajang.', 'assets_L/img/Semeruu.jpg'),
(28, 'Wisata Gunung ', 'Gunung Bromo Malang', '2024-05-03', 'Awang Siregar', 'Gunung Bromo atau/ dalam bahasa Tengger dieja \"Brama\", juga disebut Kaldera Tengger, adalah sebuah gunung berapi aktif di Jawa Timur, Indonesia. Gunung ini memiliki ketinggian 2.329 meter di atas permukaan laut dan berada dalam empat wilayah kabupaten, yakni Kabupaten Probolinggo, Kabupaten Pasuruan, Kabupaten Lumajang, dan Kabupaten Malang. Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.\r\n\r\nNama Bromo berasal dari nama dewa utama dalam agama Hindu, Brahma.\r\n\r\nBentuk tubuh Gunung Bromo bertautan antara lembah dan ngarai dengan kaldera atau lautan pasir seluas sekitar 10 kilometer persegi, Ia mempunyai sebuah kawah dengan garis tengah ± 800 meter (utara-selatan) dan ± 600 meter (timur-barat). Sedangkan daerah bahayanya berupa lingkaran dengan jari-jari 4 km dari pusat kawah Bromo.   ', 'assets_L/img/Bromoo.jpg'),
(31, 'Studi Kampus', 'UMM', '2024-05-03', 'Awang', 'Suasana indah malam hari kampus putih (Foto: Rino Humas).\r\nBerbagai beasiswa menarik diberikan oleh Universitas Muhammadiyah Malang (UMM). Salah satunya beasiswa bakti untuk bangsa yang memungkinkan mahasiswa baru mendapatkan potongan 100% biaya kuliah semester pertama. Beasiswa ini diperuntukkan bagi para mahasiswa baru yang berprestasi, baik dari segi akademik maupun non akademik. \r\n\r\n“Program ini merupakan beasiswa prestasi yang memberikan kesempatan bagi para siswa sebagai bentuk apresiasi dan kepedulian UMM untuk terus mencerdaskan anak bangsa,” tegas M. Isnaini selaku kepala humas UMM. \r\n\r\nBaca juga : Jelang Idul Adha, UMM Latih Ratusan Juru Sembelih Halal\r\n\r\nIa menegaskan bahwa semua calon mahasiswa baru punya kesempatan untuk mendapatkan beasiswa Bakti untuk Bangsa. Adapun calon mahasiswa fakultas kedokteran, Fikes, dan psikologi akan diberlakukan aturan tersendiri yang sudah disiapkan.\r\n\r\nNantinya, penerima beasiswa akan mendapatkan potongan penuh SPP, yakni 100% pada semester pertama. Jalur ini memungkinkan para camaba untuk mendaftar UMM tanpa tes. Pendaftaran dan seleksi pemberkasan dilakukan pada 10-24 Juni dan langsung diumumkan pada 24 Juni tahun 2024 ini.\r\n\r\nBaca juga : Hadir di UMM, Kepala Perpusnas RI Mulai Fokuskan Digitalisasi Library\r\n\r\n“Para mahasiswa baru juga bisa mendapatkan beasiswa lain saat sudah berkuliah di UMM. Apalagi ada banyak kesempatan beasiswa yang bisa dicoba. Ditambah dengan program entrepreneur yang sudah disiapkan Kampus Putih sehingga mampu mendorong mahasiswa untuk mandiri melalui bisnis dan skill mumpuni,” tambahnya. \r\n\r\nSelain beasiswa Bakti untuk Bangsa, UMM juga membuka beasiswa Kartu Indonesia Pintar (KIP), beasiswa yatim hingga potongan untuk alumni sekolah Muhammadiyah. Pun dengan beasiswa ulama yakni Program Pendidikan Ulama Tarjih (PPUT), beasiswa saudara kandung, dan lain sebagainya. Ini akan memberikan kemudahan dan pilihan bagi para mahasiswa untuk mengembangkan diri dan mendapatkan beasiswa selama menimba ilmu di UMM. (wil)   ', 'assets_L/img/umm.jpg'),
(32, 'Studi Kampus', 'ITN', '2024-05-03', 'Awang', 'Ada banyak keuntungan yang bisa kamu dapat saat kamu kuliah di Institut Teknologi Nasional (ITN) Malang. Selain kamu akan mendapatkan suasana yang nyaman dan sejuk, kamu juga akan mendapatkan berbagai fasilitas yang bisa menunjang pendidikan-mu untuk berkuliah di Institut Teknologi Nasional (ITN) Malang. Beberapa fasilitas yang bisa kamu dapatkan diantaranya adalah:\r\n\r\nGazebo\r\nDi Institut Teknologi Nasional (ITN) Malang terdapat gazebo yang bisa kamu manfaatkan untuk belajar dengan suasana yang sejuk atau bisa kamu gunakan untuk belajar bersama dengan para teman mahasiswa yang berkuliah di Institut Teknologi Nasional (ITN) Malang.\r\n\r\nAula\r\nDi Institut Teknologi Nasional (ITN) Malang terdapat aula yang luas, Aula ini bisa kamu gunakan untuk menjalankan event unit kegiatan mahasiswa yang kamu ikuti\r\nPerpustakaan\r\nTentu informasi yang bisa kamu terima tidak akan datang dari kegiatan belajar mengajar didalam kelas saja. Kamu juga bisa mendapatkan informasi pendidikan dari perpustakaan yang sudah di persiapkan untuk para mahasiswa Institut Teknologi Nasional (ITN) Malang\r\nSarana Ibadah\r\nKebutuhan para mahasiswa tentu tidak akan hanya berkutat pada kebutuhan jasmani saja, tetapi juga kebutuhan rohani. Nah bagi para mahasiswa Institut Teknologi Nasional (ITN) Malang yang datang dari berbagai suku, ras, agama tidak perlu khawatir. Karena Institut Teknologi Nasional (ITN) Malang telah menyediakan sarana ibadah bagi para mahasiswa Institut Teknologi Nasional (ITN) Malang\r\nRusunawa\r\nBagi para mahasiswa Institut Teknologi Nasional (ITN) Malang yang tidak berasal dari kota Malang, kamu bisa menyewa rusunawa yang telah disediakan oleh pihak kampus. Jadi kamu nggak perlu khawatir lagi akan tinggal dimana jika kamu berkuliah disini.\r\nSarana Olahraga\r\nBagi kamu yang ingin menyalurkan minat dan hobi kamu terhadap bidang olahraga, nggak perlu khawatir, karena di kampus ini telah disediakan sarana olahraga yang bisa kamu gunakan kapan saja. Tentunya ini eksklusif bagi para mahasiswa Institut Teknologi Nasional (ITN) Malang.\r\nKantin\r\nTentu kebutuhan akan pangan tidak akan pernah dilupakan oleh pihak kampus. Di Institut Teknologi Nasional (ITN) Malang telah disediakan kantin yang terjangkau, jadi mahasiswa tidak perlu khawatir lagi.\r\nGreen Park\r\nBosan dengan suasana ruang kelas yang penat? Butuh area refreshing? Tidak perlu khawatir! Karena Institut Teknologi Nasional (ITN) Malang sudah menyediakan Green Park yang asri dan memiliki banyak pohon. Jadi, kamu bisa melepas rasa penat ini dengan merasakan angin sepoi-sepoi dari saat beristirahat di taman ini.', 'assets_L/img/itn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `datakategori`
--

CREATE TABLE `datakategori` (
  `id` int NOT NULL,
  `kategori` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `jumlahart` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datakategori`
--

INSERT INTO `datakategori` (`id`, `kategori`, `jumlahart`) VALUES
(1, 'Wisata Gunung ', 2),
(2, 'Pantai Indah di Malang', 2),
(3, 'Studi Kampus', 2),
(7, 'Taman Indah', 2),
(10, 'Hutan di Malang yang Menarik Sekali', 2),
(22, 'Bendungan/Waduk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE `datauser` (
  `id` int NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`id`, `NIM`, `user`, `password`, `email`) VALUES
(2, '210605110145', 'Awang', 'pass123', 'awang@example.com'),
(3, '210605110144', 'a', 'a', 'a@gmail.com'),
(5, '210605110145', 'Awangslp', 'awangslp', 'awangslp@gmail.com'),
(8, 'nim 210605110145', 'awang s', 'awang s', 'awangawang@gmail.com'),
(9, 'aaaasds', 'aaaaaaaaaada', 'aaaaaaadsda', 'aaaaaaaa@gmail.comm'),
(10, 'aaaa', 'aaa', 'aaa', 'aaa@gmail.com'),
(11, '210605110145', 'awang', 'awang', 'awang@gmail.com'),
(12, '210605110145', 'abc', 'abc', 'abc@gmail.com'),
(13, 'nim 210605110145', 'abcdef', 'abcdef', 'admin@gmail.comm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataartikel`
--
ALTER TABLE `dataartikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori`);

--
-- Indexes for table `datakategori`
--
ALTER TABLE `datakategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_kategori` (`kategori`);

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataartikel`
--
ALTER TABLE `dataartikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `datakategori`
--
ALTER TABLE `datakategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `datauser`
--
ALTER TABLE `datauser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dataartikel`
--
ALTER TABLE `dataartikel`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori`) REFERENCES `datakategori` (`kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

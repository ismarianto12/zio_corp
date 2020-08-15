-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2020 at 05:25 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zio`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `albumid` int(10) UNSIGNED NOT NULL,
  `nama_album` varchar(100) NOT NULL,
  `deskirpsi` tinytext NOT NULL,
  `images` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `id_dinas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`albumid`, `nama_album`, `deskirpsi`, `images`, `date`, `status`, `id_dinas`) VALUES
(1, 'Dinas Pertanian dan Ketahanan Pangan Kota Palembang', 'Dinas Pertanian dan Ketahanan Pangan Kota Palembang', '123.jpg', '2018-11-12 11:40:16', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `is_correct` tinyint(4) NOT NULL DEFAULT '0',
  `choice` text COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `qid`, `is_correct`, `choice`) VALUES
(5, 19, 0, '1'),
(6, 19, 1, '2'),
(7, 19, 0, '3'),
(8, 19, 0, '4');

-- --------------------------------------------------------

--
-- Table structure for table `detail_message`
--

CREATE TABLE `detail_message` (
  `id_detail` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `balasan` longtext NOT NULL,
  `tanggal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_news`
--

CREATE TABLE `detail_news` (
  `id_detailnews` int(11) NOT NULL,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `respon` longtext NOT NULL,
  `tanggal_respon` varchar(50) NOT NULL,
  `status_respon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `id_dinas` int(10) UNSIGNED NOT NULL,
  `nama_dinas` varchar(100) DEFAULT NULL,
  `alamat_dinas` varchar(200) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`id_dinas`, `nama_dinas`, `alamat_dinas`, `no_telepon`) VALUES
(1, 'Dinas Kesehatan Kota Palembang', 'Jl. Merdeka No. 72 Palembang', '0711-9393900'),
(2, 'Dinas Pertanian dan Ketahanan Pangan Kota Palembang', 'Jl. TP. H. Sofyan Kenawas Gandus', NULL),
(3, 'Dinas Pekerjaan Umum dan Penataan Ruang Kota Palembang', 'Jl. Slamet Riyadi No. 212 Palembang', NULL),
(5, 'Dinas Pendidikan Kota Palembang', 'JL. Pramuka No.929, Srijaya Km. 5,5 Kel. Srijaya Kec. Alang-alang Lebar, Palembang, Sumatera Selatan 30151', NULL),
(6, 'Dinas Koperasi dan Usaha Kecil Menengah Kota Palembang', 'Jalan Merdeka No. 6 Palembang', NULL),
(7, 'Dinas Perdagangan Kota Palembang', 'Jalan Merdeka No. 6 Palembang', NULL),
(8, 'Kepala Dinas Perindustrian Kota Palembang', 'Jalan Merdeka No. 6 Palembang', NULL),
(9, 'Dinas Tenaga Kerja Kota Palembang', 'Jalan Kapten Anwar Sastro Palembang', NULL),
(10, 'Dinas Kependudukan dan Catatan Sipil ', 'Jalan Demang Lebar Daun No.4255 Palembang', '0811223345666');

-- --------------------------------------------------------

--
-- Table structure for table `estimasi_iuran`
--

CREATE TABLE `estimasi_iuran` (
  `id` int(14) NOT NULL,
  `nomor_form` varchar(30) NOT NULL,
  `jenis_id` int(15) NOT NULL,
  `subkategori_id` int(15) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `tot_bayar` varchar(100) NOT NULL,
  `jhitungadmin1` varchar(30) NOT NULL,
  `jhitungadmin2` varchar(30) NOT NULL,
  `jhitungadmin3` varchar(30) NOT NULL,
  `jpemadmin` varchar(30) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `update_at` datetime NOT NULL,
  `creaate_at` datetime NOT NULL,
  `no_formulir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimasi_iuran`
--

INSERT INTO `estimasi_iuran` (`id`, `nomor_form`, `jenis_id`, `subkategori_id`, `nilai`, `quantity`, `tot_bayar`, `jhitungadmin1`, `jhitungadmin2`, `jhitungadmin3`, `jpemadmin`, `user_id`, `update_at`, `creaate_at`, `no_formulir`) VALUES
(4, '', 1, 3, '5000', '3', '620000', '200000', '200000', '200000', '5000', NULL, '2020-07-29 01:11:00', '2020-07-29 01:11:00', ''),
(5, '', 1, 3, '5000', '121', '1210000', '200000', '200000', '200000', '5000', NULL, '2020-07-29 11:36:42', '2020-07-29 11:36:42', ''),
(6, '', 3, 3, '5000', '12', '665000', '200000', '200000', '200000', '5000', NULL, '2020-07-29 12:18:16', '2020-07-29 12:18:16', ''),
(7, '', 1, 3, '5000', '2', '615000', '200000', '200000', '200000', '5000', NULL, '2020-07-29 12:19:41', '2020-07-29 12:19:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_title` varchar(200) NOT NULL,
  `event_description` varchar(300) NOT NULL,
  `start_date` date NOT NULL,
  `jam` time NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_color` varchar(200) NOT NULL,
  `event_location` varchar(100) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  `id_dinas` int(11) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `date_event` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_title`, `event_description`, `start_date`, `jam`, `event_type`, `event_color`, `event_location`, `is_active`, `id_dinas`, `foto`, `status`, `end_date`, `date_event`, `id_user`) VALUES
(3, 'Kelas III A', 'Mading Kelompok', '2019-01-07', '00:00:00', '', '', 'Palembang', '', 0, NULL, 'Belum', '', '2019-01-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_inputan`
--

CREATE TABLE `form_inputan` (
  `id` int(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_pendaftaran` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `alamatpen` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `transportasi_angkutan` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `jenis1` varchar(50) NOT NULL,
  `ukuran1` varchar(50) NOT NULL,
  `jumlah1` varchar(50) NOT NULL,
  `satuan1` varchar(50) NOT NULL,
  `keterangan1` varchar(50) NOT NULL,
  `jenis2` varchar(50) NOT NULL,
  `ukuran2` varchar(50) NOT NULL,
  `jumlah2` varchar(50) NOT NULL,
  `satuan2` varchar(50) NOT NULL,
  `keterangan2` varchar(50) NOT NULL,
  `jenis3` varchar(50) NOT NULL,
  `ukuran3` varchar(50) NOT NULL,
  `jumlah3` varchar(50) NOT NULL,
  `satuan3` varchar(50) NOT NULL,
  `keterangan3` varchar(50) NOT NULL,
  `jenis4` varchar(50) NOT NULL,
  `ukuran4` varchar(50) NOT NULL,
  `jumlah4` varchar(50) NOT NULL,
  `satuan4` varchar(50) NOT NULL,
  `keterangan4` varchar(50) NOT NULL,
  `jenis5` varchar(50) NOT NULL,
  `ukuran5` varchar(50) NOT NULL,
  `jumlah5` varchar(50) NOT NULL,
  `satuan5` varchar(50) NOT NULL,
  `keterangan5` varchar(50) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_inputan`
--

INSERT INTO `form_inputan` (`id`, `nama`, `email`, `alamat`, `nomor_pendaftaran`, `area`, `penerima`, `alamatpen`, `tanggal`, `transportasi_angkutan`, `keterangan`, `nilai`, `jenis1`, `ukuran1`, `jumlah1`, `satuan1`, `keterangan1`, `jenis2`, `ukuran2`, `jumlah2`, `satuan2`, `keterangan2`, `jenis3`, `ukuran3`, `jumlah3`, `satuan3`, `keterangan3`, `jenis4`, `ukuran4`, `jumlah4`, `satuan4`, `keterangan4`, `jenis5`, `ukuran5`, `jumlah5`, `satuan5`, `keterangan5`, `user_id`, `date_created`, `date_updated`) VALUES
(6, 'aad', 'sad@asdac.com', 'alama', 'asd', 'd', 'asd', 'asd', '0000-00-00', 'adssad', 'asdsasd', 'asdasd', 'asdasd', 'asdad', 'assdaad', 'asdad', 'asdasd', 'asssdadjjo', 'asda', 'adsasd', 'assdasd', 'asdasd', 'asdad', 'asdasd', 'asdasd', 'assdasd', 'asdasd', 'asdasd', 'asdasd', 'sadad', 'sasdasd', 'sadasd', 'sasdas', 'asdsad', 'assdad', 'assdasd', 'asdsad', NULL, '2020-07-21 11:41:38', '2020-07-21 11:41:38'),
(7, 'aad', 'sad@asdac.com', 'alama', 'asd', 'd', 'asd', 'asd', '0000-00-00', 'adssad', 'asdsasd', 'asdasd', 'asdasd', 'asdad', 'assdaad', 'asdad', 'asdasd', 'asssdadjjo', 'asda', 'adsasd', 'assdasd', 'asdasd', 'asdad', 'asdasd', 'asdasd', 'assdasd', 'asdasd', 'asdasd', 'asdasd', 'sadad', 'sasdasd', 'sadasd', 'sasdas', 'asdsad', 'assdad', 'assdasd', 'asdsad', NULL, '2020-07-21 11:41:54', '2020-07-21 11:41:54'),
(8, 'aad', 'sad@asdac.com', 'alama', 'asd', 'd', 'asd', 'asd', '0000-00-00', 'adssad', 'asdsasd', 'asdasd', 'asdasd', 'asdad', 'assdaad', 'asdad', 'asdasd', 'asssdadjjo', 'asda', 'adsasd', 'assdasd', 'asdasd', 'asdad', 'asdasd', 'asdasd', 'assdasd', 'asdasd', 'asdasd', 'asdasd', 'sadad', 'sasdasd', 'sadasd', 'sasdas', 'asdsad', 'assdad', 'assdasd', 'asdsad', NULL, '2020-07-21 11:42:38', '2020-07-21 11:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_gambar`
--

CREATE TABLE `galeri_gambar` (
  `id_gambar` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `foto_galeri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_gambar`
--

INSERT INTO `galeri_gambar` (`id_gambar`, `id_user`, `foto_galeri`) VALUES
(10, 1, 'cbf6776406b77af2417f8995f50c8d82.jpg'),
(11, 1, '537855b4230eac2446027a24cea758c5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri_video`
--

CREATE TABLE `galeri_video` (
  `id_video` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pilihan` varchar(50) NOT NULL,
  `link_embed` longtext NOT NULL,
  `video` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri_video`
--

INSERT INTO `galeri_video` (`id_video`, `id_user`, `pilihan`, `link_embed`, `video`) VALUES
(1, 1, 'embed', '<iframe width=\"1349\" height=\"488\" src=\"https://www.youtube.com/embed/clwMnWLnM0Y\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(2, 1, 'embed', '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/LKrCdjFjjbw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', ''),
(3, 1, 'embed', '<iframe width=\"1349\" height=\"480\" src=\"https://www.youtube.com/embed/4nJu2WnBdyI\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gid` int(10) NOT NULL,
  `aid` int(10) NOT NULL,
  `gname` varchar(1000) NOT NULL,
  `gimages` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `deskripsi` tinytext,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `aid`, `gname`, `gimages`, `date`, `status`, `deskripsi`, `token`) VALUES
(24, 0, '2.jpg', '2.jpg', '2018-11-12 00:00:00', '1', 'test', '0.7147066441187725'),
(25, 0, '1.jpg', '1.jpg', '2018-11-12 00:00:00', '1', 'test', '0.8684021194498518'),
(26, 0, '4.jpg', '4.jpg', '2018-11-12 00:00:00', '1', 'test', '0.22599968505134838'),
(27, 0, '3.jpg', '3.jpg', '2018-11-12 00:00:00', '1', 'test', '0.8157114333139802'),
(28, 0, 'foto.jpg', 'foto.jpg', '2018-11-20 00:00:00', '1', 'test', '0.41327568446192897');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `aid` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `date_answer` date NOT NULL,
  `correct` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`aid`, `id_user`, `qid`, `date_answer`, `correct`, `id_member`) VALUES
(17, 1, 19, '2018-12-05', 1, NULL),
(29, 74, 0, '2018-12-05', 3, NULL),
(30, 1, 0, '2018-12-06', 3, NULL),
(31, 1, 0, '2019-01-03', 3, NULL),
(32, 1, 0, '2019-01-04', 3, NULL),
(33, 76, 0, '2019-01-04', 3, NULL),
(34, 1, 0, '2019-01-05', 3, NULL),
(35, 1, 0, '2019-01-07', 3, NULL),
(36, 1, 0, '2019-01-08', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(14) NOT NULL,
  `jenisnm` varchar(24) NOT NULL COMMENT 'table ini berelasi ke master iuran',
  `user_id` int(10) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `jenisnm`, `user_id`, `category`, `create_at`, `update_at`) VALUES
(1, 'Harian', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Bulanan', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Iuran', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Sumbangan', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Tahunan', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Pembangunan', NULL, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Cash', NULL, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Kredit', NULL, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Transfer', NULL, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(15) NOT NULL,
  `komentar` text,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE `marquee` (
  `id_marque` int(11) NOT NULL,
  `isi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`id_marque`, `isi`) VALUES
(1, 'BKIP MASJID 2020');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` longtext NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `gambar_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `created_at` varchar(50) DEFAULT NULL,
  `updated_at` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_dinas` int(11) DEFAULT NULL,
  `status_kolom_respon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(15) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `date_creted` date NOT NULL,
  `id_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `judul`, `isi`, `date_creted`, `id_user`) VALUES
(4, 'Pengumuman Launching Aplikasi Reskrim Inafis', 'Launching Res-Fis Polrestabes Palembang', '2020-02-07', '1'),
(5, 'uyeee', 'yeye', '2020-02-11', '1');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_profile` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `foto_profile` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `id_user`, `judul_profile`, `deskripsi`, `foto_profile`, `tanggal`) VALUES
(1, 1, 'Demo Aplikasi Web', '<p>Demo Aplikasi web</p>', '8af8af6ad1d35ef835b99c8f39139348.jpg', '18-07-2020 10:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `id_qinti` int(11) NOT NULL,
  `question` text COLLATE utf16_bin NOT NULL,
  `option_1` varchar(100) COLLATE utf16_bin NOT NULL,
  `option_2` varchar(100) COLLATE utf16_bin NOT NULL,
  `option_3` varchar(100) COLLATE utf16_bin NOT NULL,
  `option_4` varchar(100) COLLATE utf16_bin NOT NULL,
  `jawaban` varchar(100) COLLATE utf16_bin NOT NULL,
  `timer` varchar(100) COLLATE utf16_bin NOT NULL,
  `tgl` varchar(100) COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_bin;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `id_qinti`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `jawaban`, `timer`, `tgl`) VALUES
(19, 0, '1 + 1 =', '', '', '', '', '', '60', '2018-12-05'),
(19, 0, '1 + 1 =', '', '', '', '', '', '60', '2018-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `question_inti`
--

CREATE TABLE `question_inti` (
  `id_qinti` int(11) NOT NULL,
  `tanggal_qinti` varchar(100) NOT NULL,
  `waktu_qinti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_inti`
--

INSERT INTO `question_inti` (`id_qinti`, `tanggal_qinti`, `waktu_qinti`) VALUES
(5, '2018-12-01', '80'),
(5, '2018-12-01', '80');

-- --------------------------------------------------------

--
-- Table structure for table `reg_kelengkapan`
--

CREATE TABLE `reg_kelengkapan` (
  `id` int(15) NOT NULL,
  `no_registrasi` varchar(40) NOT NULL,
  `form_pendaftar` varchar(30) DEFAULT NULL,
  `ktp` varchar(14) DEFAULT NULL,
  `npwp` varchar(14) DEFAULT NULL,
  `pas_foto` varchar(14) DEFAULT NULL,
  `data_orang_tua` varchar(14) DEFAULT NULL,
  `data_ujian` varchar(14) DEFAULT NULL,
  `data_ijazah` varchar(14) DEFAULT NULL,
  `data_nilai` varchar(14) DEFAULT NULL,
  `data_sertifikat` varchar(14) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `upatated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_kelengkapan`
--

INSERT INTO `reg_kelengkapan` (`id`, `no_registrasi`, `form_pendaftar`, `ktp`, `npwp`, `pas_foto`, `data_orang_tua`, `data_ujian`, `data_ijazah`, `data_nilai`, `data_sertifikat`, `create_at`, `upatated_at`, `created_by`) VALUES
(1, 'A2312312', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `foto`) VALUES
(0, '022297169827970f8cd4fe0c42f2486e.jpg'),
(0, 'd1e7de26592e4cf9658e12b9830f7d48.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `nama_sponsor` varchar(100) NOT NULL,
  `alamat_sponsor` varchar(100) NOT NULL,
  `deskripsi_sponsor` varchar(100) NOT NULL,
  `email_sponsor` varchar(100) NOT NULL,
  `foto_sponsor` varchar(100) NOT NULL,
  `notelp_sponsor` varchar(100) NOT NULL,
  `long_sponsor` longtext NOT NULL,
  `lat_sponsor` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id_sponsor`, `nama_sponsor`, `alamat_sponsor`, `deskripsi_sponsor`, `email_sponsor`, `foto_sponsor`, `notelp_sponsor`, `long_sponsor`, `lat_sponsor`) VALUES
(3, 'CV. ARP', 'Palembang, Sako, Palembang City, South Sumatra, Indonesia', '<p>tess sponsor</p>', 'arp@gmail.com', 'b0a58b3f20127c96da5e197210ce6500.jpg', '07123123', '104.7754307', '-2.9760735');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `id` int(14) NOT NULL,
  `kategorinm` varchar(24) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `category` enum('0','1') NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `nilai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`id`, `kategorinm`, `user_id`, `category`, `create_at`, `update_at`, `nilai`) VALUES
(2, 'tabungan', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '40000'),
(3, 'sumbangan', 1, '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5000'),
(4, 'Bank Mandiri', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'Bank BCA', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'Bank BRI', 1, '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `id_dinas` int(11) DEFAULT NULL,
  `user_pic` varchar(255) DEFAULT NULL,
  `tanggal_user` varchar(100) DEFAULT NULL,
  `update_at` text,
  `kota` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `desa` varchar(100) DEFAULT NULL,
  `foto_sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `jabatan`, `telepon`, `role`, `id_dinas`, `user_pic`, `tanggal_user`, `update_at`, `kota`, `kecamatan`, `desa`, `foto_sampul`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Andrika Permana', 'mailme.andrikapermana@gmail.com', 'Ka Dinas', '08123456789', 0, NULL, '89fe46dea630713dcbb703be38b6f16e.jpg', '', NULL, 'Palembang', 'Sako', 'Sako', 'e2af833b498e3d39ffee2255a93ac24f.jpg'),
(74, 'kanatagea178', 'bb5625735e08b725efb819202b62aa5e', 'Kanata Age', 'kanata@age.com', NULL, '081384832332', 3, NULL, '4563128bf1f1b8625ad1759b6dcb8dcf.jpg', NULL, NULL, 'Banyuasin', 'Kecamatan Banyuasin', 'Kelurahan Banyuasin', '97f46231aa6360abae1a782e8f4fb241.png'),
(75, 'kuhaku134', 'bb5625735e08b725efb819202b62aa5e', 'Kuhaku', NULL, NULL, '081312345678', 3, NULL, 'b7905d04a6d4ada3cb163baca5dada15.jpg', NULL, NULL, 'Banyuasin', 'Kecamatan Banyuasin', 'Desa Banyuasin', ''),
(76, 'maman45', '0192023a7bbd73250516f069df18b500', 'maman', NULL, NULL, '08123456789', 3, NULL, 'f9e8677b251a981cba2abf7ceb1a1152.jpg', NULL, NULL, 'Palembang', 'ulu', 'ulu', ''),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Andrika Permana', 'mailme.andrikapermana@gmail.com', 'Ka Dinas', '08123456789', 0, NULL, '89fe46dea630713dcbb703be38b6f16e.jpg', '', NULL, 'Palembang', 'Sako', 'Sako', 'e2af833b498e3d39ffee2255a93ac24f.jpg'),
(74, 'kanatagea178', 'bb5625735e08b725efb819202b62aa5e', 'Kanata Age', 'kanata@age.com', NULL, '081384832332', 3, NULL, '4563128bf1f1b8625ad1759b6dcb8dcf.jpg', NULL, NULL, 'Banyuasin', 'Kecamatan Banyuasin', 'Kelurahan Banyuasin', '97f46231aa6360abae1a782e8f4fb241.png'),
(75, 'kuhaku134', 'bb5625735e08b725efb819202b62aa5e', 'Kuhaku', NULL, NULL, '081312345678', 3, NULL, 'b7905d04a6d4ada3cb163baca5dada15.jpg', NULL, NULL, 'Banyuasin', 'Kecamatan Banyuasin', 'Desa Banyuasin', ''),
(76, 'maman45', '0192023a7bbd73250516f069df18b500', 'maman', NULL, NULL, '08123456789', 3, NULL, 'f9e8677b251a981cba2abf7ceb1a1152.jpg', NULL, NULL, 'Palembang', 'ulu', 'ulu', ''),
(0, 'ewqe195', 'e10adc3949ba59abbe56e057f20f883e', 'ewqe', NULL, NULL, '4343', 3, NULL, '78745efe367b4d28e66ea7180e67d633.jpg', NULL, NULL, 'Palembang', 'sa', 'ds', ''),
(0, 'sueb166', 'e10adc3949ba59abbe56e057f20f883e', 'sueb', NULL, NULL, '123456789', 3, NULL, NULL, NULL, NULL, '', '', '', ''),
(0, 'omasmi153', 'e10adc3949ba59abbe56e057f20f883e', 'om isma', NULL, NULL, '654321', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id_visi` int(10) UNSIGNED NOT NULL,
  `visi` text,
  `misi` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gambar_misi` varchar(255) NOT NULL,
  `gambar_visi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visi`
--

INSERT INTO `visi` (`id_visi`, `visi`, `misi`, `created_at`, `updated_at`, `user_id`, `gambar_misi`, `gambar_visi`) VALUES
(1, '<p>“Terwujudnya pendidikan tinggi yang bermutu serta kemampuan iptek dan inovasi untuk mendukung daya saing bangsa”</p>', '<p>Meningkatkan akses, relevansi, dan mutu pendidikan tinggi untuk menghasilkan SDM yang berkualitas; Meningkatkan kemampuan Iptek dan inovasi untuk menghasilkan nilai tambah produk inovasi; dan Mewujudkan tata kelola pemerintahan yang baik dalam rangka reformasi birokrasi teknologi</p>', '2019-07-26 00:50:20', '2018-11-14 18:03:02', 1, '40c6e1aa3bad87de19711fc4db6382c8.png', ''),
(1, '<p>“Terwujudnya pendidikan tinggi yang bermutu serta kemampuan iptek dan inovasi untuk mendukung daya saing bangsa”</p>', '<p>Meningkatkan akses, relevansi, dan mutu pendidikan tinggi untuk menghasilkan SDM yang berkualitas; Meningkatkan kemampuan Iptek dan inovasi untuk menghasilkan nilai tambah produk inovasi; dan Mewujudkan tata kelola pemerintahan yang baik dalam rangka reformasi birokrasi teknologi</p>', '2019-07-26 00:50:20', '2018-11-14 18:03:02', 1, '40c6e1aa3bad87de19711fc4db6382c8.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_message`
--
ALTER TABLE `detail_message`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `detail_news`
--
ALTER TABLE `detail_news`
  ADD PRIMARY KEY (`id_detailnews`);

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id_dinas`);

--
-- Indexes for table `estimasi_iuran`
--
ALTER TABLE `estimasi_iuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_inputan`
--
ALTER TABLE `form_inputan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri_gambar`
--
ALTER TABLE `galeri_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `galeri_video`
--
ALTER TABLE `galeri_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`),
  ADD UNIQUE KEY `gid` (`gid`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquee`
--
ALTER TABLE `marquee`
  ADD PRIMARY KEY (`id_marque`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD UNIQUE KEY `id_profile_2` (`id_profile`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Indexes for table `reg_kelengkapan`
--
ALTER TABLE `reg_kelengkapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id_sponsor`),
  ADD UNIQUE KEY `id_sponsor` (`id_sponsor`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_news`
--
ALTER TABLE `detail_news`
  MODIFY `id_detailnews` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimasi_iuran`
--
ALTER TABLE `estimasi_iuran`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `form_inputan`
--
ALTER TABLE `form_inputan`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `galeri_gambar`
--
ALTER TABLE `galeri_gambar`
  MODIFY `id_gambar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `galeri_video`
--
ALTER TABLE `galeri_video`
  MODIFY `id_video` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reg_kelengkapan`
--
ALTER TABLE `reg_kelengkapan`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

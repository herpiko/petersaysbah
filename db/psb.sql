-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2014 at 01:19 AM
-- Server version: 5.5.32-MariaDB
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `psb`
--
CREATE DATABASE IF NOT EXISTS `psb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `psb`;

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
  `calon_id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_email` varchar(100) NOT NULL,
  `calon_passwd` varchar(225) NOT NULL,
  `calon_nama` varchar(50) NOT NULL,
  `calon_tempatlahir` varchar(10) NOT NULL,
  `calon_tanggallahir` varchar(20) NOT NULL,
  `calon_kelamin` varchar(20) NOT NULL,
  `calon_alamat` varchar(225) NOT NULL,
  `calon_notelp` varchar(20) NOT NULL,
  `calon_nohp` varchar(20) NOT NULL,
  `calon_asal` varchar(50) NOT NULL,
  `calon_nilai` varchar(5) NOT NULL,
  `calon_nilai_a` varchar(5) NOT NULL,
  `calon_nilai_b` varchar(5) NOT NULL,
  `calon_nilai_c` varchar(5) NOT NULL,
  `calon_nilai_d` varchar(5) NOT NULL,
  `calon_nilai_e` varchar(5) NOT NULL,
  `calon_nilai_f` varchar(5) NOT NULL,
  `calon_status` varchar(1) NOT NULL,
  PRIMARY KEY (`calon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`calon_id`, `calon_email`, `calon_passwd`, `calon_nama`, `calon_tempatlahir`, `calon_tanggallahir`, `calon_kelamin`, `calon_alamat`, `calon_notelp`, `calon_nohp`, `calon_asal`, `calon_nilai`, `calon_nilai_a`, `calon_nilai_b`, `calon_nilai_c`, `calon_nilai_d`, `calon_nilai_e`, `calon_nilai_f`, `calon_status`) VALUES
(47, 'cingicanga@gmail.com', '', 'Yanuar Arafat', 'Dompu', '23-04-2014', 'Laki-laki', 'Sumbawa', '123', '123', 'SMP Negeri 5 Dompu', '48', '8', '8', '8', '8', '8', '8', '1'),
(50, 'padfoot.tgz@gmail.com', '', 'Sirius Black', 'Hogmeade', '23-04-2014', 'Laki-laki', 'Hogwarts', '123', '123', 'Hogwarts', '36', '6', '6', '6', '6', '6', '6', '1'),
(51, 'potter_hat@yahoo.com', '', 'Potter Hat', 'asdf', '15-04-2014', 'Laki-laki', 'asfd', '123', '123', 'SMP mana saja', '1', '1', '1', '1', '1', '1', '1', '1'),
(54, 'herpiko@ntb.linux.or.id', '', 'Herpiko Dwi Aguno', 'Mataram', '15-04-2014', 'Laki-laki', 'Mataram', '123', '123', 'SMP Negeri 6 Mataram', '30', '6', '7', '8', '9', '7.5', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `halaman_id` int(5) NOT NULL,
  `halaman_judul` varchar(50) NOT NULL,
  `halaman_isi` mediumtext NOT NULL,
  PRIMARY KEY (`halaman_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `halaman_judul`, `halaman_isi`) VALUES
(0, 'welcome', '<p>Selamat datang di portal di Penerimaan Siswa Baru Online - SMA Negeri 1 Dompu.</p><p>Sebelum memulai silakan baca <strong>alur</strong> dan <strong>petunjuk pendaftaran</strong>.</p>'),
(1, 'alur', '<p>Langkah-langkah untuk menjadi peserta didik di SMAN 1 Negeri Dompu adalah sebagai berikut :</p><ol><li>Tes</li><li>Tes</li><li>Dst...</li></ol>'),
(2, 'jadwal', '<p>Jadwal penyelenggaraan PSB Online&nbsp; tahun ajaran 2014 / 2015 :</p><ul><li>1 Mei 2014 : Pesta</li><li>2 Mei 2014 : Pendaftaran dibuka</li><li>20 Mei 2014 : Pendaftaran ditutup</li><li>22 Mei 2014 : Pengumuman Hasil Seleksi tahap 1</li><li>24 Mei 2014 : Daftar ulang</li></ul>'),
(3, 'dayatampung', '<p>Daya tampung peserta didik untuk tahun ajaran 2014 / 2015 adalah 140 orang.</p><p>Yang nyogok ke laut aje...</p>'),
(4, 'faq', '<p>Bila informasi di halaman ini tidak mencukupi kebutuhan anda, silakan hubungi kami di nomor telepon 1234567890.</p><p>&nbsp;</p><p><strong><em>Tanya : Ini portal apaan?</em></strong></p><p>Jawab : Ini portal PSB online milik Smansadom</p><p>&nbsp;</p><p><strong><em>Tanya : Biaya pendaftarannya berapa?</em></strong></p><p>Jawab : Gratis. Penyelenggaraan PSB ini tidak dipungut biaya.</p><p>&nbsp;</p><p><strong><em>Tanya : Saya tidak dapat login. Setiap klik Login, saya diarahkan ke halaman &quot;Kirim ulang email verifikasi...&quot;.</em></strong></p><p>Jawab : Mungkin anda belum verifikasi email. Silakan cek email anda untuk verifikasi. Jika ini masih terjadi setelah verifikasi, hapus cookies dan cache peramban web anda, kemudian coba lagi.</p><p>&nbsp;</p><p><strong><em>Tanya : Saya gagal mendaftar, terus-menerus mendapat pesan &quot;Your confirmation code does not match the one in the image.&quot;</em></strong></p><p>Jawab : Anda salah mengetikkan kode captcha. Simak kode dan ketik dengan benar.</p><p>&nbsp;</p><p><strong><em>Tanya : Apa itu capthca dan mengapa itu diperlukan?</em></strong></p><p>Jawab : Captcha membantu sistem menyeleksi anda, apakah anda manusia atau sebuah bot (program otomatis) yang mencoba memasuki sistem secara ilegal. Sederhananya, manusia dapat membaca kode captcha yang sengaja diacak, sedangkan bot tidak.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tetapan`
--

CREATE TABLE IF NOT EXISTS `tetapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tetapan` varchar(225) NOT NULL,
  `nilai` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tetapan`
--

INSERT INTO `tetapan` (`id`, `tetapan`, `nilai`) VALUES
(1, 'dayatampung', '150'),
(2, 'tglbuka', '08-04-2014'),
(3, 'tgltutup', '16-04-2014'),
(4, 'tglpengumuman', '25-04-2014');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=54 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$08$VpvwilWnSKiP3MHGhzbMCOYw9e0Q2sBS7ejkwTOgUCOOYXCg.a6V2', 'admin@admin.admin', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-04-04 09:19:41', '2014-03-31 10:46:51', '2014-04-04 01:19:41'),
(46, '', '$2a$08$N.fNSuU32wpZ6FnL/CdpAuK0UevhD5KSspZG1LKdIFWP89URKPd.W', 'cingicanga@gmail.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-04-02 04:07:24', '2014-04-02 04:05:29', '2014-04-01 20:07:24'),
(49, '', '$2a$08$HZFLSosjD2NSmTQ3uxynme1t3.GCiwwgSjoZqvHJ7EMbBG1s6kE5u', 'padfoot.tgz@gmail.com', 0, 0, NULL, NULL, NULL, NULL, '83a9fa70b9d4591fd7139c72f8b3a557', '127.0.0.1', '0000-00-00 00:00:00', '2014-04-02 06:32:03', '2014-04-01 22:32:03'),
(50, '', '$2a$08$H7SPcDuKM1QHe0GWCjWSrufABzvrCJCgctpg.FofS7QHINXawJ1Bm', 'potter_hat@yahoo.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '192.168.168.104', '2014-04-02 11:07:39', '2014-04-02 11:05:58', '2014-04-02 03:07:39'),
(53, '', '$2a$08$nChm8sCDNZspdtz9U38kEuOd0/TRVr9NyYMIm.woPi/t338vmwGOa', 'herpiko@ntb.linux.or.id', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2014-04-02 20:06:21', '2014-04-02 12:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL),
(2, 7, NULL, NULL),
(3, 9, NULL, NULL),
(4, 10, NULL, NULL),
(5, 11, NULL, NULL),
(6, 15, NULL, NULL),
(7, 16, NULL, NULL),
(8, 18, NULL, NULL),
(9, 22, NULL, NULL),
(10, 23, NULL, NULL),
(11, 24, NULL, NULL),
(12, 25, NULL, NULL),
(13, 26, NULL, NULL),
(14, 27, NULL, NULL),
(15, 28, NULL, NULL),
(16, 29, NULL, NULL),
(17, 30, NULL, NULL),
(18, 31, NULL, NULL),
(19, 32, NULL, NULL),
(20, 33, NULL, NULL),
(21, 34, NULL, NULL),
(22, 35, NULL, NULL),
(23, 36, NULL, NULL),
(24, 37, NULL, NULL),
(25, 38, NULL, NULL),
(26, 39, NULL, NULL),
(27, 40, NULL, NULL),
(28, 41, NULL, NULL),
(29, 42, NULL, NULL),
(30, 43, NULL, NULL),
(31, 44, NULL, NULL),
(32, 45, NULL, NULL),
(33, 46, NULL, NULL),
(34, 47, NULL, NULL),
(35, 50, NULL, NULL),
(36, 51, NULL, NULL),
(37, 52, NULL, NULL),
(38, 53, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

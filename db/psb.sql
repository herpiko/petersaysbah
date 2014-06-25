-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2014 at 12:47 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
  `calon_id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `calon_email` varchar(100) NOT NULL,
  `calon_passwd` varchar(225) NOT NULL,
  `calon_selfie` varchar(500) NOT NULL,
  `calon_nama` varchar(50) NOT NULL,
  `calon_panggilan` varchar(50) NOT NULL,
  `calon_kelamin` varchar(20) NOT NULL,
  `calon_tempatlahir` varchar(10) NOT NULL,
  `calon_tanggallahir` varchar(20) NOT NULL,
  `calon_agama` varchar(50) NOT NULL,
  `calon_alamat` varchar(225) NOT NULL,
  `calon_asal` varchar(50) NOT NULL,
  `calon_nis` varchar(10) NOT NULL,
  `calon_nama_ayah` varchar(50) NOT NULL,
  `calon_nama_ibu` varchar(50) NOT NULL,
  `calon_pendidikan_ayah` varchar(50) NOT NULL,
  `calon_pendidikan_ibu` varchar(50) NOT NULL,
  `calon_pekerjaan_ayah` varchar(50) NOT NULL,
  `calon_pekerjaan_ibu` varchar(50) NOT NULL,
  `calon_alamat_ortu` varchar(255) NOT NULL,
  `calon_notelp` varchar(20) NOT NULL,
  `calon_nilai_a` float NOT NULL,
  `calon_nilai_b` float NOT NULL,
  `calon_nilai_c` float NOT NULL,
  `calon_nilai_d` float NOT NULL,
  `calon_nilai_e` float NOT NULL,
  `calon_nilai_f` float NOT NULL,
  `calon_nilai_g` float NOT NULL,
  `calon_nilai_bi_1` float NOT NULL,
  `calon_nilai_bi_2` float NOT NULL,
  `calon_nilai_bi_3` float NOT NULL,
  `calon_nilai_bi_4` float NOT NULL,
  `calon_nilai_bi_5` float NOT NULL,
  `calon_nilai_bi_6` float NOT NULL,
  `calon_nilai_bi_av` float NOT NULL,
  `calon_nilai_ma_1` float NOT NULL,
  `calon_nilai_ma_2` float NOT NULL,
  `calon_nilai_ma_3` float NOT NULL,
  `calon_nilai_ma_4` float NOT NULL,
  `calon_nilai_ma_5` float NOT NULL,
  `calon_nilai_ma_6` float NOT NULL,
  `calon_nilai_ma_av` float NOT NULL,
  `calon_nilai_en_1` float NOT NULL,
  `calon_nilai_en_2` float NOT NULL,
  `calon_nilai_en_3` float NOT NULL,
  `calon_nilai_en_4` float NOT NULL,
  `calon_nilai_en_5` float NOT NULL,
  `calon_nilai_en_6` float NOT NULL,
  `calon_nilai_en_av` float NOT NULL,
  `calon_nilai_bo_1` float NOT NULL,
  `calon_nilai_bo_2` float NOT NULL,
  `calon_nilai_bo_3` float NOT NULL,
  `calon_nilai_bo_4` float NOT NULL,
  `calon_nilai_bo_5` float NOT NULL,
  `calon_nilai_bo_6` float NOT NULL,
  `calon_nilai_bo_av` float NOT NULL,
  `calon_nilai_fi_1` float NOT NULL,
  `calon_nilai_fi_2` float NOT NULL,
  `calon_nilai_fi_3` float NOT NULL,
  `calon_nilai_fi_4` float NOT NULL,
  `calon_nilai_fi_5` float NOT NULL,
  `calon_nilai_fi_6` float NOT NULL,
  `calon_nilai_fi_av` float NOT NULL,
  `calon_status` varchar(3) NOT NULL,
  `calon_alasandis` varchar(500) NOT NULL,
  `semester_all` varchar(200) NOT NULL,
  PRIMARY KEY (`calon_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=467 ;

--
-- Dumping data for table `calon`
--

INSERT INTO `calon` (`calon_id`, `calon_waktu`, `calon_email`, `calon_passwd`, `calon_selfie`, `calon_nama`, `calon_panggilan`, `calon_kelamin`, `calon_tempatlahir`, `calon_tanggallahir`, `calon_agama`, `calon_alamat`, `calon_asal`, `calon_nis`, `calon_nama_ayah`, `calon_nama_ibu`, `calon_pendidikan_ayah`, `calon_pendidikan_ibu`, `calon_pekerjaan_ayah`, `calon_pekerjaan_ibu`, `calon_alamat_ortu`, `calon_notelp`, `calon_nilai_a`, `calon_nilai_b`, `calon_nilai_c`, `calon_nilai_d`, `calon_nilai_e`, `calon_nilai_f`, `calon_nilai_g`, `calon_nilai_bi_1`, `calon_nilai_bi_2`, `calon_nilai_bi_3`, `calon_nilai_bi_4`, `calon_nilai_bi_5`, `calon_nilai_bi_6`, `calon_nilai_bi_av`, `calon_nilai_ma_1`, `calon_nilai_ma_2`, `calon_nilai_ma_3`, `calon_nilai_ma_4`, `calon_nilai_ma_5`, `calon_nilai_ma_6`, `calon_nilai_ma_av`, `calon_nilai_en_1`, `calon_nilai_en_2`, `calon_nilai_en_3`, `calon_nilai_en_4`, `calon_nilai_en_5`, `calon_nilai_en_6`, `calon_nilai_en_av`, `calon_nilai_bo_1`, `calon_nilai_bo_2`, `calon_nilai_bo_3`, `calon_nilai_bo_4`, `calon_nilai_bo_5`, `calon_nilai_bo_6`, `calon_nilai_bo_av`, `calon_nilai_fi_1`, `calon_nilai_fi_2`, `calon_nilai_fi_3`, `calon_nilai_fi_4`, `calon_nilai_fi_5`, `calon_nilai_fi_6`, `calon_nilai_fi_av`, `calon_status`, `calon_alasandis`, `semester_all`) VALUES
(0, '2014-06-24 18:54:30', 'ppdb@sman1dompu.sch.id', '', 'http://ppdb.sman1dompu.sch.id/uploads/selfie/454_16a76ee94e6fae0baa4d5d76abcd5919.jpg', 'Administrator Utama', 'Admin', 'Laki-laki', 'Dompu', '23-06-2014', '-', '-', '-', '123', '-', '-', 'SD', 'SD', '-', '-', '-', '-', 1, 1, 1, 1, 10, 1, 19.2, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0, 0, 0, 0, '', '', '10-10-10-10_10-10-10-10_10-10-10-10_10-10-10-10_10-10-10-10_10-10-10-10');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE IF NOT EXISTS `halaman` (
  `halaman_id` int(5) NOT NULL,
  `halaman_judul` varchar(50) NOT NULL,
  `halaman_isi` mediumtext NOT NULL,
  PRIMARY KEY (`halaman_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`halaman_id`, `halaman_judul`, `halaman_isi`) VALUES
(0, 'welcome', '<p>Selamat datang di portal di Penerimaan Peserta Didik Baru - SMA Negeri 1 Dompu.</p>\n\n<p>Sebagai upaya untuk melaksanakan kegiatan pendidikan yang berkualitas, maka suatu hal yang mutlak dilakukan adalah seleksi awal calon-calon siswa baru. &nbsp;Kegiatan ini merupakan <em>input</em> yang menentukan keberhasilan pelaksanaan proses pendidikan yang menghasilkan <em>output</em> dan <em>outcome</em> terhadap siswa-siswa yang akan melanjutkan studi ke perguruan tinggi.&nbsp;&nbsp;&nbsp;</p>\n\n<p>&nbsp;</p>\n\n<p><strong>Demo halaman administrasi</strong></p>\n\n<ul>\n	<li>user : admin@admin.admin</li>\n	<li>password : admin</li>\n</ul>\n'),
(1, 'alur', '<p>&nbsp;</p>\n\n<p><img src="http://www.ppdb.sman1dompu.sch.id/assets/img/alur.png" /></p>\n'),
(2, 'jadwal', '<p>Pelamar yang lulus &nbsp;melalui PPDB&nbsp;<em>Online</em>&nbsp;akan diumumkan melalui&nbsp;<em>website</em>&nbsp;SMA Negeri 1 Dompu&nbsp;<a href="http://sman1dompu.sch.id/">http://sman1dompu.sch.id</a>&nbsp;pada &nbsp;tanggal &nbsp;:</p>\n\n<p><strong>28 Juni 2014 pukul 12.00</strong></p>\n'),
(3, 'dayatampung', '<p>Daya tampung peserta didik untuk tahun ajaran 2014 / 2015 adalah 140 orang</p>'),
(4, 'faq', '<p>Bila informasi di halaman ini tidak mencukupi kebutuhan anda, silakan hubungi kami di nomor telepon <em>Hotline</em>.</p>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Ini situs apa?</em></strong></p>\n\n<p>Jawab : Ini portal PPDB <em>online</em> milik SMAN 1 Dompu</p>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Biaya pendaftarannya berapa?</em></strong></p>\n\n<p>Jawab : Gratis. Penyelenggaraan PPDB ini tidak dipungut biaya.</p>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Saya sudah mendaftar tetap tidak mendapat email verifikasi.</em></strong></p>\n\n<p>Jawab : Ada tiga kemungkinan :</p>\n\n<ol>\n	<li>Email belum sampai. Anda dapat meminta sistem untuk mengirim ulang email verifikasi dengan mencoba login (meskipun belum verifikasi). Nanti anda akan dialihkan ke halaman kirim ulang email verifikasi.</li>\n	<li>Email yang anda masukkan saat pendaftaran ada kekeliruan atau salah. Anda dapat mencoba mendaftar ulang dengan lebih hati-hati memperhatikan email yang anda input.</li>\n	<li>Email verifikasi masuk ke kotak spam. Silakan cek kotak spam di email anda.</li>\n</ol>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Saya tidak dapat login. Setiap klik Login, saya diarahkan ke halaman &quot;Kirim ulang email verifikasi...&quot;.</em></strong></p>\n\n<p>Jawab : Mungkin anda belum <em>verifikasi email</em>. Silakan cek <em>email</em> anda untuk verifikasi. Jika ini masih terjadi setelah verifikasi, hapus <em>cookies</em> dan <em>cache</em> peramban web anda, kemudian coba lagi.</p>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Data yang saya masukkan ternyata ada kekeliruan.</em></strong></p>\n\n<p>Jawab : Silakan <em>login</em> kemudian masuk ke halaman Profil. Anda dapat menyunting sebagian data anda. Sementara itu, anda tidak dapat menyunting data nilai dan asal sekolah kecuali anda membatalkan pendaftaran dan mencoba mendaftar kembali. Oleh sebab itu, periksalah formulir pendaftaran anda sebelum mengklik &quot;Daftar&quot;</p>\n\n<p>&nbsp;</p>\n\n<p><strong><em>Tanya : Data yang saya masukkan tidak muncul lengkap di halaman profil (nilai-nilai, foto, dan lainnya)</em></strong></p>\n\n<p>Jawab : Ada kemungkinan akses internet yang anda gunakan tidak memadai (terlalu lambat) atau anda menutup tab browser saat halaman pendaftaran sedang diproses. Silakan membatalkan pendaftaran dan mencoba lagi.</p>\n\n<p>&nbsp;</p>\n\n<p><em><strong>Tanya : Mengapa profil saya ditandai &quot;Tidak masuk daftar lulus sementara&quot; dan mengapa peringkat saya berubah terus?</strong></em></p>\n\n<p>Jawab : Urutan peringkat tersebut bersifat sementara dan relatif berubah.</p>\n\n<p>Jika anda terus menerus mendapat status &quot;Tidak masuk daftar lulus sementara&quot;, ada kemungkinan anda tidak lulus. Tapi hal ini belum tentu/pasti sampai tanggal pengumuman. Sebagai alternatif, anda dapat mencoba mendaftar di sekolah lain.</p>\n\n<p>Jadi, terus pantau halaman profil anda untuk melihat apakah anda masih dapat diterima atau tidak.</p>\n\n<p>&nbsp;</p>\n\n<p><em><strong>Tanya : Profil saya ditandai &quot;Belum divalidasi&quot;.</strong></em></p>\n\n<p>Jawab : Anda belum menyerahkan berkas <em>hardcopy</em> ke pihak sekolah atau anda sudah menyerahkan tetapi belum diperiksa oleh pihak sekolah. Jika sudah divalidasi, profil anda akan ditandai &quot;Data valid&quot;</p>\n\n<p>&nbsp;</p>\n\n<p><em><strong>Tanya : Saya tidak dapat mengklik tombol &quot;Daftar&quot;. Sepertinya tidak merespon.</strong></em></p>\n\n<p>Jawab : Mungkin ada <em>form</em> yang belum anda isi atau formatnya salah. Silakan cek kembali. Jika masih tidak bisa, coba untuk merefresh halaman/mengklik lagi menu Pendaftaran.</p>\n\n<p>&nbsp;</p>\n\n<p><em><strong>Tanya : Situs ini sulit diakses / lambat.</strong></em></p>\n\n<p>Jawab : Jika anda yakin hal ini bukan dikarenakan akses internet anda yang bermasalah/lambat, silakan dicoba lagi di waktu dimana kemungkinan trafiknya kembali normal, misalnya pada malam hari.</p>\n'),
(5, 'persyaratan', '<p><strong>KETENTUAN</strong></p>\n\n<ol>\n	<li>\n	<p>Pendaftaran Calon Peserta Didik tidak dipungut biaya apa pun <strong>(GRATIS)</strong></p>\n	</li>\n	<li>\n	<p>Keputusan Tim Seleksi bersifat mutlak/tidak dapat diganggu gugat</p>\n	</li>\n	<li>\n	<p>Dalam hal penetapan tidak dilakukan dengan surat menyurat.</p>\n	</li>\n</ol>\n\n<p><strong>PERSYARATAN UMUM</strong></p>\n\n<ol>\n	<li>\n	<p>Siswa &nbsp;SMP/MTs yang pada tahun 2013/2014 duduk di kelas IX.</p>\n	</li>\n	<li>\n	<p>Lulus SMP/MTs/Paket B Setara dan memiliki Ijazah atau surat keterangan yang berpenghargaan sama dengan Ijazah yang dikeluarkan oleh lembaga pendidikan.</p>\n	</li>\n	<li>\n	<p>Memiliki SKHUN SMP/MTs dan SKHUNPK Paket B Setara</p>\n	</li>\n	<li>\n	<p>Berusia Maksimal&nbsp;18 Tahun pada awal tahun pelajaran 2014/2015</p>\n	</li>\n	<li>\n	<p>Apabila pada saat pendaftaran belum menerima Dokumen sebagaimana dimaksud pada poin 2 dan 3 maka dapat menggunakan SURAT KETERANGAN yang dikeluarkan oleh sekolah penyelenggara Ujian Nasional.</p>\n	</li>\n</ol>\n\n<p><strong>PERSYARATAN KHUSUS</strong></p>\n\n<ol>\n	<li>\n	<p>Mengentri nilai raport semester I s.d. VI&nbsp;</p>\n	</li>\n	<li>Mata Pelajaran yang dientrikan :<br />\n	*Matematika<br />\n	*Bahasa Indonesia<br />\n	*Bahasa Inggris<br />\n	*IPA Biologi<br />\n	*IPA Fisika</li>\n	<li>Mengentri nilai Ujian Akhir Nasional <strong>(UAN)</strong>&nbsp;murni bukan Nilai Akhir <strong>(NA)</strong></li>\n	<li>Mengunggah file foto ke aplikasi dengan ketentuan : berwarna, latar merah, format *JPG, ukuran file maksimal 500kb</li>\n</ol>\n\n<p><strong>PERSYARATAN BERKAS<br />\nPersyaratan ini hanya berlaku bagi Siswa yang dinyatakan <strong style="color:green">&quot;Masuk daftar lulus sementara&quot;</strong> dan diserahkan sebelum pendaftaran ditutup.</strong></p>\n\n<ol>\n	<li>\n	<p>Menyerahkan bukti pendaftaran.</p>\n	</li>\n	<li>\n	<p>Fotocopy Ijazah yang dilegalisir Kepala&nbsp;SMP/MTs rangkap dua.</p>\n	</li>\n	<li>\n	<p>Fotocopy transkrip nilai raport semester I s.d. VI yang dilegalisir Kepala SMP/MTs rangkap dua.</p>\n	</li>\n	<li>\n	<p>Pas foto berwarna ukuran (3x4)&nbsp;3 lembar dengan latar merah.</p>\n	</li>\n	<li>\n	<p>Berkas diserahkan dalam map folio.</p>\n	</li>\n</ol>\n'),
(6, 'result', 'hasil pengumuman');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah_asal`
--

CREATE TABLE IF NOT EXISTS `sekolah_asal` (
  `sch_id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_name` varchar(50) NOT NULL,
  `sch_multipler` float NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sekolah_asal`
--

INSERT INTO `sekolah_asal` (`sch_id`, `sch_name`, `sch_multipler`) VALUES
(1, 'SMP Negeri 1 Dompu', 1.5),
(2, 'SMP Negeri 2 Dompu', 1.35),
(3, 'SMP Negeri 3 Dompu', 1.25),
(4, 'SMP Negeri 4 Dompu', 1.35),
(5, 'SMP Negeri 5 Dompu', 1.25),
(6, 'SMP Negeri 6 Dompu', 1.25),
(7, 'SMP Negeri 7 Dompu', 1.25),
(8, 'SMP Negeri 1 Woja', 1.35),
(9, 'SMP Negeri 2 Woja', 1.25),
(10, 'SMP Negeri 3 Woja', 1.25),
(11, 'SMP Negeri 4 Woja', 1.25),
(12, 'MTs Kandai II Woja', 1.25),
(13, 'SMP Negeri 1 Pajo', 1.35),
(14, 'SMP Negeri 2 Pajo', 1.25),
(15, 'MTs Al-Kautsar Pajo', 1.35),
(16, 'SMP Negeri 1 Manggelewa', 1.35),
(17, 'SMP Negeri 2 Manggelewa', 1.25),
(18, 'SMP Negeri 3 Manggelewa', 1.25),
(19, 'SMP Negeri 1 Kempo', 1.5),
(20, 'SMP Negeri 2 Kempo', 1.25);

-- --------------------------------------------------------

--
-- Table structure for table `tetapan`
--

CREATE TABLE IF NOT EXISTS `tetapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tetapan` varchar(225) NOT NULL,
  `nilai` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tetapan`
--

INSERT INTO `tetapan` (`id`, `tetapan`, `nilai`) VALUES
(1, 'dayatampung', '170'),
(2, 'tglbuka', '23-06-2014'),
(3, 'tgltutup', '26-06-2014'),
(4, 'tglpengumuman', ''),
(5, 'sekolahlain', '1.25');

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
  `level` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'calon',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=467 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `level`) VALUES
(0, 'admin', '$2a$08$wjpY/FY3uKdTpxrImaywauPexcU3S.zVxhNzdjiqH5iwStHwffa0O', 'admin@admin.admin', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2014-06-25 20:46:35', '0000-00-00 00:00:00', '2014-06-25 12:46:35', 'admin');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('ebe65bf726d6bd743e5bfce48c28e31c', 96, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1', '182.0.79.234', '2014-06-23 00:31:15'),
('89315c04b1ab1d31631807410018203a', 118, 'Mozilla/5.0 (X11; Linux i686; rv:30.0) Gecko/20100101 Firefox/30.0', '180.249.172.250', '2014-06-23 02:03:37'),
('c07fd155f068b387946be9441b07da87', 409, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/33.0.1750.18 Safari/537.36', '180.249.173.231', '2014-06-24 09:28:06'),
('82aadf159bcdc945f50a5e8ac5eb8272', 163, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '36.75.171.149', '2014-06-23 03:35:45'),
('3b070568446c711eea8103d2cba92838', 154, 'Opera/9.80 (Android; Opera Mini/7.5.35199/35.2989; U; en) Presto/2.8.119 Version/11.10', '141.0.8.96', '2014-06-23 04:18:07'),
('70fec529d638af3a2564664448e9466b', 236, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:30.0) Gecko/20100101 Firefox/30.0', '36.85.104.252', '2014-06-23 07:18:42'),
('451eff1529566dfe6b1fc9f7952a73ca', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.43 Spark/2.x Safari/537.31', '180.249.168.80', '2014-06-23 17:10:48'),
('39fcf39e919ea72ff503c4db5a21db4b', 332, 'Mozilla/5.0 (Windows NT 5.1; rv:13.0) Gecko/20100101 Firefox/13.0.1', '36.75.227.25', '2014-06-24 02:55:45'),
('dc257bd65c78a1010d3c5aa83b411443', 336, 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0', '36.75.170.143', '2014-06-24 03:18:03'),
('2731b1c47e7351ded12e9ba57ca55d59', 349, 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0', '180.249.169.50', '2014-06-24 03:38:41'),
('01084e383957fe4b3eb3fb2f3eeeb4e9', 348, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.803.0 Safari/535.1', '36.75.227.43', '2014-06-24 04:20:49'),
('09c712e8ed6394cab41945b6745a05c9', 387, 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0', '36.75.170.205', '2014-06-24 07:26:16'),
('a482a679627bc296f977e98bfe36dbd5', 405, 'Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '36.75.229.110', '2014-06-24 08:34:57'),
('628bb86f53c5cbfe3e43ace6fe782522', 423, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36', '36.85.103.161', '2014-06-24 11:28:09');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

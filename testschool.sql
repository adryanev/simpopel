-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 08:46 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testschool`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getLakiLaki` ()  NO SQL
SELECT DISTINCT idPelanggaran from pelanggaran_all_time where jenisKelamin = 'L'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getPerempuan` ()  NO SQL
SELECT DISTINCT idPelanggaran FROM pelanggaran_all_time WHERE pelanggaran_all_time.jenisKelamin = 'P'$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `UC_Words` (`str` VARCHAR(255)) RETURNS VARCHAR(255) CHARSET latin1 BEGIN
  DECLARE c CHAR(1);
  DECLARE s VARCHAR(255);
  DECLARE i INT DEFAULT 1;
  DECLARE bool INT DEFAULT 1;
  DECLARE punct CHAR(17) DEFAULT ' ()[]{},.-_!@;:?/';
  SET s = LCASE( str );
  WHILE i < LENGTH( str ) DO
     BEGIN
       SET c = SUBSTRING( s, i, 1 );
       IF LOCATE( c, punct ) > 0 THEN
        SET bool = 1;
      ELSEIF bool=1 THEN
        BEGIN
          IF c >= 'a' AND c <= 'z' THEN
             BEGIN
               SET s = CONCAT(LEFT(s,i-1),UCASE(c),SUBSTRING(s,i+1));
               SET bool = 0;
             END;
           ELSEIF c >= '0' AND c <= '9' THEN
            SET bool = 0;
          END IF;
        END;
      END IF;
      SET i = i+1;
    END;
  END WHILE;
  RETURN s;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_all_time`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_all_time` (
`idPelanggaran` int(11)
,`idSiswa` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`jenisKelamin` varchar(1)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`sanksiPoin` int(3)
,`kelas` varchar(10)
,`waktuKejadian` datetime
,`foto` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_xii_ipa`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_xii_ipa` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_xii_ips`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_xii_ips` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_xi_ipa`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_xi_ipa` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_xi_ips`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_xi_ips` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_x_ipa`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_x_ipa` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pelanggaran_x_ips`
-- (See below for the actual view)
--
CREATE TABLE `pelanggaran_x_ips` (
`idPelanggaran` int(11)
,`nis` int(6)
,`nama` varchar(50)
,`idPeraturan` varchar(5)
,`namaPelanggaran` varchar(100)
,`jenisPelanggaran` int(1)
,`kelas` varchar(10)
,`waktuKejadian` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `tabelguru`
--

CREATE TABLE `tabelguru` (
  `idGuru` int(3) NOT NULL,
  `nip` varchar(21) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempatLahir` varchar(13) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `jabatan` varchar(17) DEFAULT NULL,
  `status` varchar(3) DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `bidangStudi` varchar(20) DEFAULT NULL,
  `tamat` int(4) DEFAULT NULL,
  `masaKerja` int(3) DEFAULT NULL,
  `alamat` varchar(31) DEFAULT NULL,
  `noHp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabelguru`
--

INSERT INTO `tabelguru` (`idGuru`, `nip`, `nama`, `tempatLahir`, `tanggalLahir`, `jabatan`, `status`, `pendidikan`, `bidangStudi`, `tamat`, `masaKerja`, `alamat`, `noHp`) VALUES
(1, '19610610 198703 1 003', 'Drs. M. YASIN ', 'Medan', '1961-10-06', 'Kepala Madrasah', 'PNS', 'S1 TARBIYAH', 'FIQIH', 1991, 25, 'Jl Marsan Perum Putri 7 Panam', '081365411761'),
(2, '19710122 199703 2 004', 'SRI REZEKI, M.Pd ', 'Bagansiapiapi', '1971-01-22', 'Waka Kurikulum', 'PNS', 'S2 FKIP BIOLOGI', 'BIO', 1999, 17, 'Hangtuah Gg Sentosa sail', '081371155448'),
(3, '19610609 199103 1 001', 'Drs. H. SYAHRIL ', 'Selat Panjang', '1961-09-06', 'Waka Sarana', 'PNS', 'S1 TARBIYAH', 'AA', 1995, 21, 'Merpati Sakti', '081378651150'),
(4, '', 'Drs. H. ANANG MASDARI', 'Enok', '1964-11-26', 'Guru', 'GT', 'S1 TARBIYAH', 'QURAN HADITS', 1992, 24, 'Jl. Pinang Gg Pinang 1 Wonorejo', '08127630370'),
(5, '', 'JUNADI Amd', 'Pekanbaru', '1970-06-20', 'Guru', 'GT', 'D3 AKUNTANSI', 'EKO/MUL/OR', 1998, 18, 'Kubang Kampar', '08127530765'),
(6, '19631020 198303 2 001', 'Ir. NOVELDA', 'Pekanbaru', '1963-10-20', 'Guru', 'PNS', 'S1 KIMIA', 'KIMIA', 1998, 18, 'Jl. Kopen Tangkerang tengah', '081536877128'),
(7, '', 'CHAIRUNAS, S.Ag', 'Dabo Singkep', '1970-10-23', 'Ka. TU', 'PTT', 'S1 DAKWAH', 'TIK/KET', 2000, 16, 'Jl. Dakota tangkerang tengah', '081365749835'),
(8, '', 'VERSIONA DESIOLA, S.Pd', 'Duri', '1974-12-01', 'Guru/wli XII IPA', 'GTT', 'S1 FKIP', 'S. BUDAYA/KET', 2008, 8, 'Kubang Kampar', '081365200265'),
(9, '', 'WITRA WILIS, S,Sos', 'Pekanbaru', '1981-05-13', 'Guru/wli X 2', 'GTT', 'S1 SOSIOLOGI', 'SOSIOLOGI', 2008, 8, 'Kubang Kampar', '081378242404'),
(10, '', 'YANTI, S.Pd.I', 'Pekanbaru', '1974-02-08', 'Guru/Bend/XII IPS', 'GTT', 'S1 PAI', 'SKI/SEJARAH', 2008, 8, 'Jl Dakota Tangkerang tengah', '08127630834'),
(11, '', 'DR. SUDARNO, S.Pd. MM', 'Bolakrejo', '1969-12-29', 'Guru', 'GTT', 'S3 MANAGEMENT', 'AKUNTANSI', 2009, 7, 'Jl. Pandan Sakti', '08127512414'),
(12, '', 'NURHAENIY, S.Pd', 'Jakarta', '1974-12-02', 'Guru', 'GTT', 'S1 FKIP', 'AKUNTANSI', 2009, 7, 'Tampan Permai', '08127512414'),
(13, '19751207 200710 2 002', 'AYUSMIDAR, S.Ag ', 'Baserah', '1975-12-07', 'Guru/wli X 1', 'PNS', 'S1 TARBIYAH BA', 'B. Arab', 2010, 6, 'Jl Sembilang', '08127512414'),
(14, '150429157', 'ETIK NURATIKA, S.Pd ', 'Lamongan', '1980-05-15', 'Guru/wli XI IPS', 'PNS', 'S1 AKUNTANSI', 'Ekonomi/PKn', 2010, 6, 'Kmplk MAN 2 pku', '08127512414'),
(15, '', 'RONI JUNAIDI, SE', 'Kabanjahe ', '1978-10-06', 'Guru', 'GTT', 'S1 EKONOMI', 'KET PERCT', 2010, 6, 'Jl. Todak', '08127512414'),
(16, '', 'ETTY RISNAWATI, SH', 'Rengat', '1970-01-21', 'STAF TU', 'PTT', 'S1 HUKUM', 'Staf TU', 2011, 5, 'Jl. Inpres/Wonosari marpoyan ', '08127512414'),
(17, '', 'RAMLI SAPUTRA, Amd', 'Pekanbaru', '1982-07-10', 'Guru', 'GTT', 'D3 EKONOMI', 'Sejarah', 2012, 4, 'Jl. Katio', '08127512414'),
(18, '', 'LUCIA HELEN DEWI ARIANI, S.Pd', 'Padang', '1988-06-07', 'Guru', 'GTT', 'S1 FKIP', 'Matematika', 2015, 1, 'Jl. Eka Tunggal Purwodadi Panam', '08127512414'),
(19, '', 'SUTINI, S.Pd', 'Sidomulyo', '1990-04-10', 'Guru', 'GTT', 'S1 FKIP', 'B, Indonesia', 2015, 1, 'Jl. Paus no 104 Tangk Tengah', '085264554429'),
(20, '', 'MAHESA DEWA TORNANDO, S.Pd', 'Tembilahan', '1993-04-21', 'GURU', 'GTT', 'S1 FKIP', 'B. INGGRIS', 2016, 0, 'Jl. SRIKANDI ', '08127512414'),
(21, '', 'DERRY SYAHPUTRA, S.Pd', 'Pekanbaru', '1990-07-16', 'GURU', 'GTT', 'S1 FKIP', 'PORKES', 2016, 0, 'Jl. T. BAY PEPUTRA JAYA', '08127512414'),
(22, '', 'MUHAMMAD AKBAR ROSYIDI DATMI, Lc', 'Sei. Merbau', '1991-07-22', 'GURU', 'GTT', 'S1 SYARIAH', 'TAHSIN', 2016, 0, 'PERUM PUTRI TUJUH BLK GG N 2', '08127512414'),
(23, '', 'DESHAYATUL WASNA, S.Pd', 'Lunto', '1991-12-18', 'GURU', 'GTT', 'S1 GEOGRAFI', 'GEOGRAFI', 2016, 0, 'Jl. CENDRAWASIH SAKTI PANAM', '08127512414'),
(24, '', 'M. RIFQI MAULANA, S.Pd', 'Duri', '1994-04-30', 'GURU', 'GTT', 'S1 FISIKA', 'FISIKA', 2016, 0, 'Jl. SWAKARYA PANAM', '08127512414');

-- --------------------------------------------------------

--
-- Table structure for table `tabelkategori`
--

CREATE TABLE `tabelkategori` (
  `idKategori` int(1) NOT NULL,
  `namaKategori` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelkategori`
--

INSERT INTO `tabelkategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Ringan'),
(2, 'Sedang'),
(3, 'Berat');

-- --------------------------------------------------------

--
-- Table structure for table `tabelpelanggaran`
--

CREATE TABLE `tabelpelanggaran` (
  `idPelanggaran` int(11) NOT NULL,
  `idSiswa` int(11) DEFAULT NULL,
  `idPeraturan` varchar(5) DEFAULT NULL,
  `waktuKejadian` datetime DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelpelanggaran`
--

INSERT INTO `tabelpelanggaran` (`idPelanggaran`, `idSiswa`, `idPeraturan`, `waktuKejadian`, `foto`) VALUES
(1, 1, 'PR001', '2017-04-26 15:29:19', 'fotopelanggaran.jpg'),
(2, 3, 'PR003', '2017-04-27 09:09:35', 'fotopelanggaran2.jpg'),
(3, 1, 'PR002', '2017-04-29 12:16:21', 'fotopelanggaran3.jpg'),
(4, 40, 'PR007', '2017-04-30 13:19:47', 'fotopelanggaran4.jpg'),
(5, 5, 'PR004', '2017-05-01 07:11:28', 'fotopelanggaran5.jpg'),
(6, 1, 'PR025', '2017-05-03 10:22:31', 'fotopelanggaran3.jpg'),
(7, 0, 'PR025', '2017-05-28 07:50:38', 'fotopelanggaran3.jpg'),
(8, 0, 'PR025', '2017-05-28 07:58:37', 'fotopelanggaran3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabelperaturan`
--

CREATE TABLE `tabelperaturan` (
  `idPeraturan` varchar(5) NOT NULL,
  `namaPelanggaran` varchar(100) DEFAULT NULL,
  `jenisPelanggaran` int(1) DEFAULT NULL,
  `sanksiPoin` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabelperaturan`
--

INSERT INTO `tabelperaturan` (`idPeraturan`, `namaPelanggaran`, `jenisPelanggaran`, `sanksiPoin`) VALUES
('PR001', 'Terlambat masuk belajar pagi hari.', 1, 5),
('PR002', 'Memakai pakaian olahraga di jam pelajaran lain.', 1, 10),
('PR003', 'Terlambat masuk pada pergantian jam pelajaran.', 1, 10),
('PR004', 'Tidak memakai seragam madrasah.', 1, 20),
('PR005', 'Tidak memakai atribut MA hasanah.', 1, 20),
('PR006', 'Tidak memakai pakaian olahraga pada saat jam olahraga.', 1, 20),
('PR007', 'Tidak berpakaian rapi.', 1, 20),
('PR008', 'Merubah model pakaian madrasah.', 1, 20),
('PR009', 'Memakai jilbab border, sarung, transparan dan tipis.', 1, 20),
('PR010', 'Membuang sampah sembarangan.', 1, 20),
('PR011', 'Tidak membawa buku pelajaran.', 1, 20),
('PR012', 'Tidak mengikuti (Upacara, Rohis, Senam).', 1, 20),
('PR013', 'Tidak memakai sepatu & bertali + Kaos kaki putih.', 1, 20),
('PR014', 'Tidak memakai seragam madrasah.', 1, 20),
('PR015', 'Merayakan ulang tahun dengan mengotori diri dan lingkungan sekolah.', 1, 20),
('PR016', 'Kuku dan rambut panjang atau dicat.', 1, 20),
('PR017', 'Rambut yang di model-modelkan.', 1, 20),
('PR018', 'Tidak membuat PR.', 1, 20),
('PR019', 'Berada di kantin saat jam pelajaran.', 1, 20),
('PR020', 'Memakai gelang, kalung, anting bagi putra.', 1, 20),
('PR021', 'Mencukur alis.', 1, 20),
('PR022', 'Ber make up.', 1, 20),
('PR023', 'Berkata kotor/berkata makian (tidak sopan).', 1, 25),
('PR024', 'Tidak menjaga kebersihan lingkungan madrasah.', 1, 25),
('PR025', 'Tidak menjalankan piket kelas / piket madrasah.', 1, 25),
('PR026', 'Absen tanpa berita.', 1, 25),
('PR027', 'Membawa / main kartu atau alat permainan lainnya yang mengandung unsur judi.', 1, 25),
('PR028', 'Berkelahi di madrasah, lingkungan/ diluar madrasah, berpakaian seragam madrasah.', 1, 25),
('PR029', 'Mengganggu proses belajar mengajar.', 1, 25),
('PR030', 'Cabut pada jam pelajaran.', 1, 50),
('PR031', 'Keluar perkarangan madrasah tanpa seiin piket.', 1, 50),
('PR032', 'Meloncat pagar.', 1, 50),
('PR033', 'Bertindik bagi laki-laki, dan perempuan selain telinga.', 1, 50),
('PR034', 'Merokok.', 2, 100),
('PR035', 'Merubah pakaian madrasah.', 2, 100),
('PR036', 'Menggunakan hp pada jam pelajaran (kecuali di izinkan karena kebutuhan belajar).', 2, 200),
('PR037', 'Melakukan Perbuatan yang Mendekati Zina.', 2, 200),
('PR038', 'Tidak Sholat Dzuhur Berjamaah.', 2, 200),
('PR039', 'Mencoret / melukis lingkungan sekolah.', 2, 200),
('PR040', 'Merusak Fasilitas Madrasah..', 2, 200),
('PR041', 'Merusak Peralatan Sekolah.', 2, 200),
('PR042', 'Berkelahi Di Lingkungan Madrasah Hingga Melukai.', 2, 200),
('PR043', 'Mencuri.', 3, 250),
('PR044', 'Membawa HP Android dan yang Sejenisnya atau Alat Elektronik Lainnya', 3, 250),
('PR045', 'Merayakan Valentine Day.', 3, 250),
('PR046', 'Menyebar Berita Bohong (Provokator, Fitnah, Penipuan).', 3, 250),
('PR047', 'Melawan Dan Memaki Serta Mencemarkan Nama Baik Guru/karyawan Madrasah..', 3, 250),
('PR048', 'Membawa gambar porno dalam bentuk media apapun.', 3, 500),
('PR049', 'Melakukan penganiayaan/pengeroyokan.', 3, 500),
('PR050', 'Melakukan pemerasan.', 3, 500),
('PR051', 'Merusak kendaraan orang lain di lingkungan madrasah.', 3, 500),
('PR052', 'Membawa senjata tajam ke madrasah.', 3, 500),
('PR053', 'Mencemarkan nama baik madrasah.', 3, 500),
('PR054', 'Membawa minuman keras ke madrasah.', 3, 500),
('PR055', 'Melempar rumah orang berseragam madrasah.', 3, 500),
('PR056', 'Tawuran.', 3, 500),
('PR057', 'Memukul guru / karyawan madrasah.', 3, 1000),
('PR058', 'Berzina.', 3, 1000),
('PR059', 'Melakukan tindakan kriminal.', 3, 1000),
('PR060', 'Memakai Pakaian Perempuan Bagi Laki-Laki', 3, 1000),
('PR061', 'Pergi ke Tempat Maksiat', 3, 1000),
('PR062', 'Melakukan Hal Yang Menyakiti Khalayak Ramai', 3, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tabelsiswa`
--

CREATE TABLE `tabelsiswa` (
  `idSiswa` int(11) NOT NULL,
  `nis` int(6) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempatLahir` varchar(30) DEFAULT NULL,
  `tanggalLahir` date DEFAULT NULL,
  `jenisKelamin` varchar(1) DEFAULT NULL,
  `namaOrtu` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `agama` varchar(5) DEFAULT NULL,
  `usia` int(2) DEFAULT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `totalPoin` int(3) DEFAULT NULL,
  `pasFoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabelsiswa`
--

INSERT INTO `tabelsiswa` (`idSiswa`, `nis`, `nama`, `tempatLahir`, `tanggalLahir`, `jenisKelamin`, `namaOrtu`, `alamat`, `agama`, `usia`, `nisn`, `kelas`, `totalPoin`, `pasFoto`) VALUES
(0, 2147483647, 'Adryan Eka Vandra', 'Tembilahan', '1996-08-09', 'L', 'Indra Supriadi', 'Jl Melati Indah, Delima', 'Islam', 21, '9992838273', 'XII IPA', 250, 'photo_2017-05-02_15-39-54.jpg'),
(1, 1126, 'Cia Afelia', 'Pekanbaru', '1999-04-04', 'P', 'Sutejo', 'Jl. Mandala Gg Assyakirin', 'Islam', 18, '9990530431', 'XII IPS', 40, 'profile.jpg'),
(2, 1128, 'Fadli Fahrezi', 'Medan', '1999-11-02', 'L', 'Jefri Sani', 'Jl. Lokan No 17', 'Islam', 18, '9990533930', 'XII IPS', 0, 'profile.jpg'),
(3, 1129, 'Fajar Pratama', 'Pekanbaru', '1999-09-09', 'L', 'Afriyun', 'Jl. Tengku Bay Hidayah', 'Islam', 18, '9990517065', 'XII IPS', 10, 'profile.jpg'),
(4, 1130, 'Ferby Hidayat Zafitra', 'Sei Sarik', '1998-07-31', 'L', 'Zainudin By Itam', 'Jl. Cipta Karya Perum Cki 28', 'Islam', 19, '9980657902', 'XII IPS', 0, 'profile.jpg'),
(5, 1132, 'Jhuraeis Al-Jufwa', 'Pekanbaru', '1999-05-05', 'L', 'Jufri Alfaruq Mirohi', 'Jl. Angkatan 45', 'Islam', 18, '9990533720', 'XII IPS', 20, 'profile.jpg'),
(6, 1133, 'M. Tarmizi', 'Sidomulyo', '2000-02-05', 'L', 'Misni', 'Jl. Paus/Sembilang', 'Islam', 17, '2083652', 'XII IPS', 0, 'profile.jpg'),
(7, 1135, 'Novrila Z', 'Pekanbaru', '1998-11-16', 'P', 'Jasri Zaini', 'Jl. Kapau Sari', 'Islam', 19, '9980578380', 'XII IPS', 0, 'profile.jpg'),
(8, 1136, 'Rahmat Zalis', 'Tanjung Pinang', '1996-11-21', 'L', 'Afrizal', 'Jl. Pasir Putih Pandau', 'Islam', 21, '9961993250', 'XII IPS', 0, 'profile.jpg'),
(9, 1138, 'Sayyidina Abdul Alim Ra', 'Pekanbaru', '1999-06-07', 'L', 'Abdul Razak (Alm)', 'Jl. Dakota Pekanbaru', 'Islam', 18, '9992620009', 'XII IPS', 0, 'profile.jpg'),
(10, 1139, 'Shilva Jasmine Belladina', 'Brebes', '1999-09-02', 'P', 'Ir. Darminto', 'Komp Villa Inah Paus C 49', 'Islam', 18, '9990517634', 'XII IPS', 0, 'profile.jpg'),
(11, 1140, 'Tia Purnama Sari', 'Pekanbaru', '1998-08-06', 'P', 'Edrizal', 'Jl. Dagang Gg Mualimin', 'Islam', 19, '9980909295', 'XII IPS', 0, 'profile.jpg'),
(12, 1141, 'Utari Velliza Maretta', 'Pekanbaru', '1999-03-17', 'P', 'Mujali', 'Jl. Hangtuah Ujung', 'Islam', 18, '9992788354', 'XII IPS', 0, 'profile.jpg'),
(13, 1142, 'Verawati Fajrin', 'Pasir Luhur', '1999-05-17', 'P', 'Suwandi', 'Pasir Luhur', 'Islam', 18, '9992784334', 'XII IPS', 0, 'profile.jpg'),
(14, 1143, 'Wahyu Arya. c', 'Pekanbaru', '1999-10-30', 'L', 'Tony Carradine', 'Jl. Paus 106', 'Islam', 18, '9990534083', 'XII IPS', 0, 'profile.jpg'),
(15, 1145, 'Yulia Roza', 'Gobah', '1998-09-09', 'P', 'Yusri', 'Jl. Brana Gg Matahari', 'Islam', 19, '9981003293', 'XII IPS', 0, 'profile.jpg'),
(16, 1148, 'Reni Triza', 'Pekanbaru', '1999-06-01', 'P', 'Inton Nasution', 'Pekanbaru', 'Islam', 18, '9992829025', 'XII IPS', 0, 'profile.jpg'),
(17, 1149, 'Nia Aprilina. Zs', 'Pekanbaru', '1999-04-25', 'P', 'Zulheri Za', 'Marpoyan', 'Islam', 18, '9990519758', 'XII IPS', 0, 'profile.jpg'),
(18, 1191, 'Yuliani', 'Pekanbaru', '1996-05-22', 'P', 'Nasrun', 'Jl. Puyuh Mas', 'Islam', 21, '9963068727', 'XII IPS', 0, 'profile.jpg'),
(19, 1193, 'Fakhrory Septian Alzi', 'Pekanbaru', '1999-09-05', 'L', 'Ali Abuzar', 'Jl. Kutilang Sakti Gg Kutilang', 'Islam', 18, '9991961216', 'XII IPS', 0, 'profile.jpg'),
(20, 1194, 'M. Hamid', 'Pekanbaru', '1998-11-13', 'L', 'Yulinza', 'Pekanbaru', 'Islam', 19, '9980576910', 'XII IPS', 0, 'profile.jpg'),
(21, 1153, 'Ariyanto', 'Pekanbaru', '1999-11-30', 'L', 'Amat Santoso', 'Jl. Rawa Indah', 'Islam', 18, '9990579218', 'XI IPA', 0, 'profile.jpg'),
(22, 1156, 'Defia Afrilia', 'Pekanbaru', '2000-04-26', 'P', 'Dedi Junaidi', 'Jl. Unggas Ujung Gg Delima', 'Islam', 17, '', 'XI IPA', 0, 'profile.jpg'),
(23, 1159, 'Fakhriyah', 'Pekanbaru', '2000-05-04', 'P', 'Yosefrizal', 'Jl. Wonosari No 61 f', 'Islam', 17, '9985721219', 'XI IPA', 0, 'profile.jpg'),
(24, 1169, 'Mufti Karim Syafri', 'Pekanbaru', '2000-08-11', 'L', 'Syafrial Alidin', 'Jl. Hos Cokroaminoto', 'Islam', 17, '35747', 'XI IPA', 0, 'profile.jpg'),
(25, 1172, 'Nuraminah', 'Pekanbaru', '2000-11-01', 'P', 'Daim Nasution', 'Jl. Rajawali  N0 19', 'Islam', 17, '316043', 'XI IPA', 0, 'profile.jpg'),
(26, 1174, 'Nurul Annisa', 'Pekanbaru', '2000-05-02', 'P', 'Ramlan Lubis', 'Jl. Katio ', 'Islam', 17, '9684833', 'XI IPA', 0, 'profile.jpg'),
(27, 1176, 'Reni Elvina', 'Pariaman', '1999-09-01', 'P', 'Amir Tanjung', 'Jl. Paus/Sembilang Indah', 'Islam', 18, '9996458636', 'XI IPA', 0, 'profile.jpg'),
(28, 1179, 'Ririn Junita', 'Kebun Tinggi', '1999-06-03', 'P', 'Rasyidin', 'Jl. Duyung', 'Islam', 18, '9992664058', 'XI IPA', 0, 'profile.jpg'),
(29, 1180, 'Sarifa Aini', 'Padang Sawah', '1999-10-18', 'P', 'Sulaiman Rusli', 'Jl. Dakota', 'Islam', 18, '9995211455', 'XI IPA', 0, 'profile.jpg'),
(30, 1182, 'Siti Zulaiha', 'Sungai Guntung', '2000-02-23', 'P', 'Sirajuddin', 'Desa Saka Rotan Kec Teluk ', 'Islam', 17, '2915434', 'XI IPA', 0, 'profile.jpg'),
(31, 1184, 'T. Yusril Hari Budiman', 'Pekanbaru', '2000-10-16', 'L', 'T. Masril', 'Jl. Pala No 5', 'Islam', 17, '317751', 'XI IPA', 0, 'profile.jpg'),
(32, 1186, 'Wahyu Widia', 'Pekanbaru', '2000-03-02', 'P', 'Pongo', 'Jl. Kereta Api No 128', 'Islam', 17, '', 'XI IPA', 0, 'profile.jpg'),
(33, 1187, 'Yandra', 'Sungai Geringging', '1999-07-17', 'L', 'Edi', 'Jl. Durian  No 13', 'Islam', 18, '9996399374', 'XI IPA', 0, 'profile.jpg'),
(34, 1192, 'Muhammad Haekal Sachedina, Nst', 'Pekanbaru', '2000-09-20', 'L', 'Muhammad Yunus Nst', 'Pekanbaru', 'Islam', 17, '317886', 'XI IPA', 0, 'profile.jpg'),
(35, 1196, 'Imelda Maulina', 'Pekanbaru', '2000-06-13', 'P', 'Nur Aziz', 'Pekanbaru', 'Islam', 17, '7311135', 'XI IPA', 0, 'profile.jpg'),
(36, 1231, 'Giant Amor', 'Pekanbaru', '2000-04-08', 'L', 'Indra Yani', 'Pekanbaru', 'Islam', 17, '', 'XI IPA', 0, 'profile.jpg'),
(37, 1233, 'Nurlaili Farhiyah', 'Pekanbaru', '1999-08-14', 'P', 'Alfiah', 'Jl. Sekuntum ', 'Islam', 18, '', 'XI IPA', 0, 'profile.jpg'),
(38, 1125, 'Albar Pranata', 'Pekanbaru', '1998-05-21', 'L', 'Armal', 'Jl. Tuanku Tambusai', 'Islam', 19, '9980578903', 'XI IPS', 0, 'profile.jpg'),
(39, 1151, 'Aditya Dwi Putra Afandi', 'Simpang Raya', '2000-05-04', 'L', 'Suparni', 'Simpang Raya', 'Islam', 17, '2485039', 'XI IPS', 0, 'profile.jpg'),
(40, 1155, 'Dahlia', 'Pekanbaru', '1998-10-15', 'P', 'Mustafa', 'Jl. Rantau', 'Islam', 19, '9982286795', 'XI IPS', 20, 'profile.jpg'),
(41, 1157, 'Dedy Azhari', 'Pekanbaru', '2000-05-06', 'L', 'Somar Pili Sitompul', 'Jl. Sumber Rezeki', 'Islam', 17, '9369496', 'XI IPS', 0, 'profile.jpg'),
(42, 1160, 'Fitri Annisa Alfayet', 'Pekanbaru', '2000-12-28', 'P', 'Alfian', 'Jl. Katio Gg Sukoi No 69', 'Islam', 17, '', 'XI IPS', 0, 'profile.jpg'),
(43, 1161, 'Ilman Bahri', 'Medan', '1999-08-29', 'L', 'Bob Rizal', 'Todak Gembola', 'Islam', 18, '9990534049', 'XI IPS', 0, 'profile.jpg'),
(44, 1163, 'Lola Gusna', 'Pekanbaru', '2000-08-01', 'P', 'Nasrul Kota', 'Jl. Duyung Gg Gembolo No 28', 'Islam', 17, '316455', 'XI IPS', 0, 'profile.jpg'),
(45, 1164, 'M. Eri Rifa\'i', 'Jakarta', '1999-06-18', 'L', 'Hamdani', 'Jl. Paus Gg Alazhar', 'Islam', 18, '9990531328', 'XI IPS', 0, 'profile.jpg'),
(46, 1165, 'M. Ravie Rafsanjani', 'Pekanbaru', '2000-08-29', 'L', 'Koranas', 'Jl. Garuda Gg Sukma', 'Islam', 17, '202319', 'XI IPS', 0, 'profile.jpg'),
(47, 1166, 'M. Rifki Solana', 'Pekanbaru', '2000-01-19', 'L', 'Azhari', 'Perum Delima Puri', 'Islam', 17, '353698', 'XI IPS', 0, 'profile.jpg'),
(48, 1167, 'M. Yusuf', 'Pekanbaru', '1999-01-23', 'L', 'Daim Nasution', 'Jl. Rajawali  N0 19', 'Islam', 18, '9990530831', 'XI IPS', 0, 'profile.jpg'),
(49, 1168, 'Mjiftahul Jannah', 'Pekanbaru', '2000-01-15', 'P', 'Safri', 'Jl. Rawa Mulia', 'Islam', 17, '2502118', 'XI IPS', 0, 'profile.jpg'),
(50, 1171, 'Nisa Rosati Jannah', 'Balai Jering', '1999-08-28', 'P', 'Ibrahim', 'Jl. Linggarjati', 'Islam', 18, '9997841057', 'XI IPS', 0, 'profile.jpg'),
(51, 1173, 'Nuriza Annisa', 'Tanjung Pura', '2000-11-05', 'P', 'Naharman', 'Rokan Hulu', 'Islam', 17, '270549', 'XI IPS', 0, 'profile.jpg'),
(52, 1175, 'Refi Fernando', 'Pekanbaru', '1999-10-27', 'L', 'Burhanuddin', 'Jl. Tanjung Lebah', 'Islam', 18, '9990053873', 'XI IPS', 0, 'profile.jpg'),
(53, 1177, 'Rezki Putri Ervina', 'Pekanbaru', '2000-05-12', 'P', 'Arifin', 'Jl. Bandeng', 'Islam', 17, '4002202', 'XI IPS', 0, 'profile.jpg'),
(54, 1181, 'Shafira Intan Maulina', 'Pekanbaru', '2000-05-25', 'P', 'Putra', 'Jl. Mekar Baru', 'Islam', 17, '2561519', 'XI IPS', 0, 'profile.jpg'),
(55, 1188, 'Zikra Kurnia Munaf', 'Pekanbaru', '1999-03-30', 'L', 'Safarul Hidayat', 'Jl. Pepeya No 60 a', 'Islam', 18, '9999481676', 'XI IPS', 0, 'profile.jpg'),
(56, 1195, 'M. Ichsan Amli', 'Padang', '2000-02-22', 'L', 'Amrizal', 'Jl. Parit Raya Sidomulyo', 'Islam', 17, '', 'XI IPS', 0, 'profile.jpg'),
(57, 1230, 'Muhammad Rofiq', 'Pekanbaru', '2000-01-27', 'L', 'Ahmad Harianto', 'Jl. Utama T. Bay No 15 Simp. Tiga', 'Islam', 17, '2987216', 'XI IPS', 0, 'profile.jpg'),
(58, 1232, 'M. Sulthan Alfarisi', 'Pekanbaru', '2000-11-24', 'L', 'Amadani. Ha', 'Jl. Rupat No 8', 'Islam', 17, '316612', 'XI IPS', 0, 'profile.jpg'),
(59, 1197, 'Adel Wahyuningrum', 'Pekanbaru', '2001-04-03', 'P', 'Sutarto', 'Jl. Kopi Ujung No 16', 'Islam', 16, '13439955', 'X IPA', 0, 'profile.jpg'),
(60, 1200, 'Apera Vini Wijayanti Putri', 'Pemandang', '2000-01-25', 'P', 'Dahnil', 'Dusun Lubuk Ngapai', 'Islam', 17, '2361913', 'X IPA', 0, 'profile.jpg'),
(61, 1201, 'Arin Taradipa', 'Padang', '2001-12-14', 'P', 'Alamsur', 'Gading Marpoyan Blk C5 No 1', 'Islam', 16, '12894388', 'X IPA', 0, 'profile.jpg'),
(62, 1203, 'Assyifa Putri Dinanti', 'Jakarta', '2001-06-24', 'P', 'Nasrul Mukhti', 'Perum Kartama Raya Blk H 24', 'Islam', 16, '11994318', 'X IPA', 0, 'profile.jpg'),
(63, 1204, 'Bagaskoro Yudo Wibiyanto', 'Pekanbaru', '2001-03-09', 'L', 'Subiyanto', 'Jl Kh Ahmad Dahlan', 'Islam', 16, '11840659', 'X IPA', 0, 'profile.jpg'),
(64, 1205, 'Dhyah Atika', 'Jakarta', '1999-10-18', 'P', 'Hok Ming', 'Jl Tunas Jaya No 15', 'Islam', 18, '9990532704', 'X IPA', 0, 'profile.jpg'),
(65, 1206, 'Dian Wahyu Pertiwi', 'Dumai', '2001-07-29', 'P', 'Amrizal', 'Jl. Kusuma', 'Islam', 16, '14577337', 'X IPA', 0, 'profile.jpg'),
(66, 1208, 'Galuh Kusumaningrum', 'Pekanbaru', '2000-10-24', 'P', 'Shoif', 'Pekanbaru', 'Islam', 17, '3941644', 'X IPA', 0, 'profile.jpg'),
(67, 1211, 'Indah Mustika Arizna', 'Padang', '2000-07-21', 'P', 'Arizal', 'Jl. Pangeran Hidayat', 'Islam', 17, '2502234', 'X IPA', 0, 'profile.jpg'),
(68, 1212, 'Inriani', 'Pangkalan Serai', '2000-10-20', 'P', 'Nurdi', 'Jl Dakota Tang Tengah', 'Islam', 17, '', 'X IPA', 0, 'profile.jpg'),
(69, 1214, 'Juwita Nur Rahmasari', 'Pekanbaru', '2001-07-02', 'P', 'Basirun', 'Jl. Merak Gg Punai', 'Islam', 16, '19628381', 'X IPA', 0, 'profile.jpg'),
(70, 1215, 'M. Awal Sholihin', 'Pekanbaru', '2000-12-31', 'L', 'M. Dahlan Siregar', 'Jl. Rawa Indah', 'Islam', 17, '8273604', 'X IPA', 0, 'profile.jpg'),
(71, 1219, 'Nurul Fadia Rahmi', 'Pekanbaru', '2000-11-24', 'P', 'Admi', 'Jl. Katio Ujung', 'Islam', 17, '3775535', 'X IPA', 0, 'profile.jpg'),
(72, 1220, 'Nurul Mazidah', 'Pekanbaru', '2000-10-23', 'P', 'Muhajir Syam', 'Jl. Sari Kencana No 6', 'Islam', 17, '', 'X IPA', 0, 'profile.jpg'),
(73, 1221, 'Putri Ervina', 'Kuala Panduk', '2001-08-27', 'P', 'Erpan', 'Kuala Panduk', 'Islam', 16, '17576742', 'X IPA', 0, 'profile.jpg'),
(74, 1222, 'Ria Devita', 'Kiambang', '2000-07-14', 'P', 'Nofriadi', 'Jl. Pinang', 'Islam', 17, '10799371', 'X IPA', 0, 'profile.jpg'),
(75, 1224, 'Santi Andela', 'Pangkalan Serai', '2000-12-18', 'P', 'Ahmad Jaler', 'Dusun Iii Biwan Jaya', 'Islam', 17, '', 'X IPA', 0, 'profile.jpg'),
(76, 1225, 'Sintia Daniati Puspita', 'Pekanbaru', '2000-08-21', 'P', 'Suprihadi', 'Jl. Air Dingin', 'Islam', 17, '948170', 'X IPA', 0, 'profile.jpg'),
(77, 1226, 'Sri Utami Ningsi', 'Pekanbaru', '2001-02-06', 'P', 'Darlis ', 'Jl. Gnung Agung Tangk Timur', 'Islam', 16, '', 'X IPA', 0, 'profile.jpg'),
(78, 1228, 'Tasya Amelia Putri Herliana', 'Pekanbaru', '2000-11-13', 'P', 'Herni', 'Jl. Rawa Indah', 'Islam', 17, '1694000', 'X IPA', 0, 'profile.jpg'),
(79, 1198, 'Aldi Jkurniawan', 'Pekanbaru', '2000-06-08', 'L', 'Chairil Anwar', 'Jl. Cendana No 71', 'Islam', 17, '3127006', 'X IPS', 0, 'profile.jpg'),
(80, 1199, 'Anggi Gufron Pasaribu', 'Pekanbaru', '2000-09-12', 'L', 'Bahron Pasaribu', 'Perum Bmt Iii Blk E 13', 'Islam', 17, '3083850', 'X IPS', 0, 'profile.jpg'),
(81, 1202, 'Armando Zhaki Pangestu', 'Bukit Tinggi', '2000-12-26', 'L', 'Amran', 'Jl. Pahlawan Kerja Gg Damai Ii', 'Islam', 17, '108882', 'X IPS', 0, 'profile.jpg'),
(82, 1207, 'Fauziatul Munawwarah', 'Pekanbaru', '2002-05-15', 'P', 'Marthalezon', 'Jl. Lembah Damai', 'Islam', 15, '24636727', 'X IPS', 0, 'profile.jpg'),
(83, 1209, 'Hendi Harya Rizaldi', 'Pekanbaru', '2001-04-30', 'L', 'Herizal', 'Jl. Pahlawan Kerja Gg Damai i', 'Islam', 16, '19223332', 'X IPS', 0, 'profile.jpg'),
(84, 1210, 'Ii Safitri', 'Rantau Langsat', '2001-03-09', 'P', 'Bejo Sukayo (Alm)', 'Rantau Langsat', 'Islam', 16, '12652575', 'X IPS', 0, 'profile.jpg'),
(85, 1213, 'Irawati', 'Rantau Langsat', '1998-06-06', 'P', 'Dodi (Alm)', 'Rantau Langsat', 'Islam', 19, '', 'X IPS', 0, 'profile.jpg'),
(86, 1216, 'Muhammad Ikhsan', 'Pekanbaru', '2001-09-11', 'L', 'Iwan', 'Jl. Paus Gg Lumba-Lumba', 'Islam', 16, '17654398', 'X IPS', 0, 'profile.jpg'),
(87, 1217, 'Muhammad Miftah Al Hanif', 'Pekanbaru', '2000-10-06', 'L', 'Muhammad Hanafi', 'Jl. Putri Tujuh', 'Islam', 17, '1603988', 'X IPS', 0, 'profile.jpg'),
(88, 1218, 'Khairunnisa\'', 'Bangkinang', '2001-08-27', 'P', 'Mauludin', 'Jl. Hadi Swarno', 'Islam', 16, '14311984', 'X IPS', 0, 'profile.jpg'),
(89, 1223, 'Rini', 'Rantau Langsat', '1999-09-06', 'P', 'Jasa', 'Rantau Langsat', 'Islam', 18, '', 'X IPS', 0, 'profile.jpg'),
(90, 1227, 'Suhudin', 'Air Panas', '1998-07-15', 'L', 'Gino', 'Desa Air Panas', 'Islam', 19, '9988735832', 'X IPS', 0, 'profile.jpg'),
(91, 1229, 'Umi Aisyah Ulfahmi', 'Pekanbaru', '2001-05-05', 'P', 'Nazaruddin', 'Jl. Arifin Ahmad', 'Islam', 16, '', 'X IPS', 0, 'profile.jpg'),
(92, 2017, 'Testing Siswa', 'Perpus UIN', '2017-05-09', '', 'ROG', 'UIN SUSKA', 'Islam', -1970, '9991353156', 'XII IPA', 0, 'profile.jpg'),
(93, 2017, 'Testing Siswa 2', 'Perpus UIN', '2017-05-09', 'L', 'ROG', 'UIN SUSKA', 'Islam', -1970, '9991353156', 'XII IPA', 0, 'profile.jpg'),
(94, 2892, 'Te 3', 'Meja', '2017-05-08', 'L', 'ROG', 'asfaf', 'Islam', 47, '9956252355', 'XII IPA', 0, 'profile.jpg'),
(95, 26332, 'Test 3', 'Meja', '2017-05-02', 'L', 'sks', 'asdad', 'adasd', 47, '84554578', 'XII IPA', 0, 'profile.jpg'),
(96, 15232, 'Testing 4', 'Dekat', '2009-10-14', 'L', 'fafd', 'asdjkalsjdl', 'aknsd', 47, '956565565', 'XII IPS', 0, 'profile.jpg'),
(97, 5454, 'fsndkfjlk', 'kfjlsd', '0000-00-00', 'L', '', 'fksjdfksdlf', 'daksj', 17, 'jskldfjlsk', 'XII IPA', 0, 'profile.jpg'),
(98, 45454, 'Teting Upload Foto', 'Meja', '0000-00-00', 'L', '', 'Rumah', 'Agama', 17, '9842442454', 'XII IPA', 0, '211497037932705026evergreen_25687121_500kb_1920x10'),
(99, 9565653, 'Sekejap', 'Temp', '0000-00-00', 'L', '', 'Tengol', 'Agama', 7, '44245644', 'XII IPA', 0, '211497071844438352evergreen_offset_171853_500kb_19'),
(100, 0, '', '', '0000-00-00', 'L', 'Test', 'Tengol', '', -1970, '', '', 0, 'profile.png'),
(101, 982, 'Testing Siswa', 'tempat', '0000-00-00', 'L', 'test', 'testte', 'test', 7, '4535646', 'XII IPA', 0, '3D.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabelsp`
--

CREATE TABLE `tabelsp` (
  `idSP` int(11) NOT NULL,
  `idSiswa` int(11) DEFAULT NULL,
  `jenisSP` int(1) DEFAULT NULL,
  `statusKepsek` varchar(2) DEFAULT NULL,
  `statusWaka` varchar(2) DEFAULT NULL,
  `tanggalPermintaan` date DEFAULT NULL,
  `tanggalCetak` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabeluser`
--

CREATE TABLE `tabeluser` (
  `idUser` int(1) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabeluser`
--

INSERT INTO `tabeluser` (`idUser`, `username`, `password`, `hak`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'piket', 'd4b78ebe5d394063636ef18923d5b905', 'piket'),
(3, 'kesiswaan', 'accc7841ce41b0f788a737bf9798ea4f', 'kesiswaan'),
(4, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', 'kepsek');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_jenis_pelanggaran`
-- (See below for the actual view)
--
CREATE TABLE `total_jenis_pelanggaran` (
`total` bigint(21)
,`totalRingan` decimal(23,0)
,`totalSedang` decimal(23,0)
,`totalBerat` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pelanggaran_by_bulan_lk`
-- (See below for the actual view)
--
CREATE TABLE `total_pelanggaran_by_bulan_lk` (
`total` bigint(21)
,`totalJanuari` decimal(23,0)
,`totalFebruari` decimal(23,0)
,`totalMaret` decimal(23,0)
,`totalApril` decimal(23,0)
,`totalMei` decimal(23,0)
,`totalJuni` decimal(23,0)
,`totalJuli` decimal(23,0)
,`totalAgustus` decimal(23,0)
,`totalSeptember` decimal(23,0)
,`totalOktober` decimal(23,0)
,`totalNovember` decimal(23,0)
,`totalDesember` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pelanggaran_by_bulan_pr`
-- (See below for the actual view)
--
CREATE TABLE `total_pelanggaran_by_bulan_pr` (
`total` bigint(21)
,`totalJanuari` decimal(23,0)
,`totalFebruari` decimal(23,0)
,`totalMaret` decimal(23,0)
,`totalApril` decimal(23,0)
,`totalMei` decimal(23,0)
,`totalJuni` decimal(23,0)
,`totalJuli` decimal(23,0)
,`totalAgustus` decimal(23,0)
,`totalSeptember` decimal(23,0)
,`totalOktober` decimal(23,0)
,`totalNovember` decimal(23,0)
,`totalDesember` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pelanggaran_gender`
-- (See below for the actual view)
--
CREATE TABLE `total_pelanggaran_gender` (
`total` bigint(21)
,`totalLaki` decimal(23,0)
,`totalPr` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_pelanggaran_tahun`
-- (See below for the actual view)
--
CREATE TABLE `total_pelanggaran_tahun` (
`total` bigint(21)
,`total2016` decimal(23,0)
,`total2017` decimal(23,0)
,`total2018` decimal(23,0)
,`total2019` decimal(23,0)
,`total2020` decimal(23,0)
);

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_all_time`
--
DROP TABLE IF EXISTS `pelanggaran_all_time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_all_time`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`idSiswa` AS `idSiswa`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelsiswa`.`jenisKelamin` AS `jenisKelamin`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelperaturan`.`sanksiPoin` AS `sanksiPoin`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian`,`tabelpelanggaran`.`foto` AS `foto` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_xii_ipa`
--
DROP TABLE IF EXISTS `pelanggaran_xii_ipa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_xii_ipa`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'XII IPA') ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_xii_ips`
--
DROP TABLE IF EXISTS `pelanggaran_xii_ips`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_xii_ips`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'XII IPS') ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_xi_ipa`
--
DROP TABLE IF EXISTS `pelanggaran_xi_ipa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_xi_ipa`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'XI IPA') ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_xi_ips`
--
DROP TABLE IF EXISTS `pelanggaran_xi_ips`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_xi_ips`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'XI IPS') ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_x_ipa`
--
DROP TABLE IF EXISTS `pelanggaran_x_ipa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_x_ipa`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'X IPA') ;

-- --------------------------------------------------------

--
-- Structure for view `pelanggaran_x_ips`
--
DROP TABLE IF EXISTS `pelanggaran_x_ips`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pelanggaran_x_ips`  AS  select `tabelpelanggaran`.`idPelanggaran` AS `idPelanggaran`,`tabelsiswa`.`nis` AS `nis`,`tabelsiswa`.`nama` AS `nama`,`tabelpelanggaran`.`idPeraturan` AS `idPeraturan`,`tabelperaturan`.`namaPelanggaran` AS `namaPelanggaran`,`tabelperaturan`.`jenisPelanggaran` AS `jenisPelanggaran`,`tabelsiswa`.`kelas` AS `kelas`,`tabelpelanggaran`.`waktuKejadian` AS `waktuKejadian` from ((`tabelpelanggaran` join `tabelperaturan` on((`tabelpelanggaran`.`idPeraturan` = `tabelperaturan`.`idPeraturan`))) join `tabelsiswa` on((`tabelpelanggaran`.`idSiswa` = `tabelsiswa`.`idSiswa`))) where (`tabelsiswa`.`kelas` = 'X IPS') ;

-- --------------------------------------------------------

--
-- Structure for view `total_jenis_pelanggaran`
--
DROP TABLE IF EXISTS `total_jenis_pelanggaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_jenis_pelanggaran`  AS  select count(0) AS `total`,sum((case when (`pelanggaran_all_time`.`jenisPelanggaran` = 1) then 1 else 0 end)) AS `totalRingan`,sum((case when (`pelanggaran_all_time`.`jenisPelanggaran` = 2) then 1 else 0 end)) AS `totalSedang`,sum((case when (`pelanggaran_all_time`.`jenisPelanggaran` = 3) then 1 else 0 end)) AS `totalBerat` from `pelanggaran_all_time` ;

-- --------------------------------------------------------

--
-- Structure for view `total_pelanggaran_by_bulan_lk`
--
DROP TABLE IF EXISTS `total_pelanggaran_by_bulan_lk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pelanggaran_by_bulan_lk`  AS  select count(0) AS `total`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-01-01' and '2017-01-31') then 1 else 0 end)) AS `totalJanuari`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-02-01' and '2017-02-31') then 1 else 0 end)) AS `totalFebruari`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-03-01' and '2017-03-31') then 1 else 0 end)) AS `totalMaret`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-04-01' and '2017-04-31') then 1 else 0 end)) AS `totalApril`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-05-01' and '2017-05-31') then 1 else 0 end)) AS `totalMei`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-06-01' and '2017-06-31') then 1 else 0 end)) AS `totalJuni`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-07-01' and '2017-07-31') then 1 else 0 end)) AS `totalJuli`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-08-01' and '2017-08-31') then 1 else 0 end)) AS `totalAgustus`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-09-01' and '2017-09-31') then 1 else 0 end)) AS `totalSeptember`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-10-01' and '2017-10-31') then 1 else 0 end)) AS `totalOktober`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-11-01' and '2017-11-31') then 1 else 0 end)) AS `totalNovember`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-12-01' and '2017-12-31') then 1 else 0 end)) AS `totalDesember` from `pelanggaran_all_time` where (`pelanggaran_all_time`.`jenisKelamin` = 'L') ;

-- --------------------------------------------------------

--
-- Structure for view `total_pelanggaran_by_bulan_pr`
--
DROP TABLE IF EXISTS `total_pelanggaran_by_bulan_pr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pelanggaran_by_bulan_pr`  AS  select count(0) AS `total`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-01-01' and '2017-01-31') then 1 else 0 end)) AS `totalJanuari`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-02-01' and '2017-02-31') then 1 else 0 end)) AS `totalFebruari`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-03-01' and '2017-03-31') then 1 else 0 end)) AS `totalMaret`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-04-01' and '2017-04-31') then 1 else 0 end)) AS `totalApril`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-05-01' and '2017-05-31') then 1 else 0 end)) AS `totalMei`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-06-01' and '2017-06-31') then 1 else 0 end)) AS `totalJuni`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-07-01' and '2017-07-31') then 1 else 0 end)) AS `totalJuli`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-08-01' and '2017-08-31') then 1 else 0 end)) AS `totalAgustus`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-09-01' and '2017-09-31') then 1 else 0 end)) AS `totalSeptember`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-10-01' and '2017-10-31') then 1 else 0 end)) AS `totalOktober`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-11-01' and '2017-11-31') then 1 else 0 end)) AS `totalNovember`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-12-01' and '2017-12-31') then 1 else 0 end)) AS `totalDesember` from `pelanggaran_all_time` where (`pelanggaran_all_time`.`jenisKelamin` = 'P') ;

-- --------------------------------------------------------

--
-- Structure for view `total_pelanggaran_gender`
--
DROP TABLE IF EXISTS `total_pelanggaran_gender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pelanggaran_gender`  AS  select count(0) AS `total`,sum((case when (`pelanggaran_all_time`.`jenisKelamin` = 'L') then 1 else 0 end)) AS `totalLaki`,sum((case when (`pelanggaran_all_time`.`jenisKelamin` = 'P') then 1 else 0 end)) AS `totalPr` from `pelanggaran_all_time` ;

-- --------------------------------------------------------

--
-- Structure for view `total_pelanggaran_tahun`
--
DROP TABLE IF EXISTS `total_pelanggaran_tahun`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_pelanggaran_tahun`  AS  select count(0) AS `total`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2016-01-01' and '2016-12-31') then 1 else 0 end)) AS `total2016`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2017-01-01' and '2017-12-31') then 1 else 0 end)) AS `total2017`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2018-01-01' and '2018-12-31') then 1 else 0 end)) AS `total2018`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2019-01-01' and '2019-12-31') then 1 else 0 end)) AS `total2019`,sum((case when (`pelanggaran_all_time`.`waktuKejadian` between '2020-01-01' and '2020-12-31') then 1 else 0 end)) AS `total2020` from `pelanggaran_all_time` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabelguru`
--
ALTER TABLE `tabelguru`
  ADD PRIMARY KEY (`idGuru`);

--
-- Indexes for table `tabelkategori`
--
ALTER TABLE `tabelkategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `tabelpelanggaran`
--
ALTER TABLE `tabelpelanggaran`
  ADD PRIMARY KEY (`idPelanggaran`),
  ADD KEY `tabelpelanggaran_ibfk_1` (`idSiswa`),
  ADD KEY `tabelpelanggaran_ibfk_2` (`idPeraturan`);

--
-- Indexes for table `tabelperaturan`
--
ALTER TABLE `tabelperaturan`
  ADD PRIMARY KEY (`idPeraturan`),
  ADD KEY `jenisPelanggaran` (`jenisPelanggaran`);

--
-- Indexes for table `tabelsiswa`
--
ALTER TABLE `tabelsiswa`
  ADD PRIMARY KEY (`idSiswa`);

--
-- Indexes for table `tabelsp`
--
ALTER TABLE `tabelsp`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `idSiswa` (`idSiswa`);

--
-- Indexes for table `tabeluser`
--
ALTER TABLE `tabeluser`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabelguru`
--
ALTER TABLE `tabelguru`
  MODIFY `idGuru` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tabelpelanggaran`
--
ALTER TABLE `tabelpelanggaran`
  MODIFY `idPelanggaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tabelsiswa`
--
ALTER TABLE `tabelsiswa`
  MODIFY `idSiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `tabelsp`
--
ALTER TABLE `tabelsp`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabeluser`
--
ALTER TABLE `tabeluser`
  MODIFY `idUser` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabelpelanggaran`
--
ALTER TABLE `tabelpelanggaran`
  ADD CONSTRAINT `tabelpelanggaran_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `tabelsiswa` (`idSiswa`),
  ADD CONSTRAINT `tabelpelanggaran_ibfk_2` FOREIGN KEY (`idPeraturan`) REFERENCES `tabelperaturan` (`idPeraturan`);

--
-- Constraints for table `tabelperaturan`
--
ALTER TABLE `tabelperaturan`
  ADD CONSTRAINT `tabelperaturan_ibfk_1` FOREIGN KEY (`jenisPelanggaran`) REFERENCES `tabelkategori` (`idKategori`);

--
-- Constraints for table `tabelsp`
--
ALTER TABLE `tabelsp`
  ADD CONSTRAINT `tabelsp_ibfk_1` FOREIGN KEY (`idSiswa`) REFERENCES `tabelsiswa` (`idSiswa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

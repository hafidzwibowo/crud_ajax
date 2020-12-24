-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2017 at 04:21 
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctscandata`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `dataset` (
  `id` varchar(11) NOT NULL,
  `dataset_name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `telp user_id` varchar(15) NOT NULL,
  `directory_path` varchar(200) NOT NULL,
  -- `medic_record` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

-- INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `telp`, `alamat`, `foto`) VALUES
-- ('10110470110', 'Ade Zenudin Bimashita', 'perempuan', '08199288272', 'Jl.Raya Cicalengka No.101', '09032017041439client1.png'),
-- ('10110470111', 'Ani Lestari', 'Perempuan', '089228827727', 'Jl.Pengrajin No.90', 'tab2.png'),
-- ('10110470112', 'Imam Maulana', 'Laki-laki', '08561777166', 'Jl.Jend.Gatot Subroto No.10', 'man2.jpg'),
-- ('10110470113', 'Siska Melina Rachman', 'Perempuan', '0828817717', 'Jl.Raya Cileunyi No.76', 'team-member.jpg'),
-- ('10114072001', 'Rizaldi Maulidia Achmad', 'Laki-laki', '089283773622', 'Jl.Raya Jatinangor No.21', 'man1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

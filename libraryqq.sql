-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 09:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryqq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `ID_USER`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Table structure for table `borrowlist`
--

CREATE TABLE `borrowlist` (
  `ID_BORROWLIST` int(11) NOT NULL,
  `ID_BUKU` int(11) NOT NULL,
  `ID_TRANSACTION` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `FINE` int(11) NOT NULL,
  `STATUS` enum('RETURNED','OVERDUE','WAITING') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID_BUKU` int(11) NOT NULL,
  `TITLE` varchar(255) NOT NULL,
  `PUBLISHER` varchar(255) NOT NULL,
  `WRITER` varchar(255) NOT NULL,
  `YEAR` varchar(20) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `STATUS` enum('AVAILABLE','UNAVAILABLE') NOT NULL,
  `FOTO` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID_BUKU`, `TITLE`, `PUBLISHER`, `WRITER`, `YEAR`, `QUANTITY`, `STATUS`, `FOTO`) VALUES
(1, 'Noise: A Flaw in Human Judgment', 'Little, Brown Spark', 'Daniel Kahneman, Olivier Sibony, Cass R. Sunstein', '2021', 1, 'AVAILABLE', '110.jpg'),
(2, 'Outliers: The Story of Success', 'Little, Brown and Company', 'Malcolm Gladwell', '2008', 3, 'AVAILABLE', '2.jpg'),
(3, 'A Promised Land', 'Crown', 'Barack Obama', '2020', 3, 'AVAILABLE', '3.jpg'),
(4, 'The Perfect Child', 'Thomas & Mercer', 'Lucinda Berry', '2019', 1, 'AVAILABLE', '4.jpg'),
(5, 'I Am Watching You', 'Thomas & Mercer', 'Teresa Driscoll', '2017', 0, 'AVAILABLE', '5.jpg'),
(6, 'The Good Neighbor', 'Lake Union Publishing', 'A.J. Banner', '2015', 2, 'AVAILABLE', '6.jpg'),
(7, 'Last Day', 'Luanne Rice', 'Thomas & Mercer', '2020', 2, 'AVAILABLE', '7.jpg'),
(8, 'Dare to Lead', 'Ebury Digital', 'Brené Brown', '2018', 3, 'AVAILABLE', '8.jpg'),
(9, '1776', 'Simon Schuster', 'David McCullough', '2006', 0, 'AVAILABLE', '9.jpg'),
(10, 'Keep Moving: Notes on Loss, Creativity, and Change', 'Maggie Smith', 'Atria/One Signal', '2020', 1, 'AVAILABLE', '10.jpg'),
(11, 'Rahasia Sederhana Mempersiapkan Kesuksesan Diri Dalam Bisnis', 'Nuturinmedia', 'Gema Wibawa Mukti', '2018', 15, 'AVAILABLE', '11.jpg'),
(12, 'Chairul Tanjung Si Anak Singkong', 'Kompas Penerbit Buku', 'Tjahja Gunawan Diredja', '2014', 20, 'AVAILABLE', '12.jpg'),
(13, 'Suply Chain Management', 'Intitut Teknologi Sepuluh November', 'I Nyoman Pujawan', '2019', 20, 'AVAILABLE', '13.jpg'),
(14, 'Basis Data', 'Informatika', 'Fathansyah', '2017', 25, 'AVAILABLE', '14.jpg'),
(15, 'Kumpulan Solusi Pemograman Python', 'Informatika', 'Budi Raharjo', '2019', 25, 'AVAILABLE', '15.jpg'),
(16, 'Pedoman Penulisan Karya Tulis Ilmiah Skripsi', 'Yuma Pustaka', 'J.Priyanto Widodo', '2010', 20, 'AVAILABLE', '16.jpg'),
(17, 'Manajemen Pemasaran', 'Rajawali Pers', 'Sofjan Assauri', '2019', 25, 'AVAILABLE', '17.jpg'),
(18, 'Seni Berdebat', 'Circa', 'Atrhur Schopenhauer', '2020', 20, 'AVAILABLE', '18.jpg'),
(19, 'Sejarah Filsafat Barat', 'Pustaka Pelajar', 'Bertrand Russell', '2019', 15, 'AVAILABLE', '19.jpg'),
(20, 'Titik Awal', 'Circa', 'Naguib Mahfouz', '2020', 15, 'AVAILABLE', '20.jpg'),
(21, 'Laskar Pelangi', 'Erlangga', 'Andrea Hirata', '2005', 100, 'AVAILABLE', '21.jpg'),
(22, 'Bumi Manusia', 'Erlangga', 'Pramoedya Ananta Toer', '2012', 25, 'AVAILABLE', '22.jpg'),
(23, 'Saman', 'Erlangga', 'Ayu Utami', '2015', 50, 'AVAILABLE', '23.jpg'),
(24, 'The Lord of the Rings', 'Erlangga', 'J.J.R. Tolkien', '2012', 70, 'AVAILABLE', '24.jpg'),
(25, 'Buku Catatan Josephine', 'Erlangga', 'Agatha Christie', '2012', 10, 'AVAILABLE', '25.jpg'),
(26, 'Komik One Piece', 'Erlangga', 'Eichiiro Oda', '2013', 25, 'AVAILABLE', '26.jpg'),
(27, 'Komik Detektive Conan', 'Erlangga', 'Gosho Aoyama', '2002', 75, 'AVAILABLE', '27.jpg'),
(28, 'Komik Naruto', 'Erlangga', 'Masashi Kishimoto', '2000', 15, 'AVAILABLE', '28.jpg'),
(29, 'Burung - burung Manyar', 'Erlangga', 'Y.B. Mangunwujaya', '2007', 30, 'AVAILABLE', '29.jpg'),
(30, 'Tiada Ojek di Paris', 'Erlangga', 'Seno Gumira Ajidarma', '2019', 45, 'AVAILABLE', '30.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mahastudent`
--

CREATE TABLE `mahastudent` (
  `ID_MAHASTUDENT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_MEMBER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID_MEMBER` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `MEMBER_TYPE` enum('SILVER','GOLD','PLATINUM') NOT NULL,
  `JOIN_TIME` date DEFAULT NULL,
  `EXPIRED_TIME` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID_MEMBER`, `ID_USER`, `MEMBER_TYPE`, `JOIN_TIME`, `EXPIRED_TIME`) VALUES
(2, 0, 'SILVER', NULL, '2021-06-30'),
(3, 0, 'GOLD', NULL, '2021-07-04'),
(4, 0, 'PLATINUM', NULL, '2022-06-04'),
(11, 1, 'GOLD', '2021-06-18', '2021-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `ID_STAFF` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID_TRANSACTION` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_BUKU` int(11) NOT NULL,
  `BORROW_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `RETURN_DATE` date DEFAULT NULL,
  `FINE` int(11) DEFAULT NULL,
  `STATUS` enum('FINISH','WAITING') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID_TRANSACTION`, `ID_USER`, `ID_BUKU`, `BORROW_DATE`, `END_DATE`, `RETURN_DATE`, `FINE`, `STATUS`) VALUES
(1, 1, 3, '2021-06-18', '2021-06-25', NULL, 0, 'WAITING'),
(2, 1, 4, '2021-06-18', '2021-06-25', '2021-06-18', 0, 'FINISH'),
(3, 1, 8, '2021-06-18', '2021-06-16', '2021-06-18', 20000, 'FINISH'),
(4, 1, 9, '2021-06-18', '2021-06-25', NULL, 0, 'WAITING'),
(5, 1, 28, '2021-06-18', '2021-06-25', '2021-06-18', 0, 'FINISH'),
(6, 1, 20, '2021-06-18', '2021-06-25', '2021-06-18', 0, 'FINISH'),
(7, 1, 7, '2021-06-18', '2021-06-25', NULL, 0, 'WAITING'),
(8, 1, 5, '2021-06-18', '2021-06-25', NULL, 0, 'WAITING');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `ROLE` enum('USER','ADMIN','STAFF') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `NAME`, `EMAIL`, `PHONE`, `ROLE`) VALUES
(0, 'admin', 'admin', 'admin', 'admin', 'admin', 'ADMIN'),
(1, 'aandii', 'andi123', 'andi', 'andi123@gmail.com', '085678123456', 'USER'),
(2, 'randiir', 'randi12', 'randi', 'randi12@gmail.com', '085678123457', 'USER'),
(3, 'daanii', 'dani234', 'dani', 'dani234@gmail.com', '085678123458', 'USER'),
(4, 'sarimawar', 'mawar456', 'mawar', 'mawar456@gmail.com', '085678123459', 'USER'),
(5, 'livianaf', 'livia567', 'livia', 'livia567@gmail.com', '085678123451', 'USER'),
(6, 'melatik', 'melati678', 'melati', 'melati@gmail.com', '085678123452', 'USER'),
(7, 'tamita', 'tamii890', 'tami', 'tami890@gmail.com', '085678123453', 'USER'),
(8, 'daffadaf', 'daffa131', 'daffa', 'daffa131@gmail.com', '085678123454', 'USER'),
(9, 'tharani', 'rani1211', 'rani', 'rani1211@gmail.com', '085678123455', 'USER'),
(10, 'hananaf', 'nafta321', 'nafta', 'daffa321@gmail.com', '085678123450', 'USER'),
(11, 'adisty', 'disty00', 'disty', 'disty00@gmail.com', '085678123460', 'USER'),
(12, 'ririni', 'riri08', 'riri', 'riri08@gmail.com', '085678123461', 'USER'),
(13, 'adeirma', 'ade200', 'ade', 'ade200@gmail.com', '085678123462', 'USER'),
(14, 'aprilia', 'april90', 'april', 'april90@gmail.com', '085678123463', 'USER'),
(15, 'febiaar', 'febia99', 'febia', 'febia99@gmail.com', '0856781234564', 'USER'),
(16, 'namiraaz', 'namira98', 'namira', 'namira98@gmail.com', '085678123465', 'USER'),
(17, 'zashikan', 'shika97', 'shika', 'shika97@gmail.com', '085678123466', 'USER'),
(18, 'shafaan', 'shafa21', 'shafa', 'shafa21@gmail.com', '085678123467', 'USER'),
(19, 'giselan', 'gisel11', 'gisel', 'gisel11@gmail.com', '085678123468', 'USER'),
(20, 'serenarr', 'serena01', 'serena', 'serena01@gmail.com', '085678123469', 'USER'),
(21, 'keishaa', 'kei1234', 'keisha', 'keishaa1@gmail.com', '082134567890', 'USER'),
(22, 'nadya', '012345', 'nadya', 'ndyaa@gmail.com', '081123456789', 'USER'),
(23, 'Gibraan', 'gib789', 'Gibran', 'Gibraan@gmail.com', '082234456778', 'USER'),
(24, 'Tifanny', 'tifanny11', 'Tifanny', 'tifanny@gmail.com', '081232415678', 'USER'),
(25, 'Angel', 'ngel3456', 'Angela', 'angela@gmail.com', '08772233445566', 'USER'),
(26, 'Arkan', 'kan1123', 'Arkana', 'arkan@gmail.com', '081123456879', 'USER'),
(27, 'Akraam', 'akram00', 'Akram', 'akram123@gmail.com', '082234908765', 'USER'),
(28, 'Rafiiq', 'fiq1234', 'Rafiq', 'rafiq@gmail.com', '087788996534', 'USER'),
(29, 'Kenziee', 'ken7890', 'Kenzie', 'ken5678@gmail.com', '087712344567', 'USER'),
(30, 'Darara', 'dara123', 'Dara', 'daraa@gmail.com', '082278906543', 'USER'),
(31, 'Adnaan', 'adnann12', 'Adnan', 'adnan12@gmail.com', '082176678998', 'USER'),
(32, 'Fatthaan', 'fathan123', 'Fathan', 'fatthan@gmail.com', '082134569087', 'USER'),
(33, 'Kaykay', 'kay12345', 'Kayla', 'kayla@gmail.com', '082209908998', 'USER'),
(34, 'Arabel', 'araa0987', 'Arabella', 'arabella@gmail.com', '081234566543', 'USER'),
(35, 'baesuz', 'suz12345', 'Suzy', 'baesuzy@gmail.com', '08229876789', 'USER'),
(36, 'adzkii', 'adzki123', 'Adzkiya', 'adzkiya@gmail.com', '081234439009', 'USER'),
(37, 'Clarie', 'clar1234', 'Clarisa', 'clarissa@gmail.com', '081234211234', 'USER'),
(38, 'Celsss', 'cels1234', 'Celshea', 'celsheaa@gmail.com', '081233445566', 'USER'),
(39, 'daviiir', 'daviir12', 'Davira', 'daviraa@gmail.com', '081122443355', 'USER'),
(40, 'Feliici', 'felicia1', 'Felicia', 'filiciaaa@gmail.com', '082287655678', 'USER'),
(41, 'xortyapw', '2123456', 'Xorty Akam', 'xortyakam@gmail.com', '081234567898', 'USER'),
(42, 'nunananu', 'abzyba55', 'Nuna Nanu', 'nunananu@gmail.com', '082222222222', 'USER'),
(43, 'upigalabi', 'upicantik1', 'Upi Galabi', 'upigalabicans@gmail.com', '085634567899', 'USER'),
(44, 'reynamubba', 'duelist56', 'Reyna Mubba', 'reynamubba1@gmail.com', '083245654345', 'USER'),
(45, 'killjoy', 'sentinel21', 'Kill Joy', 'kiljoykj@gmail.com', '084433556644', 'USER'),
(46, 'yoruopa', 'dutasampo', 'Yoru Opa', 'yoruopa3@gmail.com', '086544543476', 'USER'),
(47, 'chypercam', 'tessatuduatiga', 'Chyper Cam', 'chypercam@gmail.com', '081244444444', 'USER'),
(48, 'sagewall', 'empatblok', 'Sage Wall', 'sagewall@gmail.com', '081234775543', 'USER'),
(49, 'skyegreenu', 'flashinu', 'Skye Greenu', 'skyegreenu6@gmail.com', '086566776655', 'USER'),
(50, 'ottokejet', 'xyj231', 'Jett Kavui', 'jettkavui@gmail.com', '083323237699', 'USER'),
(51, 'omenally', '123456', 'Omen Ally', 'omenally123@gmail.com', '088877665588', 'USER'),
(52, 'brimstone11', 'smokinaja', 'Brimstone Bapake', 'brimstonebapake@gmail.com', '084356447766', 'USER'),
(53, 'breach', 'ikiboya', 'Breach Kakek', 'braechkakek@gmail.com', '089865675434', 'USER'),
(54, 'astrarara', 'asyiappp23', 'Astra Remone', 'astraremone@gmail.com', '088756492309', 'USER'),
(55, 'sovashockdart', 'qwertyyuiop', 'Sova Shocka', 'sovashocka@gmail.com', '080043226533', 'USER'),
(56, 'razeomba', 'tuingtuing', 'Raze Omba', 'razeombayes21@gmail.com', '087865667691', 'USER'),
(57, 'viperroro', 'asdfghj89', 'Viper Roro', 'viperoro@gmail.com', '083244557689', 'USER'),
(58, 'kryptokayaga', '123456', 'Krypto Izzi', 'kryptopizzi@gmail.com', '080456447611', 'USER'),
(59, 'johncena', 'tetetretet', 'John Cena', 'johncena@gmail.com', '086654233076', 'USER'),
(60, 'dingdingdudu', '12asdfvc', 'Ding Dingduuu', 'dingdingdubfft@gmail.com', '083211111111', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `borrowlist`
--
ALTER TABLE `borrowlist`
  ADD PRIMARY KEY (`ID_BORROWLIST`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_BUKU` (`ID_BUKU`),
  ADD KEY `ID_TRANSACTION` (`ID_TRANSACTION`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID_BUKU`);

--
-- Indexes for table `mahastudent`
--
ALTER TABLE `mahastudent`
  ADD PRIMARY KEY (`ID_MAHASTUDENT`),
  ADD KEY `ID_MEMBER` (`ID_MEMBER`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID_MEMBER`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`ID_STAFF`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID_TRANSACTION`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_BUKU` (`ID_BUKU`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrowlist`
--
ALTER TABLE `borrowlist`
  MODIFY `ID_BORROWLIST` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID_BUKU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `mahastudent`
--
ALTER TABLE `mahastudent`
  MODIFY `ID_MAHASTUDENT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID_MEMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `ID_STAFF` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID_TRANSACTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowlist`
--
ALTER TABLE `borrowlist`
  ADD CONSTRAINT `borrowlist_ibfk_3` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowlist_ibfk_4` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowlist_ibfk_5` FOREIGN KEY (`ID_TRANSACTION`) REFERENCES `transaction` (`ID_TRANSACTION`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahastudent`
--
ALTER TABLE `mahastudent`
  ADD CONSTRAINT `mahastudent_ibfk_1` FOREIGN KEY (`ID_MEMBER`) REFERENCES `member` (`ID_MEMBER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahastudent_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`ID_BUKU`) REFERENCES `buku` (`ID_BUKU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

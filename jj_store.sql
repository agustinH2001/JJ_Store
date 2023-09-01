-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 09:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jj_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminNombre` varchar(32) NOT NULL,
  `adminPassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminNombre`, `adminPassword`) VALUES
('Agustin', 'myadmin123'),
('JuanAngel', 'myadmin321');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `productoID` int(11) NOT NULL,
  `productoNombre` varchar(64) NOT NULL,
  `productoDesc` varchar(256) NOT NULL,
  `productoStock` int(11) NOT NULL,
  `productoPrecio` float NOT NULL,
  `productoURL` varchar(256) NOT NULL,
  `productoCat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`productoID`, `productoNombre`, `productoDesc`, `productoStock`, `productoPrecio`, `productoURL`, `productoCat`) VALUES
(3, 'Auriculares SONY ', 'Auriculares con muy buena calidad de sonido y audio envolvente', 100, 5000.67, 'https://www.sony.com.ar/image/dd18cf93606d238305a733d336c45537?fmt=pjpeg&wid=330&bgcolor=FFFFFF&bgc=FFFFFF', 1),
(4, 'Mousepad gamer', 'Mousepad muy comodo con tela flexible', 10, 8000, 'https://www.fullh4rd.com.ar/img/productos/56/mousepad-logitech-200x230mm-black-956000035-0.jpg', 1),
(5, 'Mouse gamer', 'Mouse ergonomico con DPI configurable', 15, 5600, 'https://mexx-img-2019.s3.amazonaws.com/38348_1.jpeg', 1),
(6, 'RAM kingston 4gb', 'Memoria RAM kingston de alta velocidad', 5, 14500, 'https://app.contabilium.com/files/explorer/16277/Productos-Servicios/concepto-6030007.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uID` int(16) NOT NULL,
  `uNombre` varchar(32) NOT NULL,
  `uCorreo` varchar(32) NOT NULL,
  `uPassword` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `productoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

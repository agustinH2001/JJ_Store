-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 03:18 AM
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
(4, 'Mousepad gamer', 'Mousepad muy comodo con tela flexible', 10, 8000, 'https://www.fullh4rd.com.ar/img/productos/56/mousepad-logitech-200x230mm-black-956000035-0.jpg', 1),
(5, 'Mouse gamer', 'Mouse ergonomico con DPI configurable', 15, 5600, 'https://mexx-img-2019.s3.amazonaws.com/38348_1.jpeg', 1),
(6, 'RAM kingston 4gb', 'Memoria RAM kingston de alta velocidad', 500, 14500, 'https://app.contabilium.com/files/explorer/16277/Productos-Servicios/concepto-6030007.jpg', 4),
(7, 'Teclado gamer rgb', 'Teclado ergonomico y con luces RGB', 100, 15000.5, 'https://app.contabilium.com/files/explorer/20302/Productos-Servicios/concepto-5400544.jpg', 1),
(17, 'Auriculares RGB Redragon', 'Auriculares con acolchado de tela y RGB', 10, 25000, 'https://mexx-img-2019.s3.amazonaws.com/Auricular-Gamer-Redragon-Zeus-H510-Rgb_41187_1.jpeg', 1),
(18, 'Auriculares inalámbricos SONY', 'Auriculares bluetooth', 5, 30000, 'https://arsonyb2c.vtexassets.com/arquivos/ids/362133/WH-CH510-B--1000x1000--posta.jpg?v=638170780089400000', 1),
(19, 'Monitor 24 pulgadas', 'Monitor gamer marca samsung', 5, 150000, 'https://images.fravega.com/f500/058a039861305d2e106eaa1dfd54b0af.jpg', 2),
(20, 'Cable USB - Micro USB', 'Cable de USB  a Micro USB 2.4A', 100, 2500, 'https://www.shiftdigital.com.ar/images/SkyWay%20Cable%20USB%20a%20Micro%20USB%202.4A%201.jpg', 3),
(22, 'Adaptador HDMI a VGA', 'Convierte señal HDMI a VGA, ideal para conectar Notebook a Pantalla', 50, 300, 'https://www.todomicro.com.ar/7010-large_default/conversor-de-video-hdmi-a-vga.jpg', 3);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`uID`, `uNombre`, `uCorreo`, `uPassword`) VALUES
(1, 'agustin2001', 'agustinlugo@hotmail.com', 'agustin123'),
(2, 'prueba', 'prueba@gmail.com', 'prueba123'),
(3, 'root', 'pedro@gmail.com', 'pedro123'),
(4, 'pedro', 'pedro55@gmail.com', 'pedro123'),
(5, 'prueba123', 'prueba123@gmail.com', 'prueba123'),
(6, 'Agustin2023', 'agustin@gmail.com', 'agustin123'),
(7, 'ADMIN', 'admin@jjstore.com', 'Admin123'),
(8, 'SCJ', 'scj@gmail.com', 'scj123'),
(9, 'Jose', 'jose@gmail.com', 'jose123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productoID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `productoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uID` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

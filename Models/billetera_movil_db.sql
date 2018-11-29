-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2018 a las 09:56:49
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `billetera_movil_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `pk_transaction` int(11) NOT NULL,
  `fk_sender` int(11) NOT NULL,
  `fk_receiver` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fk_transaction_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`pk_transaction`, `fk_sender`, `fk_receiver`, `amount`, `date`, `fk_transaction_type`) VALUES
(9, 1, 2, 100, '2018-11-29 07:10:13', 1),
(10, 1, 2, 100, '2018-11-29 07:11:27', 1),
(11, 1, 2, 100, '2018-11-29 07:13:10', 1),
(12, 1, 2, 100, '2018-11-29 07:14:53', 1),
(13, 1, 2, 100, '2018-11-29 07:15:38', 1),
(14, 1, 2, 100, '2018-11-29 07:17:38', 1),
(15, 1, 2, 50, '2018-11-29 07:21:51', 1),
(16, 1, 2, 50, '2018-11-29 07:22:47', 1),
(17, 1, 2, 50, '2018-11-29 07:25:33', 1),
(18, 1, 2, 50, '2018-11-29 07:25:57', 1),
(19, 1, 2, 50, '2018-11-29 07:26:35', 1),
(20, 1, 2, 50, '2018-11-29 07:27:21', 1),
(21, 1, 2, 50, '2018-11-29 07:27:32', 1),
(22, 1, 2, 50, '2018-11-29 07:30:39', 1),
(23, 1, 2, 50, '2018-11-29 07:32:35', 1),
(24, 1, 2, 50, '2018-11-29 07:34:49', 1),
(25, 1, 2, 0, '2018-11-29 07:35:31', 1),
(26, 1, 2, 0, '2018-11-29 07:36:02', 1),
(27, 1, 2, 0, '2018-11-29 07:37:19', 1),
(28, 1, 2, 0, '2018-11-29 07:37:21', 1),
(29, 1, 2, 0, '2018-11-29 07:37:29', 1),
(30, 1, 2, 0, '2018-11-29 07:37:41', 1),
(31, 1, 2, 0, '2018-11-29 07:38:04', 1),
(32, 1, 2, 0, '2018-11-29 07:47:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions_types`
--

CREATE TABLE `transactions_types` (
  `pk_transaction_type` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `transactions_types`
--

INSERT INTO `transactions_types` (`pk_transaction_type`, `type`) VALUES
(1, 'credit'),
(2, 'debit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `pk_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `balance` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`pk_user`, `username`, `password`, `first_name`, `last_name`, `email`, `phone`, `balance`) VALUES
(1, 'gaboarp2020', '0f1ecb9b1a62a9935b2e78305e56b6bf', 'Gabriel', 'Ron', 'gaboarp2020@gmail.com', '04121781019', 16037),
(2, 'prueba', 'e10adc3949ba59abbe56e057f20f883e', 'prueba', 'prueba', 'prueba@gmail.com', '123456789', 502);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`pk_transaction`),
  ADD KEY `fk_sender` (`fk_sender`),
  ADD KEY `fk_receiver` (`fk_receiver`),
  ADD KEY `fk_transaction_type` (`fk_transaction_type`);

--
-- Indices de la tabla `transactions_types`
--
ALTER TABLE `transactions_types`
  ADD PRIMARY KEY (`pk_transaction_type`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`pk_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `pk_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `transactions_types`
--
ALTER TABLE `transactions_types`
  MODIFY `pk_transaction_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `pk_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`fk_sender`) REFERENCES `users` (`pk_user`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`fk_receiver`) REFERENCES `users` (`pk_user`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`fk_transaction_type`) REFERENCES `transactions_types` (`pk_transaction_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

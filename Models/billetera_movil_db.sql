-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2018 a las 21:44:49
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

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
  `date` date NOT NULL,
  `fk_transaction_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'gaboarp2020', '0f1ecb9b1a62a9935b2e78305e56b6bf', 'Gabriel', 'Ron', 'gaboarp2020@gmail.com', '04121781019', 0);

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
  MODIFY `pk_transaction` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transactions_types`
--
ALTER TABLE `transactions_types`
  MODIFY `pk_transaction_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `pk_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

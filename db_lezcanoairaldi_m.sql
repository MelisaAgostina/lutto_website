-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 22:47:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lezcanoairaldi_m`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`) VALUES
(1, 'urnas'),
(2, 'fotografia'),
(3, 'joyas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `apellido`, `email`, `mensaje`, `leido`) VALUES
(1, 'Arya ', 'Stark', 'arya@noone.com', 'you know nothing jon snow', 1),
(3, 'Sansa', 'Stark', 'sansa@stark.com', 'you know nothing jon snow', 1),
(10, 'Jon', 'Snow', 'jon@snow.com', 'i am your king', 1),
(14, 'Melisa', 'Airaldi', 'melisalezcanoairaldi@gmail.com', 'hola', 0),
(15, 'Princess', 'Khaleesi', 'motherofdragons@gmail.com', 'you know nothing jon snow', 0),
(16, 'rick', 'grimes', 'rick@grimes.com', 'coral', 0),
(17, 'shane', 'walsh', 'shane@walsh.com', 'let me tell u something', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultasprod`
--

CREATE TABLE `consultasprod` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `mensaje` varchar(400) NOT NULL,
  `leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultasprod`
--

INSERT INTO `consultasprod` (`id`, `nombre`, `producto`, `mensaje`, `leido`) VALUES
(1, 'jon snow', 'casita de pino', 'cuando vuelve a estar en stock', 0),
(2, 'arya', 'estatuilla mascota', 'viene en color rosa?', 0),
(3, 'sole', 'urna', 'holi', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `categoria_id` int(3) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `precio_vta` float(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `activo` varchar(11) NOT NULL DEFAULT 'SI'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `categoria_id`, `nombre`, `descripcion`, `precio`, `precio_vta`, `stock`, `stock_min`, `imagen`, `activo`) VALUES
(13, 1, 'Urna de Caoba', 'Urna de madera personalizable para mascotas, perfecta para honrar y recordar a tu fiel compañero. Graba una imagen y un mensaje conmemorativo para mantener vivo su recuerdo en tu corazón.', 15000.00, 20000.00, 18, 10, '1716948216_01a5152525770d250972.png', 'SI'),
(14, 1, 'Urna de Nogal', 'Urna de madera de cerezo con espacio para una foto, perfecta para honrar la memoria de tu amada mascota. Personalizable para incluir una imagen y un mensaje conmovedor que mantenga vivo su recuerdo.', 25000.00, 27000.00, 15, 10, '1716948343_487b32728a752273f6e3.png', 'SI'),
(15, 1, 'Urna de Cerezo', 'Urna de madera de cerezo con espacio para una foto, perfecta para honrar la memoria de tu amada mascota. Personalizable para incluir una imagen y un mensaje conmovedor que mantenga vivo su recuerdo.', 25000.00, 27000.00, 26, 10, '1717699240_b11fb5c563f8d9f9facb.png', 'SI'),
(16, 1, 'Casita de Pino', 'Urna de madera de pino con diseño de casita, incluye espacio para una foto. Ideal para conmemorar a tu mascota en un estilo acogedor y hogareño, manteniendo su recuerdo vivo de manera cálida.', 30000.00, 32500.00, 20, 10, '1718469514_70f1be1cba7c2925e404.png', 'SI'),
(17, 1, 'Urna de Roble', 'Urna de madera de roble con espacio para una foto, ideal para recordar a tu querida mascota. Personalizable con una imagen y un mensaje conmemorativo, manteniendo vivo su recuerdo de manera elegante.', 15000.00, 17000.00, 19, 10, '1716949677_d9d5f2b8434bc2a8a3c2.png', 'SI'),
(18, 1, 'Portavelas de Roble', 'Urna de madera de roble con portavelas integrado y huella de la mascota grabada. Personaliza con el nombre y huella de tu amado compañero para un tributo cálido y significativo.', 12000.00, 12500.00, 31, 10, '1718569862_6d8380c095f7bb2252f0.png', 'SI'),
(19, 1, 'Vela Conmemorativa', 'Vela conmemorativa en frasco de vidrio, personalizable con la foto y nombre de tu mascota. Ideal para recordar a tu querido compañero de manera cálida y emotiva, iluminando su memoria con cada llama.', 10000.00, 11000.00, 24, 10, '1716949748_cc4445d1029dfee0e473.png', 'SI'),
(20, 1, 'Vela Personalizada', 'Vela conmemorativa en frasco de vidrio ámbar, personalizable con la foto y un mensaje para tu mascota. Diseño elegante y cálido, perfecto para honrar la memoria de tu fiel compañero.', 12000.00, 12500.00, 32, 10, '1716949540_b294ffe83ce2615c3bce.png', 'SI'),
(21, 2, 'Portarretrato Cerámico', 'Portarretrato conmemorativo que incluye una vela, diseñado para honrar la memoria de tu mascota. Personaliza con la foto de tu fiel compañero para crear un homenaje emotivo y duradero.', 20000.00, 21800.00, 36, 10, '1717789254_2a798a1d746770662484.png', 'SI'),
(22, 2, 'Retrato Personalizado', 'Retrato personalizado de mascotas enmarcado, ideal para honrar a tus queridos compañeros. Incluye una ilustración detallada basada en las fotos proporcionadas, capturando sus rasgos únicos.', 24000.00, 24800.00, 21, 10, '1716951751_c7eacb3bd253ef3febb2.png', 'SI'),
(23, 2, 'Estatuilla Personalizada', 'Estatuilla conmemorativa en forma de cojín con una figura de mascota con alas y placa personalizable. Incluye un mensaje grabado y el nombre de tu compañero, creando un tributo emotivo y duradero.', 40000.00, 45000.00, 30, 10, '1716951817_c20c4868702d7dd63c07.png', 'SI'),
(24, 2, 'Casting de Huella', 'Esculturas de huellas de mascota realizadas mediante proceso de casting. Se utiliza un molde de silicona para capturar cada detalle de la huella, creando una réplica fiel en metal.', 32000.00, 35000.00, 18, 10, '1716951859_d141aeba6b8965fc4143.png', 'SI'),
(25, 2, 'Casting Mascota y Dueño', 'Escultura conmemorativa que captura el momento especial entre la mano del dueño y la pata de su mascota. Realizada mediante proceso de casting, esta pieza personalizada refleja el vínculo único.', 32500.00, 34000.00, 20, 10, '1716951893_e2359433dcd08073a4a1.png', 'SI'),
(26, 2, 'Estatuilla Mascota', 'Escultura conmemorativa de mascota en reposo, creada mediante proceso de casting. La pieza captura la esencia y detalle del pelaje de tu mascota, ofreciendo una representación realista y emotiva.', 42000.00, 45000.00, 26, 10, '1718568898_91cc703c197b25bf003d.png', 'SI'),
(27, 3, 'Relicario Corazón', 'Medallón en forma de corazón con foto personalizada de tu mascota en su interior. Este colgante es perfecto para llevar siempre contigo el recuerdo de tu fiel amigo, manteniendo su memoria cerca.', 23000.00, 27000.00, 49, 10, '1716952231_60a35f16dfb74baf4dbf.png', 'SI'),
(28, 3, 'Corazón con Grabado', 'Medallón en forma de corazón con grabado personalizado de tu mascota. Disponible en acabados plateado y dorado-', 15000.00, 20000.00, 41, 10, '1716952564_f7c571c9c1440fe6d548.png', 'SI'),
(29, 3, 'Medalla Personalizada', 'Colgante de oro personalizado con la imagen de tu mascota según la foto proporcionada por el dueño. Este delicado y elegante colgante captura los detalles y la esencia de tu fiel compañero.', 12000.00, 15000.00, 23, 10, '1716952764_509ab5ff53b6b23828e9.png', 'SI'),
(30, 3, 'Dije con Grabado', 'Colgantes circulares de oro rosa personalizados con el grabado de la imagen y el nombre de tu mascota. Un tributo elegante y significativo que puedes llevar siempre contigo.', 12000.00, 15000.00, 32, 10, '1716953050_e66b1f6f5d3184e3a1b3.png', 'SI'),
(31, 3, 'Colgante con Fotografía', 'Colgante en forma de huella disponible en acabados plateado, dorado y rosado. Personalizable según la foto de tu mascota.', 20000.00, 23000.00, 25, 10, '1716953215_bd0614d74c82c12cc157.png', 'SI'),
(32, 3, 'Corazón Huellitas', 'Colgante en forma de corazón con huella y hocico personalizados de tu mascota. Disponible en plateado y dorado, es una manera elegante y conmovedora de llevar contigo un tributo único.', 22000.00, 24540.00, 26, 10, '1716953445_92430f2ae6a685add41a.png', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id`, `descripcion`) VALUES
(2, 'Tarjeta de Crédito'),
(3, 'Tarjeta de Débito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `logged_in` tinyint(1) NOT NULL,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `username`, `email`, `domicilio`, `postal`, `telefono`, `pass`, `perfil_id`, `logged_in`, `baja`) VALUES
(31, 'Jon', 'Snow', 'cliente', 'jon@snow.com', 'Winterfell', '123', '123456789', '$2y$10$8SHU9ZAlF/NOaUDqhleLROlW5SJ51hlrhMFABZ1v26sUKEnPro9g2', 2, 1, 'NO'),
(32, 'Melisa', 'Airaldi', 'admin', 'melisalezcanoairaldi@gmail.com', 'nowhere', 'W3400', '03794747458', '$2y$10$de/ohjIBrfJjBbHiaCygBec.UsWSZ1q5xo7KaDVT6gcK29DeJzeAy', 1, 1, 'NO'),
(33, 'Arya', 'Stark', 'LordCommander', 'arya@stark.com', 'winterfell', '123', '789456456', '$2y$10$w75HzkSZ078WGqYo1JBr8.V6RdmNVgn4i.MT07YYMZCmfQg0wYQmC', 2, 1, 'SÍ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `usuario_id` int(11) NOT NULL,
  `total_venta` float(10,2) NOT NULL,
  `tipoPago_id` int(11) NOT NULL,
  `tarjeta` varchar(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `expira` date NOT NULL,
  `cvc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `usuario_id`, `total_venta`, `tipoPago_id`, `tarjeta`, `nombre`, `expira`, `cvc`) VALUES
(15, '2024-06-13', 31, 12500.00, 2, '123456789', 'jon snow', '2028-05-27', 123),
(16, '2024-06-13', 31, 42000.00, 2, '151515151515', 'Jon Snow', '2028-06-30', 555),
(17, '2024-06-14', 31, 12500.00, 3, '20202020', 'jon snow', '2024-06-13', 666),
(18, '2024-06-14', 31, 12500.00, 3, '20202020', 'jon snow', '2024-06-13', 666),
(19, '2024-06-14', 31, 12500.00, 3, '20202020', 'jon snow', '2024-06-13', 666),
(20, '2024-06-14', 31, 27000.00, 2, '123456789', 'jon snow', '2025-04-18', 123),
(21, '2024-06-14', 31, 182800.00, 2, '1321313132321', 'Jon', '1999-06-06', 156),
(22, '2024-06-14', 31, 20000.00, 3, '20202020', 'jon snow', '2024-06-06', 555),
(23, '2024-06-14', 31, 20000.00, 2, '20202020', 'melisa lezcano', '2024-06-13', 123),
(24, '2024-06-15', 33, 40000.00, 2, '151515151515', 'Arya Stark', '2028-02-15', 888),
(25, '2024-06-15', 33, 15000.00, 2, '151515151515', 'Arya Stark', '2027-02-15', 888),
(26, '2024-06-15', 33, 20000.00, 2, '1515151515', 'Arya Stark', '2024-06-15', 123),
(27, '2024-06-15', 31, 20000.00, 2, '202020202020', 'Jon Snow', '2024-06-28', 555),
(28, '2024-06-16', 31, 70000.00, 3, '2222222222222', 'Jon Snow', '2024-06-07', 111),
(29, '2024-06-16', 31, 86500.00, 2, '123456456', 'sole', '2029-09-05', 456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta`, `producto`, `cantidad`, `precio`) VALUES
(6, 15, 18, 1, 12500.00),
(7, 16, 13, 1, 20000.00),
(8, 16, 19, 2, 11000.00),
(9, 17, 20, 1, 12500.00),
(10, 18, 20, 1, 12500.00),
(11, 19, 20, 1, 12500.00),
(12, 20, 14, 1, 27000.00),
(13, 21, 22, 6, 24800.00),
(14, 21, 25, 1, 34000.00),
(15, 22, 13, 1, 20000.00),
(16, 23, 13, 1, 20000.00),
(17, 24, 13, 2, 20000.00),
(18, 25, 30, 1, 15000.00),
(19, 26, 13, 1, 20000.00),
(20, 27, 13, 1, 20000.00),
(21, 28, 24, 2, 35000.00),
(22, 29, 15, 1, 27000.00),
(23, 29, 16, 1, 32500.00),
(24, 29, 27, 1, 27000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultasprod`
--
ALTER TABLE `consultasprod`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tipoPago_id` (`tipoPago_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta` (`venta`),
  ADD KEY `producto` (`producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `consultasprod`
--
ALTER TABLE `consultasprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfiles`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`tipoPago_id`) REFERENCES `tipo_pago` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto`) REFERENCES `productos` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

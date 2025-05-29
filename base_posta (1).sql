-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2025 a las 07:14:31
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
-- Base de datos: `base_posta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `IdCita` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Dia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NombreDoctor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Especialidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `HoradeAtencion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Aviso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NombredelPaciente` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDocumento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`IdCita`, `Fecha`, `Dia`, `NombreDoctor`, `Especialidad`, `HoradeAtencion`, `Aviso`, `NombredelPaciente`, `NumDocumento`) VALUES
('1', '2024-10-25', 'viernes', 'Cardiología', '', '11:27', 'Llegar 30 min antes para pasar por TRIAGE', 'Marco Chavez', '71514119'),
('1', '2024-10-25', 'viernes', 'Cardiología', '', '19:37', 'Llegar 30 min antes para pasar por TRIAGE', 'Luis Angeles', '71514119');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `Id` int(50) NOT NULL,
  `Nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Especialidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(50) NOT NULL,
  `horasdeTrabajo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `DiasdeTrabajo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`Id`, `Nombre`, `Especialidad`, `Telefono`, `horasdeTrabajo`, `DiasdeTrabajo`) VALUES
(1, 'Dr. Juan Pérez', 'Cardiología', 987654321, '8 horas', 'Lun, Mier, Vier'),
(2, 'Dra. María López', 'Dermatología', 912345678, '6 horas', 'Mar, Jue, Sab'),
(3, 'Dr. Carlos Gómez', 'Pediatría', 923456789, '7 horas', 'Lun, Jue, Dom'),
(4, 'Dra. Ana Torres', 'Ginecología', 934567890, '8 horas', 'Mar, Vier'),
(5, 'Dr. Luis Sánchez', 'Neurología', 945678901, '5 horas', 'Lun, Sab'),
(6, 'Diego Fernandez', 'Traumatologia', 913345908, '4 horas', 'Mi Vi Dom');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `NombreApe` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `TipoDocumento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDocumento` int(50) NOT NULL,
  `FechaNacimiento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` int(50) NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `TipoSeguro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `NombreApe`, `TipoDocumento`, `NumDocumento`, `FechaNacimiento`, `Celular`, `Correo`, `TipoSeguro`, `Contraseña`) VALUES
(1, 'Angeles Mendoza Luis del Piero', 'DNI', 71418624, '20 de Julio 2004', 987709074, 'luisangeles@gmail.com', 'SIS', '203006'),
(2, 'Milagros Gonzales Andres', 'DNI', 61801571, '22 de enero 2004', 913850263, 'gonzalesmilagros258@gmail.com', 'SIS', '220104'),
(3, 'Jarol Arriea', 'DNI', 71427186, '05/09/2004', 967743623, 'srrietaramirezjarol9', 'SIS', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioadmin`
--

CREATE TABLE `usuarioadmin` (
  `Nombre` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_doc` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDoc` int(11) DEFAULT NULL,
  `Correo` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarioadmin`
--

INSERT INTO `usuarioadmin` (`Nombre`, `Contraseña`, `Tipo_doc`, `NumDoc`, `Correo`) VALUES
('Luis', '123456', 'DNI', 71418624, 'luis20angel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariodoc`
--
-- Error leyendo la estructura de la tabla base_posta.usuariodoc: #1932 - Table &#039;base_posta.usuariodoc&#039; doesn&#039;t exist in engine
-- Error leyendo datos de la tabla base_posta.usuariodoc: #1064 - Algo está equivocado en su sintax cerca &#039;FROM `base_posta`.`usuariodoc`&#039; en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(512) NOT NULL,
  `Fabricante` varchar(512) NOT NULL,
  `Vacu_disp` int(255) NOT NULL,
  `FechaCad` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `Nombre`, `Fabricante`, `Vacu_disp`, `FechaCad`) VALUES
(2, 'COVID-19 Pfizer', 'Pfizer Inc.', 2, '2025-12-31'),
(3, 'COVID-19 Moderna', 'Moderna Inc.', 2, '2025-11-30'),
(4, 'Hepatitis B', 'GSK', 3, '2026-06-15'),
(5, 'Influenza Estacional', 'Sanofi Pasteur', 1, '2025-10-01'),
(6, 'Tétanos', 'Merck', 3, '2027-01-01'),
(7, 'Sarampión-Rubeola-Paperas (SRP)', 'Serum Institute', 2, '2026-05-20'),
(8, 'Varicela', 'Bio Farma', 2, '2025-09-10'),
(9, 'COVID-19 AstraZeneca', 'AstraZeneca', 2, '2025-08-15'),
(10, 'Rabia', 'Bharat Biotech', 5, '2026-12-12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2015 a las 01:41:56
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vuelos2`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_informe_vuelo`(IN cod_vuelo INT, IN origen INT , IN destino INT, IN  fecha_origen DATE, IN hora_origen INT, IN n_origen INT, IN n_destino INT)
BEGIN
IF (n_origen != origen || n_destino != destino) THEN
INSERT INTO informe_vuelo(cod_vuelo, origen, destino, fecha_origen, hora_origen, modificacion) 
VALUES (cod_vuelo, origen, destino, fecha_origen, hora_origen, now());
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aeropuertos`
--

CREATE TABLE IF NOT EXISTS `aeropuertos` (
  `cod_aeropuerto` varchar(45) NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `cod_ciudad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aeropuertos`
--

INSERT INTO `aeropuertos` (`cod_aeropuerto`, `nombre`, `cod_ciudad`) VALUES
('1', 'Aeropuerto Internacional El Ede', '63001'),
('11', 'Aeropuerto Internacional Almirante Padilla ', '44001'),
('111', 'Aeropuerto Internacional El Ede', '63001'),
('12', 'Aeropuerto Internacional Gustavo Rojas Pinilla', '88001'),
('13', 'Aeropuerto Internacional Sim?n Bol?var ', '47001'),
('14', 'Aeropuerto Antonio Rold?n Betancourt', '5045'),
('15', 'Aeropuerto Santiago P?rez', '81001'),
('16', 'Aeropuerto Yarigu?es', '68081'),
('17', 'Terminal Puente A?reo', '11001'),
('18', 'Aeropuerto Gustavo Artunduaga', '18001'),
('19', 'Aeropuerto Perales', '73001'),
('2', 'Aeropuerto Internacional Ernesto Cortissoz', '8001'),
('20', 'Aeropuerto de La Nubia', '17001'),
('21', 'Aeropuerto Olaya Herrera', '5001'),
('22', 'Aeropuerto Los Garzones', '23001'),
('23', 'Aeropuerto Benito Salas', '41001'),
('24', 'Aeropuerto Antonio Nari', '52001'),
('25', 'Aeropuerto Guillermo Le?n Valencia', '19001'),
('26', 'Aeropuerto El Embrujo', '88564'),
('28', 'Aeropuerto El Cara', '27001'),
('29', 'Aeropuerto La Florida', '52835'),
('3', 'Aeropuerto Internacional El Dorado', '11001'),
('30', 'Aeropuerto Alfonso L?pez Pumarejo', '20001'),
('31', 'Aeropuerto Vanguardia', '50001'),
('32', 'Aeropuerto El Alcarav', '85001'),
('33', 'Aeropuerto Alcides Fern?ndez', '27006'),
('34', 'Aeropuerto de Araracuara', '18756'),
('35', 'Aeropuerto Jos? Celestino Mutis', '27075'),
('36', 'Aeropuerto Gerardo Tobar L?pez', '76109'),
('37', 'Aeropuerto Juan H. White', '5154'),
('38', 'Aeropuerto de Capurgan', '27077'),
('39', 'Aeropuerto Mandinga', '27205'),
('4', 'Aeropuerto Internacional Palonegro', '68001'),
('40', 'Aeropuerto Cumaribo', '99773'),
('41', 'Aeropuerto El Tomin', '5250'),
('42', 'Aeropuerto Santiago Vila', '25307'),
('43', 'Aeropuerto Juan Casiano', '19318'),
('44', 'Aeropuerto San Luis', '52356'),
('45', 'Aeropuerto de La Chorrera', '91405'),
('46', 'Aeropuerto de La Macarena', '50350'),
('47', 'Aeropuerto Jorge Isaacs', '44430'),
('48', 'Aeropuerto Fabio Alberto Le?n Bentley', '97001'),
('49', 'Aeropuerto Reyes Murillo', '27495'),
('5', 'Aeropuerto Internacional Alfonso Bonilla Arag', '76001'),
('50', 'Aeropuerto Aguas Claras', '54498'),
('51', 'Aeropuerto Contador', '41551'),
('52', 'Aeropuerto Puerto Bol?var', '44847'),
('53', 'Aeropuerto C?sar Gaviria Trujillo', '94884'),
('54', 'Aeropuerto Germ?n Olano', '99001'),
('55', 'Aeropuerto Caucaya', '86573'),
('56', 'Aeropuerto de Ot?', '5604'),
('57', 'Aeropuerto Jorge Enrique Gonz?lez', '95001'),
('58', 'Aeropuerto Eduardo Falla Solano', '18753'),
('59', 'Aeropuerto Los Colonizadores', '81736'),
('6', 'Aeropuerto Internacional Rafael N??ez ', '13001'),
('60', 'Aeropuerto Las Brujas', '70215'),
('61', 'Aeropuerto Alberto Lleras Camargo', '15759'),
('62', 'Aeropuerto Gabriel Vargas Santos', '81794'),
('63', 'Aeropuerto El Pindo', '23466'),
('64', 'Aeropuerto Golfo de Morrosquillo', '70823'),
('65', 'Aeropuerto de Villa Garz', '86885'),
('66', 'Aeropuerto Heriberto Gil Mart?nez', '76834'),
('67', 'Aeropuerto Guaymaral', '11001'),
('68', 'Aeropuerto de Juanchaco', '76109'),
('69', 'Aeropuerto La Arrobleda', '19698'),
('7', 'Aeropuerto Internacional Camilo Daza', '54001'),
('70', 'Aeropuerto Santa Ana', '76147'),
('71', 'Aeropuerto Jaime Ort?s Betancur', '5172'),
('72', 'Aeropuerto Cravo Norte', '81220'),
('73', 'Aeropuerto Guillermo Gaviria Correa', '5284'),
('74', 'Aeropuerto Baracoa de Magangu', '13430'),
('75', 'Aeropuerto La Majayura', '44430'),
('76', 'Aeropuerto Internacional del Caf', '17001'),
('77', 'Aeropuerto Mariquita', '73443'),
('78', 'Aeropuerto de Necocl', '5490'),
('79', 'Aeropuerto Juan Jos? Rond', '15516'),
('8', 'Aeropuerto Internacional Alfredo V?squez Cobo ', '91001'),
('80', 'Aeropuerto de Pizarro', '27600'),
('81', 'Aeropuerto Morelia', '50568'),
('82', 'Aeropuerto de Puerto Rico', '18592'),
('83', 'Aeropuerto El Triunfo', '5591'),
('84', 'Aeropuerto Los Pozos', '68679'),
('85', 'Aeropuerto San Pedro de Urab', '5665'),
('86', 'Aeropuerto Gustavo Rojas Pinilla', '15001'),
('87', 'Aeropuerto de Timbiqu', '19809'),
('88', 'Aeropuerto Gonzalo Mej', '5837'),
('89', 'Aeropuerto Militar CATAM', '11001'),
('9', 'Aeropuerto Internacional Jos? Mar?a C?rdova ', '5001'),
('90', 'Base A?rea Larandia', '18001'),
('91', 'Base A?rea de Madrid', '25430'),
('92', 'Base A?rea de Marand?a', '95015'),
('93', 'Base A?rea de Tolemaida', '73449'),
('94', 'Base A?rea Germ?n Olano (Palanquero)', '25572'),
('95', 'Base A?rea de Tres Esquinas', '18756');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE IF NOT EXISTS `aviones` (
`cod_avion` int(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `cod_compañia` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=888885 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`cod_avion`, `tipo`, `modelo`, `cod_compañia`) VALUES
(888882, 'Comerciall', '2015', '105'),
(888883, 'Turismo', '2017', '115'),
(888884, 'Comercial', '2015', '105');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `cod_ciudad` varchar(45) CHARACTER SET latin1 NOT NULL,
  `cod_dept` varchar(45) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(45) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`cod_ciudad`, `cod_dept`, `nombre`) VALUES
('11001', '5', 'BOGOTÁ, D.C...'),
('110011', '5', 'BOGOTÁ, D.C...'),
('123', '2', 'El poblado'),
('13001', '6', 'CARTAGENA'),
('13006', '6', 'ACH'),
('13030', '6', 'ALTOS DEL ROSARIO'),
('13042', '6', 'ARENAL'),
('13052', '6', 'ARJONA'),
('13062', '6', 'ARROYOHONDO'),
('13074', '6', 'BARRANCO DE LOBA'),
('13140', '6', 'CALAMAR'),
('13160', '6', 'CANTAGALLO'),
('13188', '6', 'CICUCO'),
('13212', '6', 'C?RDOBA'),
('13222', '6', 'CLEMENCIA'),
('13244', '6', 'EL CARMEN DE BOL?VAR'),
('13248', '6', 'EL GUAMO'),
('13268', '6', 'EL PE??N'),
('13300', '6', 'HATILLO DE LOBA'),
('13430', '6', 'MAGANGU'),
('13433', '6', 'MAHATES'),
('13440', '6', 'MARGARITA'),
('13442', '6', 'MAR?A LA BAJA'),
('13458', '6', 'MONTECRISTO'),
('13468', '6', 'MOMP?S'),
('13473', '6', 'MORALES'),
('13490', '6', 'NOROS'),
('13549', '6', 'PINILLOS'),
('13580', '6', 'REGIDOR'),
('13600', '6', 'R?O VIEJO'),
('13620', '6', 'SAN CRIST?BAL'),
('13647', '6', 'SAN ESTANISLAO'),
('13650', '6', 'SAN FERNANDO'),
('13654', '6', 'SAN JACINTO'),
('13655', '6', 'SAN JACINTO DEL CAUCA'),
('13657', '6', 'SAN JUAN NEPOMUCENO'),
('13667', '6', 'SAN MART?N DE LOBA'),
('13670', '6', 'SAN PABLO'),
('13673', '6', 'SANTA CATALINA'),
('13683', '6', 'SANTA ROSA'),
('13688', '6', 'SANTA ROSA DEL SUR'),
('13744', '6', 'SIMIT'),
('13760', '6', 'SOPLAVIENTO'),
('13780', '6', 'TALAIGUA NUEVO'),
('13810', '6', 'TIQUISIO'),
('13836', '6', 'TURBACO'),
('13838', '6', 'TURBAN?'),
('13873', '6', 'VILLANUEVA'),
('13894', '6', 'ZAMBRANO'),
('15001', '7', 'TUNJA'),
('15022', '7', 'ALMEIDA'),
('15047', '7', 'AQUITANIA'),
('15051', '7', 'ARCABUCO'),
('15087', '7', 'BEL?N'),
('15090', '7', 'BERBEO'),
('15092', '7', 'BET?ITIVA'),
('15097', '7', 'BOAVITA'),
('15104', '7', 'BOYAC?'),
('15106', '7', 'BRICE?O'),
('15109', '7', 'BUENAVISTA'),
('15114', '7', 'BUSBANZ?'),
('15131', '7', 'CALDAS'),
('15135', '7', 'CAMPOHERMOSO'),
('15162', '7', 'CERINZA'),
('15172', '7', 'CHINAVITA'),
('15176', '7', 'CHIQUINQUIR?'),
('15180', '7', 'CHISCAS'),
('15183', '7', 'CHITA'),
('15185', '7', 'CHITARAQUE'),
('15187', '7', 'CHIVAT?'),
('15189', '7', 'CI?NEGA'),
('15204', '7', 'C?MBITA'),
('15212', '7', 'COPER'),
('15215', '7', 'CORRALES'),
('15218', '7', 'COVARACH?A'),
('15223', '7', 'CUBAR?'),
('15224', '7', 'CUCAITA'),
('15226', '7', 'CU?TIVA'),
('15232', '7', 'CH?QUIZA'),
('15236', '7', 'CHIVOR'),
('15238', '7', 'DUITAMA'),
('15244', '7', 'EL COCUY'),
('15248', '7', 'EL ESPINO'),
('15272', '7', 'FIRAVITOBA'),
('15276', '7', 'FLORESTA'),
('15293', '7', 'GACHANTIV?'),
('15296', '7', 'GAMEZA'),
('15299', '7', 'GARAGOA'),
('15317', '7', 'GUACAMAYAS'),
('15322', '7', 'GUATEQUE'),
('15325', '7', 'GUAYAT?'),
('15332', '7', 'G?IC?N'),
('15362', '7', 'IZA'),
('15367', '7', 'JENESANO'),
('15368', '7', 'JERIC'),
('15377', '7', 'LABRANZAGRANDE'),
('15380', '7', 'LA CAPILLA'),
('15401', '7', 'LA VICTORIA'),
('15403', '7', 'LA UVITA'),
('15407', '7', 'VILLA DE LEYVA'),
('15425', '7', 'MACANAL'),
('15442', '7', 'MARIP'),
('15455', '7', 'MIRAFLORES'),
('15464', '7', 'MONGUA'),
('15466', '7', 'MONGU'),
('15469', '7', 'MONIQUIR?'),
('15476', '7', 'MOTAVITA'),
('15480', '7', 'MUZO'),
('15491', '7', 'NOBSA'),
('15494', '7', 'NUEVO COL?N'),
('15500', '7', 'OICAT?'),
('15507', '7', 'OTANCHE'),
('15511', '7', 'PACHAVITA'),
('15514', '7', 'P?EZ'),
('15516', '7', 'PAIPA'),
('15518', '7', 'PAJARITO'),
('15522', '7', 'PANQUEBA'),
('15531', '7', 'PAUNA'),
('15533', '7', 'PAYA'),
('15537', '7', 'PAZ DE R?O'),
('15542', '7', 'PESCA'),
('15550', '7', 'PISBA'),
('15572', '7', 'PUERTO BOYAC?'),
('15580', '7', 'QU?PAMA'),
('15599', '7', 'RAMIRIQU'),
('15600', '7', 'R?QUIRA'),
('15621', '7', 'ROND?N'),
('15632', '7', 'SABOY?'),
('15638', '7', 'S?CHICA'),
('15646', '7', 'SAMAC?'),
('15660', '7', 'SAN EDUARDO'),
('15664', '7', 'SAN JOS? DE PARE'),
('15667', '7', 'SAN LUIS DE GACENO'),
('15673', '7', 'SAN MATEO'),
('15676', '7', 'SAN MIGUEL DE SEMA'),
('15681', '7', 'SAN PABLO DE BORBUR'),
('15686', '7', 'SANTANA'),
('15690', '7', 'SANTA MAR?A'),
('15693', '7', 'SANTA ROSA DE VITERBO'),
('15696', '7', 'SANTA SOF?A'),
('15720', '7', 'SATIVANORTE'),
('15723', '7', 'SATIVASUR'),
('15740', '7', 'SIACHOQUE'),
('15753', '7', 'SOAT?'),
('15755', '7', 'SOCOT?'),
('15757', '7', 'SOCHA'),
('15759', '7', 'SOGAMOSO'),
('15761', '7', 'SOMONDOCO'),
('15762', '7', 'SORA'),
('15763', '7', 'SOTAQUIR?'),
('15764', '7', 'SORAC?'),
('15774', '7', 'SUSAC?N'),
('15776', '7', 'SUTAMARCH?N'),
('15778', '7', 'SUTATENZA'),
('15790', '7', 'TASCO'),
('15798', '7', 'TENZA'),
('15804', '7', 'TIBAN?'),
('15806', '7', 'TIBASOSA'),
('15808', '7', 'TINJAC?'),
('15810', '7', 'TIPACOQUE'),
('15814', '7', 'TOCA'),
('15816', '7', 'TOG?'),
('15820', '7', 'T?PAGA'),
('15822', '7', 'TOTA'),
('15832', '7', 'TUNUNGU?'),
('15835', '7', 'TURMEQU'),
('15837', '7', 'TUTA'),
('15839', '7', 'TUTAZ?'),
('15842', '7', 'UMBITA'),
('15861', '7', 'VENTAQUEMADA'),
('15879', '7', 'VIRACACH?'),
('15897', '7', 'ZETAQUIRA'),
('17001', '8', 'MANIZALES'),
('17013', '8', 'AGUADAS'),
('17042', '8', 'ANSERMA'),
('17050', '8', 'ARANZAZU'),
('17088', '8', 'BELALC?ZAR'),
('17174', '8', 'CHINCHIN?'),
('17272', '8', 'FILADELFIA'),
('17380', '8', 'LA DORADA'),
('17388', '8', 'LA MERCED'),
('17433', '8', 'MANZANARES'),
('17442', '8', 'MARMATO'),
('17444', '8', 'MARQUETALIA'),
('17446', '8', 'MARULANDA'),
('17486', '8', 'NEIRA'),
('17495', '8', 'NORCASIA'),
('17513', '8', 'P?CORA'),
('17524', '8', 'PALESTINA'),
('17541', '8', 'PENSILVANIA'),
('17614', '8', 'RIOSUCIO'),
('17616', '8', 'RISARALDA'),
('17653', '8', 'SALAMINA'),
('17662', '8', 'SAMAN?'),
('17665', '8', 'SAN JOS'),
('17777', '8', 'SUP?A'),
('17867', '8', 'VICTORIA'),
('17873', '8', 'VILLAMAR?A'),
('17877', '8', 'VITERBO'),
('18001', '9', 'FLORENCIA'),
('18029', '9', 'ALBANIA'),
('18094', '9', 'BEL?N DE LOS ANDAQU?ES'),
('18150', '9', 'CARTAGENA DEL CHAIR?'),
('18205', '9', 'CURILLO'),
('18247', '9', 'EL DONCELLO'),
('18256', '9', 'EL PAUJIL'),
('18410', '9', 'LA MONTA?ITA'),
('18460', '9', 'MIL?N'),
('18479', '9', 'MORELIA'),
('18592', '9', 'PUERTO RICO'),
('18610', '9', 'SAN JOS? DEL FRAGUA'),
('18753', '9', 'SAN VICENTE DEL CAGU?N'),
('18756', '9', 'SOLANO'),
('18785', '9', 'SOLITA'),
('18860', '9', 'VALPARA?SO'),
('19001', '11', 'POPAY?N'),
('19022', '11', 'ALMAGUER'),
('19050', '11', 'ARGELIA'),
('19075', '11', 'BALBOA'),
('19100', '11', 'BOL?VAR'),
('19110', '11', 'BUENOS AIRES'),
('19130', '11', 'CAJIB?O'),
('19137', '11', 'CALDONO'),
('19142', '11', 'CALOTO'),
('19212', '11', 'CORINTO'),
('19256', '11', 'EL TAMBO'),
('19290', '11', 'FLORENCIA'),
('19300', '11', 'GUACHEN'),
('19318', '11', 'GUAPI'),
('19355', '11', 'INZ?'),
('19364', '11', 'JAMBAL'),
('19392', '11', 'LA SIERRA'),
('19397', '11', 'LA VEGA'),
('19418', '11', 'L?PEZ'),
('19450', '11', 'MERCADERES'),
('19455', '11', 'MIRANDA'),
('19473', '11', 'MORALES'),
('19513', '11', 'PADILLA'),
('19517', '11', 'PAEZ'),
('19532', '11', 'PAT?A'),
('19533', '11', 'PIAMONTE'),
('19548', '11', 'PIENDAM'),
('19573', '11', 'PUERTO TEJADA'),
('19585', '11', 'PURAC'),
('19622', '11', 'ROSAS'),
('19693', '11', 'SAN SEBASTI?N'),
('19698', '11', 'SANTANDER DE QUILICHAO'),
('19701', '11', 'SANTA ROSA'),
('19743', '11', 'SILVIA'),
('19760', '11', 'SOTARA'),
('19780', '11', 'SU?REZ'),
('19785', '11', 'SUCRE'),
('19807', '11', 'TIMB?O'),
('19809', '11', 'TIMBIQU'),
('19821', '11', 'TORIBIO'),
('19824', '11', 'TOTOR'),
('19845', '11', 'VILLA RICA'),
('20001', '12', 'VALLEDUPAR'),
('20011', '12', 'AGUACHICA'),
('20013', '12', 'AGUST?N CODAZZI'),
('20032', '12', 'ASTREA'),
('20045', '12', 'BECERRIL'),
('20060', '12', 'BOSCONIA'),
('20175', '12', 'CHIMICHAGUA'),
('20178', '12', 'CHIRIGUAN?'),
('20228', '12', 'CURUMAN'),
('20238', '12', 'EL COPEY'),
('20250', '12', 'EL PASO'),
('20295', '12', 'GAMARRA'),
('20310', '12', 'GONZ?LEZ'),
('20383', '12', 'LA GLORIA'),
('20400', '12', 'LA JAGUA DE IBIRICO'),
('20443', '12', 'MANAURE'),
('20517', '12', 'PAILITAS'),
('20550', '12', 'PELAYA'),
('20570', '12', 'PUEBLO BELLO'),
('20614', '12', 'R?O DE ORO'),
('20621', '12', 'LA PAZ'),
('20710', '12', 'SAN ALBERTO'),
('20750', '12', 'SAN DIEGO'),
('20770', '12', 'SAN MART?N'),
('20787', '12', 'TAMALAMEQUE'),
('23001', '14', 'MONTER?A'),
('23068', '14', 'AYAPEL'),
('23079', '14', 'BUENAVISTA'),
('23090', '14', 'CANALETE'),
('23162', '14', 'CERET'),
('23168', '14', 'CHIM?'),
('23182', '14', 'CHIN'),
('23189', '14', 'CI?NAGA DE ORO'),
('23300', '14', 'COTORRA'),
('23350', '14', 'LA APARTADA'),
('23417', '14', 'LORICA'),
('23419', '14', 'LOS C?RDOBAS'),
('23464', '14', 'MOMIL'),
('23466', '14', 'MONTEL?BANO'),
('23500', '14', 'MO?ITOS'),
('23555', '14', 'PLANETA RICA'),
('23570', '14', 'PUEBLO NUEVO'),
('23574', '14', 'PUERTO ESCONDIDO'),
('23580', '14', 'PUERTO LIBERTADOR'),
('23586', '14', 'PUR?SIMA'),
('23660', '14', 'SAHAG?N'),
('23670', '14', 'SAN ANDR?S SOTAVENTO'),
('23672', '14', 'SAN ANTERO'),
('23675', '14', 'SAN BERNARDO DEL VIENTO'),
('23678', '14', 'SAN CARLOS'),
('23682', '14', 'SAN JOS? DE UR'),
('23686', '14', 'SAN PELAYO'),
('23807', '14', 'TIERRALTA'),
('23815', '14', 'TUCH?N'),
('23855', '14', 'VALENCIA'),
('25001', '15', 'AGUA DE DIOS'),
('25019', '15', 'ALB?N'),
('25035', '15', 'ANAPOIMA'),
('25040', '15', 'ANOLAIMA'),
('25053', '15', 'ARBEL?EZ'),
('25086', '15', 'BELTR?N'),
('25095', '15', 'BITUIMA'),
('25099', '15', 'BOJAC?'),
('25120', '15', 'CABRERA'),
('25123', '15', 'CACHIPAY'),
('25126', '15', 'CAJIC?'),
('25148', '15', 'CAPARRAP'),
('25151', '15', 'CAQUEZA'),
('25154', '15', 'CARMEN DE CARUPA'),
('25168', '15', 'CHAGUAN'),
('25175', '15', 'CH?A'),
('25178', '15', 'CHIPAQUE'),
('25181', '15', 'CHOACH'),
('25183', '15', 'CHOCONT?'),
('25200', '15', 'COGUA'),
('25214', '15', 'COTA'),
('25224', '15', 'CUCUNUB?'),
('25245', '15', 'EL COLEGIO'),
('25258', '15', 'EL PE??N'),
('25260', '15', 'EL ROSAL'),
('25269', '15', 'FACATATIV?'),
('25279', '15', 'FOMEQUE'),
('25281', '15', 'FOSCA'),
('25286', '15', 'FUNZA'),
('25288', '15', 'F?QUENE'),
('25290', '15', 'FUSAGASUG?'),
('25293', '15', 'GACHALA'),
('25295', '15', 'GACHANCIP?'),
('25297', '15', 'GACHET?'),
('25299', '15', 'GAMA'),
('25307', '15', 'GIRARDOT'),
('25312', '15', 'GRANADA'),
('25317', '15', 'GUACHET?'),
('25320', '15', 'GUADUAS'),
('25322', '15', 'GUASCA'),
('25324', '15', 'GUATAQU'),
('25326', '15', 'GUATAVITA'),
('25328', '15', 'GUAYABAL DE SIQUIMA'),
('25335', '15', 'GUAYABETAL'),
('25339', '15', 'GUTI?RREZ'),
('25368', '15', 'JERUSAL?N'),
('25372', '15', 'JUN?N'),
('25377', '15', 'LA CALERA'),
('25386', '15', 'LA MESA'),
('25394', '15', 'LA PALMA'),
('25398', '15', 'LA PE?A'),
('25402', '15', 'LA VEGA'),
('25407', '15', 'LENGUAZAQUE'),
('25426', '15', 'MACHETA'),
('25430', '15', 'MADRID'),
('25436', '15', 'MANTA'),
('25438', '15', 'MEDINA'),
('25473', '15', 'MOSQUERA'),
('25483', '15', 'NARI?O'),
('25486', '15', 'NEMOC?N'),
('25488', '15', 'NILO'),
('25489', '15', 'NIMAIMA'),
('25491', '15', 'NOCAIMA'),
('25506', '15', 'VENECIA'),
('25513', '15', 'PACHO'),
('25518', '15', 'PAIME'),
('25524', '15', 'PANDI'),
('25530', '15', 'PARATEBUENO'),
('25535', '15', 'PASCA'),
('25572', '15', 'PUERTO SALGAR'),
('25580', '15', 'PUL'),
('25592', '15', 'QUEBRADANEGRA'),
('25594', '15', 'QUETAME'),
('25596', '15', 'QUIPILE'),
('25599', '15', 'APULO'),
('25612', '15', 'RICAURTE'),
('25645', '15', 'SAN ANTONIO DEL TEQUENDAMA'),
('25649', '15', 'SAN BERNARDO'),
('25653', '15', 'SAN CAYETANO'),
('25658', '15', 'SAN FRANCISCO'),
('25662', '15', 'SAN JUAN DE R?O SECO'),
('25718', '15', 'SASAIMA'),
('25736', '15', 'SESQUIL'),
('25740', '15', 'SIBAT'),
('25743', '15', 'SILVANIA'),
('25745', '15', 'SIMIJACA'),
('25754', '15', 'SOACHA'),
('25758', '15', 'SOP'),
('25769', '15', 'SUBACHOQUE'),
('25772', '15', 'SUESCA'),
('25777', '15', 'SUPAT?'),
('25779', '15', 'SUSA'),
('25781', '15', 'SUTATAUSA'),
('25785', '15', 'TABIO'),
('25793', '15', 'TAUSA'),
('25797', '15', 'TENA'),
('25799', '15', 'TENJO'),
('25805', '15', 'TIBACUY'),
('25807', '15', 'TIBIRITA'),
('25815', '15', 'TOCAIMA'),
('25817', '15', 'TOCANCIP?'),
('25823', '15', 'TOPAIP'),
('25839', '15', 'UBAL?'),
('25841', '15', 'UBAQUE'),
('25843', '15', 'VILLA DE SAN DIEGO DE UBATE'),
('25845', '15', 'UNE'),
('25851', '15', 'TICA'),
('25862', '15', 'VERGARA'),
('25867', '15', 'VIAN'),
('25871', '15', 'VILLAG?MEZ'),
('25873', '15', 'VILLAPINZ?N'),
('25875', '15', 'VILLETA'),
('25878', '15', 'VIOT?'),
('25885', '15', 'YACOP'),
('25898', '15', 'ZIPAC?N'),
('25899', '15', 'ZIPAQUIR?'),
('27001', '13', 'QUIBD'),
('27006', '13', 'ACAND'),
('27025', '13', 'ALTO BAUD'),
('27050', '13', 'ATRATO'),
('27073', '13', 'BAGAD'),
('27075', '13', 'BAH?A SOLANO'),
('27077', '13', 'BAJO BAUD'),
('27099', '13', 'BOJAYA'),
('27135', '13', 'EL CANT?N DEL SAN PABLO'),
('27150', '13', 'CARMEN DEL DARI?N'),
('27160', '13', 'C?RTEGUI'),
('27205', '13', 'CONDOTO'),
('27245', '13', 'EL CARMEN DE ATRATO'),
('27250', '13', 'EL LITORAL DEL SAN JUAN'),
('27361', '13', 'ISTMINA'),
('27372', '13', 'JURAD'),
('27413', '13', 'LLOR'),
('27425', '13', 'MEDIO ATRATO'),
('27430', '13', 'MEDIO BAUD'),
('27450', '13', 'MEDIO SAN JUAN'),
('27491', '13', 'N?VITA'),
('27495', '13', 'NUQU'),
('27580', '13', 'R?O IR'),
('27600', '13', 'R?O QUITO'),
('27615', '13', 'RIOSUCIO'),
('27660', '13', 'SAN JOS? DEL PALMAR'),
('27745', '13', 'SIP'),
('27787', '13', 'TAD'),
('27800', '13', 'UNGU?A'),
('27810', '13', 'UNI?N PANAMERICANA'),
('41001', '18', 'NEIVA'),
('41006', '18', 'ACEVEDO'),
('41013', '18', 'AGRADO'),
('41016', '18', 'AIPE'),
('41020', '18', 'ALGECIRAS'),
('41026', '18', 'ALTAMIRA'),
('41078', '18', 'BARAYA'),
('41132', '18', 'CAMPOALEGRE'),
('41206', '18', 'COLOMBIA'),
('41244', '18', 'EL?AS'),
('41298', '18', 'GARZ?N'),
('41306', '18', 'GIGANTE'),
('41319', '18', 'GUADALUPE'),
('41349', '18', 'HOBO'),
('41357', '18', 'IQUIRA'),
('41359', '18', 'ISNOS'),
('41378', '18', 'LA ARGENTINA'),
('41396', '18', 'LA PLATA'),
('41483', '18', 'N?TAGA'),
('41503', '18', 'OPORAPA'),
('41518', '18', 'PAICOL'),
('41524', '18', 'PALERMO'),
('41530', '18', 'PALESTINA'),
('41548', '18', 'PITAL'),
('41551', '18', 'PITALITO'),
('41615', '18', 'RIVERA'),
('41660', '18', 'SALADOBLANCO'),
('41668', '18', 'SAN AGUST?N'),
('41676', '18', 'SANTA MAR?A'),
('41770', '18', 'SUAZA'),
('41791', '18', 'TARQUI'),
('41797', '18', 'TESALIA'),
('41799', '18', 'TELLO'),
('41801', '18', 'TERUEL'),
('41807', '18', 'TIMAN?'),
('41872', '18', 'VILLAVIEJA'),
('41885', '18', 'YAGUAR?'),
('44001', '19', 'RIOHACHA'),
('44035', '19', 'ALBANIA'),
('44078', '19', 'BARRANCAS'),
('44090', '19', 'DIBULLA'),
('44098', '19', 'DISTRACCI?N'),
('44110', '19', 'EL MOLINO'),
('44279', '19', 'FONSECA'),
('44378', '19', 'HATONUEVO'),
('44420', '19', 'LA JAGUA DEL PILAR'),
('44430', '19', 'MAICAO'),
('44560', '19', 'MANAURE'),
('44650', '19', 'SAN JUAN DEL CESAR'),
('44847', '19', 'URIBIA'),
('44855', '19', 'URUMITA'),
('44874', '19', 'VILLANUEVA'),
('456', '123', 'caucacia'),
('47001', '20', 'SANTA MARTA'),
('47030', '20', 'ALGARROBO'),
('47053', '20', 'ARACATACA'),
('47058', '20', 'ARIGUAN'),
('47161', '20', 'CERRO SAN ANTONIO'),
('47170', '20', 'CHIVOLO'),
('47189', '20', 'CI?NAGA'),
('47205', '20', 'CONCORDIA'),
('47245', '20', 'EL BANCO'),
('47258', '20', 'EL PI?ON'),
('47268', '20', 'EL RET?N'),
('47288', '20', 'FUNDACI?N'),
('47318', '20', 'GUAMAL'),
('47460', '20', 'NUEVA GRANADA'),
('47541', '20', 'PEDRAZA'),
('47545', '20', 'PIJI?O DEL CARMEN'),
('47551', '20', 'PIVIJAY'),
('47555', '20', 'PLATO'),
('47570', '20', 'PUEBLOVIEJO'),
('47605', '20', 'REMOLINO'),
('47660', '20', 'SABANAS DE SAN ANGEL'),
('47675', '20', 'SALAMINA'),
('47692', '20', 'SAN SEBASTI?N DE BUENAVISTA'),
('47703', '20', 'SAN ZEN?N'),
('47707', '20', 'SANTA ANA'),
('47720', '20', 'SANTA B?RBARA DE PINTO'),
('47745', '20', 'SITIONUEVO'),
('47798', '20', 'TENERIFE'),
('47960', '20', 'ZAPAY?N'),
('47980', '20', 'ZONA BANANERA'),
('50001', '21', 'VILLAVICENCIO'),
('50006', '21', 'ACAC?AS'),
('5001', '2', 'MEDELL?N'),
('5002', '2', 'ABEJORRAL'),
('5004', '2', 'ABRIAQU'),
('50110', '21', 'BARRANCA DE UP?A'),
('50124', '21', 'CABUYARO'),
('50150', '21', 'CASTILLA LA NUEVA'),
('5021', '2', 'ALEJANDR?A'),
('50223', '21', 'CUBARRAL'),
('50226', '21', 'CUMARAL'),
('50245', '21', 'EL CALVARIO'),
('50251', '21', 'EL CASTILLO'),
('50270', '21', 'EL DORADO'),
('50287', '21', 'FUENTE DE ORO'),
('5030', '2', 'AMAG?'),
('5031', '2', 'AMALFI'),
('50313', '21', 'GRANADA'),
('50318', '21', 'GUAMAL'),
('50325', '21', 'MAPIRIP?N'),
('50330', '21', 'MESETAS'),
('5034', '2', 'ANDES'),
('50350', '21', 'LA MACARENA'),
('5036', '2', 'ANGEL?POLIS'),
('50370', '21', 'URIBE'),
('5038', '2', 'ANGOSTURA'),
('5040', '2', 'ANOR'),
('50400', '21', 'LEJAN?AS'),
('5042', '2', 'SANTAF? DE ANTIOQUIA'),
('5044', '2', 'ANZA'),
('5045', '2', 'APARTAD'),
('50450', '21', 'PUERTO CONCORDIA'),
('5051', '2', 'ARBOLETES'),
('5055', '2', 'ARGELIA'),
('50568', '21', 'PUERTO GAIT?N'),
('50573', '21', 'PUERTO L?PEZ'),
('50577', '21', 'PUERTO LLERAS'),
('5059', '2', 'ARMENIA'),
('50590', '21', 'PUERTO RICO'),
('50606', '21', 'RESTREPO'),
('50680', '21', 'SAN CARLOS DE GUAROA'),
('50683', '21', 'SAN JUAN DE ARAMA'),
('50686', '21', 'SAN JUANITO'),
('50689', '21', 'SAN MART?N'),
('50711', '21', 'VISTAHERMOSA'),
('5079', '2', 'BARBOSA'),
('5086', '2', 'BELMIRA'),
('5088', '2', 'BELLO'),
('5091', '2', 'BETANIA'),
('5093', '2', 'BETULIA'),
('5101', '2', 'CIUDAD BOL?VAR'),
('5107', '2', 'BRICE?O'),
('5113', '2', 'BURITIC?'),
('5120', '2', 'C?CERES'),
('5125', '2', 'CAICEDO'),
('5129', '2', 'CALDAS'),
('5134', '2', 'CAMPAMENTO'),
('5138', '2', 'CA?ASGORDAS'),
('5142', '2', 'CARACOL'),
('5145', '2', 'CARAMANTA'),
('5147', '2', 'CAREPA'),
('5148', '2', 'EL CARMEN DE VIBORAL'),
('5150', '2', 'CAROLINA'),
('5154', '2', 'CAUCASIA'),
('5172', '2', 'CHIGOROD'),
('5190', '2', 'CISNEROS'),
('5197', '2', 'COCORN?'),
('52001', '22', 'PASTO'),
('52019', '22', 'ALB?N'),
('52022', '22', 'ALDANA'),
('52036', '22', 'ANCUY?'),
('52051', '22', 'ARBOLEDA'),
('5206', '2', 'CONCEPCI?N'),
('52079', '22', 'BARBACOAS'),
('52083', '22', 'BEL?N'),
('5209', '2', 'CONCORDIA'),
('52110', '22', 'BUESACO'),
('5212', '2', 'COPACABANA'),
('52203', '22', 'COL?N'),
('52207', '22', 'CONSACA'),
('52210', '22', 'CONTADERO'),
('52215', '22', 'C?RDOBA'),
('52224', '22', 'CUASPUD'),
('52227', '22', 'CUMBAL'),
('52233', '22', 'CUMBITARA'),
('52240', '22', 'CHACHAG?'),
('52250', '22', 'EL CHARCO'),
('52254', '22', 'EL PE?OL'),
('52256', '22', 'EL ROSARIO'),
('52258', '22', 'EL TABL?N DE G?MEZ'),
('52260', '22', 'EL TAMBO'),
('52287', '22', 'FUNES'),
('52317', '22', 'GUACHUCAL'),
('52320', '22', 'GUAITARILLA'),
('52323', '22', 'GUALMAT?N'),
('5234', '2', 'DABEIBA'),
('52352', '22', 'ILES'),
('52354', '22', 'IMU?S'),
('52356', '22', 'IPIALES'),
('5237', '2', 'DONMAT?AS'),
('52378', '22', 'LA CRUZ'),
('52381', '22', 'LA FLORIDA'),
('52385', '22', 'LA LLANADA'),
('52390', '22', 'LA TOLA'),
('52399', '22', 'LA UNI?N'),
('5240', '2', 'EB?JICO'),
('52405', '22', 'LEIVA'),
('52411', '22', 'LINARES'),
('52418', '22', 'LOS ANDES'),
('52427', '22', 'MAG?I'),
('52435', '22', 'MALLAMA'),
('52473', '22', 'MOSQUERA'),
('52480', '22', 'NARI?O'),
('52490', '22', 'OLAYA HERRERA'),
('5250', '2', 'EL BAGRE'),
('52506', '22', 'OSPINA'),
('52520', '22', 'FRANCISCO PIZARRO'),
('52540', '22', 'POLICARPA'),
('52560', '22', 'POTOS'),
('52565', '22', 'PROVIDENCIA'),
('52573', '22', 'PUERRES'),
('52585', '22', 'PUPIALES'),
('52612', '22', 'RICAURTE'),
('52621', '22', 'ROBERTO PAY?N'),
('5264', '2', 'ENTRERRIOS'),
('5266', '2', 'ENVIGADO'),
('52678', '22', 'SAMANIEGO'),
('52683', '22', 'SANDON?'),
('52685', '22', 'SAN BERNARDO'),
('52687', '22', 'SAN LORENZO'),
('52693', '22', 'SAN PABLO'),
('52694', '22', 'SAN PEDRO DE CARTAGO'),
('52696', '22', 'SANTA B?RBARA'),
('52699', '22', 'SANTACRUZ'),
('52720', '22', 'SAPUYES'),
('52786', '22', 'TAMINANGO'),
('52788', '22', 'TANGUA'),
('5282', '2', 'FREDONIA'),
('52835', '22', 'SAN ANDRES DE TUMACO'),
('52838', '22', 'T?QUERRES'),
('5284', '2', 'FRONTINO'),
('52885', '22', 'YACUANQUER'),
('5306', '2', 'GIRALDO'),
('5308', '2', 'GIRARDOTA'),
('5310', '2', 'G?MEZ PLATA'),
('5313', '2', 'GRANADA'),
('5315', '2', 'GUADALUPE'),
('5318', '2', 'GUARNE'),
('5321', '2', 'GUATAPE'),
('5347', '2', 'HELICONIA'),
('5353', '2', 'HISPANIA'),
('5360', '2', 'ITAGUI'),
('5361', '2', 'ITUANGO'),
('5364', '2', 'JARD?N'),
('5368', '2', 'JERIC'),
('5376', '2', 'LA CEJA'),
('5380', '2', 'LA ESTRELLA'),
('5390', '2', 'LA PINTADA'),
('5400', '2', 'LA UNI?N'),
('54001', '23', 'C?CUTA'),
('54003', '23', 'ABREGO'),
('54051', '23', 'ARBOLEDAS'),
('54099', '23', 'BOCHALEMA'),
('54109', '23', 'BUCARASICA'),
('5411', '2', 'LIBORINA'),
('54125', '23', 'C?COTA'),
('54128', '23', 'CACHIR?'),
('54172', '23', 'CHIN?COTA'),
('54174', '23', 'CHITAG?'),
('54206', '23', 'CONVENCI?N'),
('54223', '23', 'CUCUTILLA'),
('54239', '23', 'DURANIA'),
('54245', '23', 'EL CARMEN'),
('5425', '2', 'MACEO'),
('54250', '23', 'EL TARRA'),
('54261', '23', 'EL ZULIA'),
('54313', '23', 'GRAMALOTE'),
('54344', '23', 'HACAR'),
('54347', '23', 'HERR?N'),
('54377', '23', 'LABATECA'),
('54385', '23', 'LA ESPERANZA'),
('54398', '23', 'LA PLAYA'),
('5440', '2', 'MARINILLA'),
('54405', '23', 'LOS PATIOS'),
('54418', '23', 'LOURDES'),
('54480', '23', 'MUTISCUA'),
('54498', '23', 'OCA?A'),
('54518', '23', 'PAMPLONA'),
('54520', '23', 'PAMPLONITA'),
('54553', '23', 'PUERTO SANTANDER'),
('54599', '23', 'RAGONVALIA'),
('54660', '23', 'SALAZAR'),
('5467', '2', 'MONTEBELLO'),
('54670', '23', 'SAN CALIXTO'),
('54673', '23', 'SAN CAYETANO'),
('54680', '23', 'SANTIAGO'),
('54720', '23', 'SARDINATA'),
('54743', '23', 'SILOS'),
('5475', '2', 'MURIND'),
('5480', '2', 'MUTAT?'),
('54800', '23', 'TEORAMA'),
('54810', '23', 'TIB'),
('54820', '23', 'TOLEDO'),
('5483', '2', 'NARI?O'),
('54871', '23', 'VILLA CARO'),
('54874', '23', 'VILLA DEL ROSARIO'),
('5490', '2', 'NECOCL'),
('5495', '2', 'NECH'),
('5501', '2', 'OLAYA'),
('5541', '2', 'PE?OL'),
('5543', '2', 'PEQUE'),
('5576', '2', 'PUEBLORRICO'),
('5579', '2', 'PUERTO BERR?O'),
('5585', '2', 'PUERTO NARE'),
('5591', '2', 'PUERTO TRIUNFO'),
('5604', '2', 'REMEDIOS'),
('5607', '2', 'RETIRO'),
('5615', '2', 'RIONEGRO'),
('5628', '2', 'SABANALARGA'),
('5631', '2', 'SABANETA'),
('5642', '2', 'SALGAR'),
('5647', '2', 'SAN ANDR?S DE CUERQU?A'),
('5649', '2', 'SAN CARLOS'),
('5652', '2', 'SAN FRANCISCO'),
('5656', '2', 'SAN JER?NIMO'),
('5658', '2', 'SAN JOS? DE LA MONTA?A'),
('5659', '2', 'SAN JUAN DE URAB?'),
('5660', '2', 'SAN LUIS'),
('5664', '2', 'SAN PEDRO DE LOS MILAGROS'),
('5665', '2', 'SAN PEDRO DE URABA'),
('5667', '2', 'SAN RAFAEL'),
('5670', '2', 'SAN ROQUE'),
('5674', '2', 'SAN VICENTE'),
('5679', '2', 'SANTA B?RBARA'),
('5686', '2', 'SANTA ROSA DE OSOS'),
('5690', '2', 'SANTO DOMINGO'),
('5697', '2', 'EL SANTUARIO'),
('5736', '2', 'SEGOVIA'),
('5756', '2', 'SONSON'),
('5761', '2', 'SOPETR?N'),
('5789', '2', 'T?MESIS'),
('5790', '2', 'TARAZ?'),
('5792', '2', 'TARSO'),
('5809', '2', 'TITIRIB'),
('5819', '2', 'TOLEDO'),
('5837', '2', 'TURBO'),
('5842', '2', 'URAMITA'),
('5847', '2', 'URRAO'),
('5854', '2', 'VALDIVIA'),
('5856', '2', 'VALPARA?SO'),
('5858', '2', 'VEGACH'),
('5861', '2', 'VENECIA'),
('5873', '2', 'VIG?A DEL FUERTE'),
('5885', '2', 'YAL'),
('5887', '2', 'YARUMAL'),
('5890', '2', 'YOLOMB'),
('5893', '2', 'YOND'),
('5895', '2', 'ZARAGOZA'),
('63001', '25', 'ARMENIA'),
('63111', '25', 'BUENAVISTA'),
('63130', '25', 'CALARCA'),
('63190', '25', 'CIRCASIA'),
('63212', '25', 'C?RDOBA'),
('63272', '25', 'FILANDIA'),
('63302', '25', 'G?NOVA'),
('63401', '25', 'LA TEBAIDA'),
('63470', '25', 'MONTENEGRO'),
('63548', '25', 'PIJAO'),
('63594', '25', 'QUIMBAYA'),
('63690', '25', 'SALENTO'),
('66001', '26', 'PEREIRA'),
('66045', '26', 'AP?A'),
('66075', '26', 'BALBOA'),
('66088', '26', 'BEL?N DE UMBR?A'),
('66170', '26', 'DOSQUEBRADAS'),
('66318', '26', 'GU?TICA'),
('66383', '26', 'LA CELIA'),
('66400', '26', 'LA VIRGINIA'),
('66440', '26', 'MARSELLA'),
('66456', '26', 'MISTRAT'),
('66572', '26', 'PUEBLO RICO'),
('66594', '26', 'QUINCH?A'),
('66682', '26', 'SANTA ROSA DE CABAL'),
('66687', '26', 'SANTUARIO'),
('68001', '28', 'BUCARAMANGA'),
('68013', '28', 'AGUADA'),
('68020', '28', 'ALBANIA'),
('68051', '28', 'ARATOCA'),
('68077', '28', 'BARBOSA'),
('68079', '28', 'BARICHARA'),
('68081', '28', 'BARRANCABERMEJA'),
('68092', '28', 'BETULIA'),
('68101', '28', 'BOL?VAR'),
('68121', '28', 'CABRERA'),
('68132', '28', 'CALIFORNIA'),
('68147', '28', 'CAPITANEJO'),
('68152', '28', 'CARCAS'),
('68160', '28', 'CEPIT?'),
('68162', '28', 'CERRITO'),
('68167', '28', 'CHARAL?'),
('68169', '28', 'CHARTA'),
('68176', '28', 'CHIMA'),
('68179', '28', 'CHIPAT?'),
('68190', '28', 'CIMITARRA'),
('68207', '28', 'CONCEPCI?N'),
('68209', '28', 'CONFINES'),
('68211', '28', 'CONTRATACI?N'),
('68217', '28', 'COROMORO'),
('68229', '28', 'CURIT'),
('68235', '28', 'EL CARMEN DE CHUCUR'),
('68245', '28', 'EL GUACAMAYO'),
('68250', '28', 'EL PE??N'),
('68255', '28', 'EL PLAY?N'),
('68264', '28', 'ENCINO'),
('68266', '28', 'ENCISO'),
('68271', '28', 'FLORI?N'),
('68276', '28', 'FLORIDABLANCA'),
('68296', '28', 'GAL?N'),
('68298', '28', 'GAMBITA'),
('68307', '28', 'GIR?N'),
('68318', '28', 'GUACA'),
('68320', '28', 'GUADALUPE'),
('68322', '28', 'GUAPOT?'),
('68324', '28', 'GUAVAT?'),
('68327', '28', 'G?EPSA'),
('68344', '28', 'HATO'),
('68368', '28', 'JES?S MAR?A'),
('68370', '28', 'JORD?N'),
('68377', '28', 'LA BELLEZA'),
('68385', '28', 'LAND?ZURI'),
('68397', '28', 'LA PAZ'),
('68406', '28', 'LEBRIJA'),
('68418', '28', 'LOS SANTOS'),
('68425', '28', 'MACARAVITA'),
('68432', '28', 'M?LAGA'),
('68444', '28', 'MATANZA'),
('68464', '28', 'MOGOTES'),
('68468', '28', 'MOLAGAVITA'),
('68498', '28', 'OCAMONTE'),
('68500', '28', 'OIBA'),
('68502', '28', 'ONZAGA'),
('68522', '28', 'PALMAR'),
('68524', '28', 'PALMAS DEL SOCORRO'),
('68533', '28', 'P?RAMO'),
('68547', '28', 'PIEDECUESTA'),
('68549', '28', 'PINCHOTE'),
('68572', '28', 'PUENTE NACIONAL'),
('68573', '28', 'PUERTO PARRA'),
('68575', '28', 'PUERTO WILCHES'),
('68615', '28', 'RIONEGRO'),
('68655', '28', 'SABANA DE TORRES'),
('68669', '28', 'SAN ANDR?S'),
('68673', '28', 'SAN BENITO'),
('68679', '28', 'SAN GIL'),
('68682', '28', 'SAN JOAQU?N'),
('68684', '28', 'SAN JOS? DE MIRANDA'),
('68686', '28', 'SAN MIGUEL'),
('68689', '28', 'SAN VICENTE DE CHUCUR'),
('68705', '28', 'SANTA B?RBARA'),
('68720', '28', 'SANTA HELENA DEL OP?N'),
('68745', '28', 'SIMACOTA'),
('68755', '28', 'SOCORRO'),
('68770', '28', 'SUAITA'),
('68773', '28', 'SUCRE'),
('68780', '28', 'SURAT?'),
('68820', '28', 'TONA'),
('68855', '28', 'VALLE DE SAN JOS'),
('68861', '28', 'V?LEZ'),
('68867', '28', 'VETAS'),
('68872', '28', 'VILLANUEVA'),
('68895', '28', 'ZAPATOCA'),
('70001', '29', 'SINCELEJO'),
('70110', '29', 'BUENAVISTA'),
('70124', '29', 'CAIMITO'),
('70204', '29', 'COLOSO'),
('70215', '29', 'COROZAL'),
('70221', '29', 'COVE?AS'),
('70230', '29', 'CHAL?N'),
('70233', '29', 'EL ROBLE'),
('70235', '29', 'GALERAS'),
('70265', '29', 'GUARANDA'),
('70400', '29', 'LA UNI?N'),
('70418', '29', 'LOS PALMITOS'),
('70429', '29', 'MAJAGUAL'),
('70473', '29', 'MORROA'),
('70508', '29', 'OVEJAS'),
('70523', '29', 'PALMITO'),
('70670', '29', 'SAMPU?S'),
('70678', '29', 'SAN BENITO ABAD'),
('70702', '29', 'SAN JUAN DE BETULIA'),
('70708', '29', 'SAN MARCOS'),
('70713', '29', 'SAN ONOFRE'),
('70717', '29', 'SAN PEDRO'),
('70742', '29', 'SAN LUIS DE SINC'),
('70771', '29', 'SUCRE'),
('70820', '29', 'SANTIAGO DE TOL'),
('70823', '29', 'TOL? VIEJO'),
('73001', '30', 'IBAGU'),
('73024', '30', 'ALPUJARRA'),
('73026', '30', 'ALVARADO'),
('73030', '30', 'AMBALEMA'),
('73043', '30', 'ANZO?TEGUI'),
('73055', '30', 'ARMERO'),
('73067', '30', 'ATACO'),
('73124', '30', 'CAJAMARCA'),
('73148', '30', 'CARMEN DE APICAL?'),
('73152', '30', 'CASABIANCA'),
('73168', '30', 'CHAPARRAL'),
('73200', '30', 'COELLO'),
('73217', '30', 'COYAIMA'),
('73226', '30', 'CUNDAY'),
('73236', '30', 'DOLORES'),
('73268', '30', 'ESPINAL'),
('73270', '30', 'FALAN'),
('73275', '30', 'FLANDES'),
('73283', '30', 'FRESNO'),
('73319', '30', 'GUAMO'),
('73347', '30', 'HERVEO'),
('73349', '30', 'HONDA'),
('73352', '30', 'ICONONZO'),
('73408', '30', 'L?RIDA'),
('73411', '30', 'L?BANO'),
('73443', '30', 'SAN SEBASTI?N DE MARIQUITA'),
('73449', '30', 'MELGAR'),
('73461', '30', 'MURILLO'),
('73483', '30', 'NATAGAIMA'),
('73504', '30', 'ORTEGA'),
('73520', '30', 'PALOCABILDO'),
('73547', '30', 'PIEDRAS'),
('73555', '30', 'PLANADAS'),
('73563', '30', 'PRADO'),
('73585', '30', 'PURIFICACI?N'),
('73616', '30', 'RIOBLANCO'),
('73622', '30', 'RONCESVALLES'),
('73624', '30', 'ROVIRA'),
('73671', '30', 'SALDA?A'),
('73675', '30', 'SAN ANTONIO'),
('73678', '30', 'SAN LUIS'),
('73686', '30', 'SANTA ISABEL'),
('73770', '30', 'SU?REZ'),
('73854', '30', 'VALLE DE SAN JUAN'),
('73861', '30', 'VENADILLO'),
('73870', '30', 'VILLAHERMOSA'),
('73873', '30', 'VILLARRICA'),
('76001', '31', 'CALI'),
('76020', '31', 'ALCAL?'),
('76036', '31', 'ANDALUC?A'),
('76041', '31', 'ANSERMANUEVO'),
('76054', '31', 'ARGELIA'),
('76100', '31', 'BOL?VAR'),
('76109', '31', 'BUENAVENTURA'),
('76111', '31', 'GUADALAJARA DE BUGA'),
('76113', '31', 'BUGALAGRANDE'),
('76122', '31', 'CAICEDONIA'),
('76126', '31', 'CALIMA'),
('76130', '31', 'CANDELARIA'),
('76147', '31', 'CARTAGO'),
('76233', '31', 'DAGUA'),
('76243', '31', 'EL ?GUILA'),
('76246', '31', 'EL CAIRO'),
('76248', '31', 'EL CERRITO'),
('76250', '31', 'EL DOVIO'),
('76275', '31', 'FLORIDA'),
('76306', '31', 'GINEBRA'),
('76318', '31', 'GUACAR'),
('76364', '31', 'JAMUND'),
('76377', '31', 'LA CUMBRE'),
('76400', '31', 'LA UNI?N'),
('76403', '31', 'LA VICTORIA'),
('76497', '31', 'OBANDO'),
('76520', '31', 'PALMIRA'),
('76563', '31', 'PRADERA'),
('76606', '31', 'RESTREPO'),
('76616', '31', 'RIOFR?O'),
('76622', '31', 'ROLDANILLO'),
('76670', '31', 'SAN PEDRO'),
('76736', '31', 'SEVILLA'),
('76823', '31', 'TORO'),
('76828', '31', 'TRUJILLO'),
('76834', '31', 'TULU?'),
('76845', '31', 'ULLOA'),
('76863', '31', 'VERSALLES'),
('76869', '31', 'VIJES'),
('76890', '31', 'YOTOCO'),
('76892', '31', 'YUMBO'),
('76895', '31', 'ZARZAL'),
('8001', '4', 'BARRANQUILLA'),
('8078', '4', 'BARANOA'),
('81001', '3', 'ARAUCA'),
('81065', '3', 'ARAUQUITA'),
('81220', '3', 'CRAVO NORTE'),
('81300', '3', 'FORTUL'),
('8137', '4', 'CAMPO DE LA CRUZ'),
('8141', '4', 'CANDELARIA'),
('81591', '3', 'PUERTO ROND?N'),
('81736', '3', 'SARAVENA'),
('81794', '3', 'TAME'),
('8296', '4', 'GALAPA'),
('8372', '4', 'JUAN DE ACOSTA'),
('8421', '4', 'LURUACO'),
('8433', '4', 'MALAMBO'),
('8436', '4', 'MANAT'),
('85001', '10', 'YOPAL'),
('85010', '10', 'AGUAZUL'),
('85015', '10', 'CHAMEZA'),
('85125', '10', 'HATO COROZAL'),
('85136', '10', 'LA SALINA'),
('85139', '10', 'MAN'),
('85162', '10', 'MONTERREY'),
('8520', '4', 'PALMAR DE VARELA'),
('85225', '10', 'NUNCH?A'),
('85230', '10', 'OROCU'),
('85250', '10', 'PAZ DE ARIPORO'),
('85263', '10', 'PORE'),
('85279', '10', 'RECETOR'),
('85300', '10', 'SABANALARGA'),
('85315', '10', 'S?CAMA'),
('85325', '10', 'SAN LUIS DE PALENQUE'),
('85400', '10', 'T?MARA'),
('85410', '10', 'TAURAMENA'),
('85430', '10', 'TRINIDAD'),
('85440', '10', 'VILLANUEVA'),
('8549', '4', 'PIOJ'),
('8558', '4', 'POLONUEVO'),
('8560', '4', 'PONEDERA'),
('8573', '4', 'PUERTO COLOMBIA'),
('86001', '24', 'MOCOA'),
('8606', '4', 'REPEL?N'),
('86219', '24', 'COL?N'),
('86320', '24', 'ORITO'),
('8634', '4', 'SABANAGRANDE'),
('8638', '4', 'SABANALARGA'),
('86568', '24', 'PUERTO AS?S'),
('86569', '24', 'PUERTO CAICEDO'),
('86571', '24', 'PUERTO GUZM?N'),
('86573', '24', 'PUERTO LEGU?ZAMO'),
('86749', '24', 'SIBUNDOY'),
('8675', '4', 'SANTA LUC?A'),
('86755', '24', 'SAN FRANCISCO'),
('86757', '24', 'SAN MIGUEL'),
('86760', '24', 'SANTIAGO'),
('8685', '4', 'SANTO TOM?S'),
('86865', '24', 'VALLE DEL GUAMUEZ'),
('86885', '24', 'VILLAGARZ?N'),
('8758', '4', 'SOLEDAD'),
('8770', '4', 'SUAN'),
('88001', '27', 'SAN ANDR?S'),
('8832', '4', 'TUBAR?'),
('8849', '4', 'USIACUR'),
('88564', '27', 'PROVIDENCIA'),
('91001', '1', 'LETICIAA'),
('91263', '1', 'EL ENCANTO'),
('91405', '1', 'LA CHORRERA'),
('91407', '1', 'LA PEDRERA'),
('91430', '1', 'LA VICTORIA'),
('91460', '1', 'MIRITI - PARAN?'),
('91530', '1', 'PUERTO ALEGR?A'),
('91536', '1', 'PUERTO ARICA'),
('91540', '1', 'PUERTO NARI?O'),
('91669', '1', 'PUERTO SANTANDER'),
('91798', '1', 'TARAPAC?'),
('94001', '16', 'IN?RIDA'),
('94343', '16', 'BARRANCO MINAS'),
('94663', '16', 'MAPIRIPANA'),
('94883', '16', 'SAN FELIPE'),
('94884', '16', 'PUERTO COLOMBIA'),
('94885', '16', 'LA GUADALUPE'),
('94886', '16', 'CACAHUAL'),
('94887', '16', 'PANA PANA'),
('94888', '16', 'MORICHAL'),
('95001', '17', 'SAN JOS? DEL GUAVIARE'),
('95015', '17', 'CALAMAR'),
('95025', '17', 'EL RETORNO'),
('95200', '17', 'MIRAFLORES'),
('97001', '32', 'MIT'),
('97161', '32', 'CARURU'),
('97511', '32', 'PACOA'),
('97666', '32', 'TARAIRA'),
('97777', '32', 'PAPUNAUA'),
('97889', '32', 'YAVARAT'),
('99001', '33', 'PUERTO CARRE?O'),
('99524', '33', 'LA PRIMAVERA'),
('99624', '33', 'SANTA ROSAL?A'),
('99773', '33', 'CUMARIBO'),
('999', '9999', 'Choquito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compañia`
--

CREATE TABLE IF NOT EXISTS `compañia` (
  `cod_compañia` varchar(45) NOT NULL,
  `nombre` varchar(54) NOT NULL,
  `tipo` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compañia`
--

INSERT INTO `compañia` (`cod_compañia`, `nombre`, `tipo`) VALUES
('1', 'AEROEXPRESS S.A.S, ANTES S.A.', 'Ambulancias A?reas'),
('10', 'SOLAIR S.A.S.a', 'Ambulancias A?reas'),
('100', 'HELISERVICE LTDA.', 'AEROTAXIS'),
('101', 'HELISTAR S A S', 'AEROTAXIS'),
('1011', 'SOLAIR S.A.S.a', 'Ambulancias A?reas'),
('102', 'INTERNACIONAL EJECUTIVA DE AVIACION S.A.S.ANTES AEROL', 'AEROTAXISS'),
('103', 'LANS S.A.S. LINEAS AEREAS DEL NORTE DE SANTANDER S.A.S', 'AEROTAXIS'),
('105', 'LLANERA DE AVIACION S.A.S.', 'AEROTAXIS'),
('106', 'NACIONAL DE AVIACION, S. A.', 'AEROTAXIS'),
('107', 'PACIFICA DE AVIACION S.A.S.', 'AEROTAXIS'),
('108', 'PETROLEUM AVIATION AND SERVICES S.A.S', 'AEROTAXIS'),
('109', 'RIO SUR S. A.', 'AEROTAXIS'),
('11', 'AERIAL SIGN  S A S - AVIONES PUBLICITARIOS DE COLOMBIA', 'Trabajos A?reos Especiales y Fotografia'),
('110', 'SAER LTDA. SERVICIO AEREO REGIONAL', 'AEROTAXIS'),
('111', 'SASA S.A. SOCD AERONAUT DE SANTANDER.', 'AEROTAXIS'),
('112', 'SAVIARE LTDA. SERVICIOS AEREOS DEL GUAVIARE', 'AEROTAXIS'),
('113', 'SERVICIOS AEREOS PANAMERICANOS LIMITADA "SARPA LTDA"', 'AEROTAXIS'),
('114', 'SERVICIOS INTEGRALES HELICOPORTADOS SAS "SICHER HELICO', 'AEROTAXIS'),
('115', 'SERVICIOS INTERNACIONALES DE TRANSPORTE Y TURISMO S.A.', 'AEROTAXIS'),
('116', 'SOCIEDAD AEREA DE IBAGUE S.A.S. "SADI S.A.S."', 'AEROTAXIS'),
('117', 'SOLAIR S.A.S.', 'AEROTAXIS'),
('118', 'TAERCO LTDA. TAXI AEREO COLOMBIANO', 'AEROTAXIS'),
('119', 'TAXI AEREO CARIBE?O SAS ANTES TACA LTDA." TAXI AEREO C', 'AEROTAXIS'),
('12', 'AEROESTUDIOS S.A.', 'Trabajos A?reos Especiales y Fotografia'),
('120', 'TAXI AEREO DE LA COSTA TAXCO S.A.S.', 'AEROTAXIS'),
('121', 'TECNIAEREAS DE COLOMBIA S A S', 'AEROTAXIS'),
('122', 'TRANSPORTES AEREOS DEL ARIARI "TARI S.A.S."', 'AEROTAXIS'),
('123', 'VERTICAL DE AVIACION S A S', 'AEROTAXIS'),
('124', 'VIAS AEREAS NACIONALES  VIANA S.A.S.', 'AEROTAXIS'),
('125', 'ABSA AEROLINEAS BRASILERAS S.A', 'Extranjeras de Carga'),
('126', 'ABX AIR INC  SUCURSAL COLOMBIANA', 'Extranjeras de Carga'),
('127', 'AMERIJET INTERNATIONAL COLOMBIA', 'Extranjeras de Carga'),
('128', 'CARGOLUX AIRLINES INTERNATIONAL S.A. SUCURSAL COLOMBIA', 'Extranjeras de Carga'),
('129', 'CENTURION AIR CARGO COLOMBIA', 'Extranjeras de Carga'),
('13', 'FAL INGENIEROS S A S', 'Trabajos A?reos Especiales y Fotografia'),
('130', 'FEDERAL EXPRESS CORPORATION', 'Extranjeras de Carga'),
('131', 'FLORIDA WEST INTERNATIONAL AIRWAYS INC. SUCURSAL COLOM', 'Extranjeras de Carga'),
('132', 'MARTINAIR HOLLAND N.V.', 'Extranjeras de Carga'),
('133', 'MASAIR. AEROTRANSPORTES MAS DE CARGA SUCURSAL COL.', 'Extranjeras de Carga'),
('134', 'UNITED PARCEL SERVICE CO. SUCURSAL COLOMBIA', 'Extranjeras de Carga'),
('135', 'VENSECAR INTERNACIONAL C. A.  SUCURSAL COLOMBIA', 'Extranjeras de Carga'),
('136', 'ABC AEROLINEAS SA DE CV SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('137', 'AEROLINEAS ARGENTINAS', 'Extranjeras de Pasajeros'),
('138', 'AEROLINEAS GALAPAGOS S.A. AEROGAL SUCURSAL COLOMBIANA', 'Extranjeras de Pasajeros'),
('139', 'AEROVIAS DE MEXICO S. A. AEROMEXICO SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('14', 'ISATECH CORPORATION S A S', 'Trabajos A?reos Especiales y Fotografia'),
('140', 'AIR CANADA SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('141', 'AMERICAN AIR LINES', 'Extranjeras de Pasajeros'),
('142', 'COMPANIA NACIONAL CUBANA DE AVIACION.', 'Extranjeras de Pasajeros'),
('143', 'CONSORCIO VENEZOLANO DE INDUSTRIAS AERONAUTICAS Y SERV', 'Extranjeras de Pasajeros'),
('144', 'COPA COMPANIA PANAMENA DE AVIACION S.A.', 'Extranjeras de Pasajeros'),
('145', 'DELTA AIR LINES INC. SUCURSAL DE COLOMBIA', 'Extranjeras de Pasajeros'),
('146', 'DEUTSCHE LUFTHANSA AKTIENGESELLSCHAFT', 'Extranjeras de Pasajeros'),
('147', 'IBERIA LINEAS AEREAS DE ESPANA SOCIEDAD ANONIMA OPERAD', 'Extranjeras de Pasajeros'),
('148', 'INSEL AIR INTERNATIONAL B V SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('149', 'JETBLUE AIRWAYS CORPORATION-SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('15', 'QUIMBAYA EXPLORACION Y RECURSOS GEOMATICOS S.A.S. "QUE', 'Trabajos A?reos Especiales y Fotografia'),
('150', 'LACSA LINEAS AEREAS COSTARRICENSES S.A.', 'Extranjeras de Pasajeros'),
('151', 'LAN PERU S.A. SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('152', 'SOCIEDAD AIR FRANCE', 'Extranjeras de Pasajeros'),
('153', 'SPIRIT AIRLINES INC', 'Extranjeras de Pasajeros'),
('154', 'TACA INTERNATIONAL AIRLINES S A SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('155', 'TAME LINEA AEREA DEL ECUADOR', 'Extranjeras de Pasajeros'),
('156', 'TIARA AIR N.V. S.A.', 'Extranjeras de Pasajeros'),
('157', 'TRANS AMERICAN AIR LINES S.A. SUCURSAL COL.', 'Extranjeras de Pasajeros'),
('158', 'UNITED AIR LINES INC. SUCURSAL COLOMBIA', 'Extranjeras de Pasajeros'),
('16', 'AERO AGROPECUARIA DEL NORTE S.A.S. AEROPENORT', 'Aviaci?n Agricola'),
('17', 'AERO SANIDAD AGRICOLA S. A. S. "ASA S.A.S."', 'Aviaci?n Agricola'),
('18', 'AEROSERVICIOS MAJAGUAL LTDA "ASEM LTDA"', 'Aviaci?n Agricola'),
('19', 'AEROTEC LTDA. ASPERSIONES TECNICAS DEL CAMPO', 'Aviaci?n Agricola'),
('2', 'AMBULANCIAS AEREAS DE COLOMBIA S.A.S.', 'Ambulancias A?reas'),
('20', 'AGRICOLA DE SERVICIOS AEREOS DEL META "ASAM LTDA"', 'Aviaci?n Agricola'),
('21', 'AMA LTDA. AVIONES Y MAQUINARIAS AGRICOLAS', 'Aviaci?n Agricola'),
('22', 'ARFA S.A. ARROCEROS FUMIGADORES ASOCIADOS', 'Aviaci?n Agricola'),
('23', 'AVIAL LTDA." APLICACIONES AERO-AGRICOLAS', 'Aviaci?n Agricola'),
('24', 'AVIOCOL LTDA." FUMIGACION AEREA', 'Aviaci?n Agricola'),
('25', 'CELTA LTDA. COMPANIA ESPECIALIZADA EN TRABAJOS AEROAGR', 'Aviaci?n Agricola'),
('26', 'COALCESAR LTDA. COOP MULTIACTIVA  ALGODONERA DEL DEPTO', 'Aviaci?n Agricola'),
('27', 'COMERCIALIZADORA ECO LTDA.', 'Aviaci?n Agricola'),
('28', 'COMPA?IA AEROAGRICOLA GIRARDOT LTDA. "AGIL LTDA"', 'Aviaci?n Agricola'),
('29', 'COMPA?IA AEROFUMIGACIONES CALIMA S.A.S. "CALIMA S.A.S.', 'Aviaci?n Agricola'),
('3', 'AVIONES DEL CESAR S.A.S, -AVIOCESAR S.A.S.', 'Ambulancias A?reas'),
('30', 'COMPA??A COLOMBIANA DE AEROSERVICIOS CCA LTDA.', 'Aviaci?n Agricola'),
('31', 'ESTRA LTDA. ESPINAL TRABAJOS AEREOS', 'Aviaci?n Agricola'),
('32', 'FADELCE LTDA. FUMIGACIONES AEREAS DEL CESAR', 'Aviaci?n Agricola'),
('33', 'FAGA LTDA. FUMIGACIONES AEREAS GAVIOTAS CIA.', 'Aviaci?n Agricola'),
('34', 'FAGAN S. EN C." FUMIGACION AEREA LOS GAVANES', 'Aviaci?n Agricola'),
('35', 'FARI LTDA. FUMIGACIONES AEREAS DEL ARIARI', 'Aviaci?n Agricola'),
('36', 'FARO LTDA. FUMIGACION AEREA DEL ORIENTE', 'Aviaci?n Agricola'),
('37', 'FATOL LTDA. FUMIGACION AEREA DEL TOLIMA', 'Aviaci?n Agricola'),
('38', 'FUMIGACION AEREA Y SERVICIOS ESPECIALES SAS', 'Aviaci?n Agricola'),
('39', 'FUMIGACIONES AEREAS DE COLOMBIA S.A.S. "FARCA S.A.S."', 'Aviaci?n Agricola'),
('4', 'COLCHARTER LTDA.', 'Ambulancias A?reas'),
('40', 'FUMIGACIONES AEREAS DEL NORTE LIMITADA - FUMINORTE', 'Aviaci?n Agricola'),
('41', 'FUMIVALLE S. A.S FUMIGACIONES AEREAS VALLE S. A.S.', 'Aviaci?n Agricola'),
('42', 'FUMIVILLA LTDA. FUMIGACIONES AEREAS DE VILLANUEVA', 'Aviaci?n Agricola'),
('43', 'HELICE LTDA. FUMIGACION AEREA', 'Aviaci?n Agricola'),
('44', 'SAFUCO LTDA." SERVICIO AEREO DE FUMIGACION COLOMBIANA', 'Aviaci?n Agricola'),
('45', 'SAMA LTDA. SOCIEDAD AEROAGRICOLA DE MAGANGUE', 'Aviaci?n Agricola'),
('46', 'SANIDAD AEROAGRICOLA SANAR S.A.S.', 'Aviaci?n Agricola'),
('47', 'SANIDAD VEGETAL CRUZ VERDE S.A.S.', 'Aviaci?n Agricola'),
('48', 'SAO E.U. SERV AER ORIENTE EMP UNIPERSONAL', 'Aviaci?n Agricola'),
('49', 'SERVICIOS AEROAGRICOLAS DEL CASANARE  S.A.S. SAAC S.A.', 'Aviaci?n Agricola'),
('5', 'FUNDACION CARDIOVASCULAR DE COLOMBIA', 'Ambulancias A?reas'),
('50', 'SERVICIOS AEROAGRICOLAS DEL LLANO S.A.S \n SADELL S.A.S', 'Aviaci?n Agricola'),
('51', 'SERVICIOS AGRICOLAS FIBA S.A.,', 'Aviaci?n Agricola'),
('52', 'SERVICIOS DE FUMIGACION AEREA GARAY S.A.S  "FUMIGARAY ', 'Aviaci?n Agricola'),
('53', 'SFA LTDA. SERVICIO DE FUMIGACION AEREA DEL CASANARE', 'Aviaci?n Agricola'),
('54', 'TRABAJOS AEREOS ESPECIALES AVIACION AGRICOLA LTDA. "TA', 'Aviaci?n Agricola'),
('55', 'AEROSUCRE S.A.', 'Carga Nacional'),
('56', 'AIR COLOMBIA S.A.S.', 'Carga Nacional'),
('57', 'ALIANSA S.A. AEROLINEAS ANDINAS', 'Carga Nacional'),
('58', 'LINEA AEREA CARGUERA DE COLOMBIA S.A.   LAN CARGO COLO', 'Carga Nacional'),
('59', 'LINEAS AEREAS SURAMERICANAS S.A.', 'Carga Nacional'),
('6', 'GLOBAL SERVICE AVIATION LTDA. GSA LTDA.', 'Ambulancias A?reas'),
('60', 'SELVA LTDA". SERVICIO AEREO DEL VAUPES', 'Carga Nacional'),
('61', 'SOCIEDAD AEREA DEL CAQUETA EN COMANDITA POR ACCIONES "', 'Carga Nacional'),
('62', 'AEROLINEA DEL CARIBE S. A. "AER CARIBE S.A."', ' Especiales de Carga'),
('63', 'AEXPA S.A. AEROEXPRESO DEL PACIFICO', 'Comerciales Regionales '),
('64', 'REGION AIR- AEROLINEA REGIONAL DE COLOMBIA S.A. ANTES ', 'Comerciales Regionales '),
('65', 'SEARCA S.A. SERVICIO AEREO DE CAPURGANA', 'Comerciales Regionales '),
('66', 'TRANSPORTE AEREO DE COLOMBIA S.A.', 'Comerciales Regionales '),
('67', 'AEROLINEA DE ANTIOQUIA S.A', 'Nacionales Regulares de Pasajeros'),
('68', 'AEROREPUBLICA S.A.', 'Nacionales Regulares de Pasajeros'),
('69', 'AEROVIAS DEL CONTINENTE AMERICANO S.A. "AVIANCA S.A"', 'Nacionales Regulares de Pasajeros'),
('7', 'RIO SUR S. A.', 'Ambulancias A?reas'),
('70', 'AIRES S.A." AEROVIAS DE INTEGRACION REGIONAL S .A  Y/O', 'Nacionales Regulares de Pasajeros'),
('71', 'EMPRESA AEREA DE SERVICIOS Y FACILITACION LOGISTICA IN', 'Nacionales Regulares de Pasajeros'),
('72', 'FAST COLOMBIA SAS', 'Nacionales Regulares de Pasajeros'),
('73', 'SERVICIO AEREO A TERRITORIOS NACIONALES S.A. -SATENA-', 'Nacionales Regulares de Pasajeros'),
('74', 'AERO APOYO LTDA." TRANSPORTE AEREO DE APOYO PETROLERO', 'AEROTAXIS'),
('75', 'AERO TAXI GUAYMARAL ATG S.A.S.,', 'AEROTAXIS'),
('76', 'AEROCHARTER ANDINA S. A.S.', 'AEROTAXIS'),
('77', 'AEROEJECUTIVOS DE ANTIOQUIA S.A.', 'AEROTAXIS'),
('78', 'AEROESTAR LTDA', 'AEROTAXIS'),
('79', 'AEROEXPRESS S.A.S, ANTES S.A.', 'AEROTAXIS'),
('8', 'SERVICIO AEREO MEDICALIZADO Y FUNDAMENTAL S.A.S. MEDIC', 'Ambulancias A?reas'),
('80', 'AEROGALAN LTDA. LINEAS AEREAS GALAN', 'AEROTAXIS'),
('81', 'AEROLINEAS ALAS DE COLOMBIA LTDA.', 'AEROTAXIS'),
('82', 'AEROLINEAS DEL LLANO S.A.S.', 'AEROTAXIS'),
('83', 'AEROL?NEAS PETROLERAS S.A.S. "ALPES S.A.S."', 'AEROTAXIS'),
('84', 'AEROMENEGUA LTDA. TAXI AEREO DEL ALTO MENEGUA', 'AEROTAXIS'),
('85', 'AEROTAXI DEL ORIENTE COLOMBIANO "AEROCOL S.A.S"', 'AEROTAXIS'),
('86', 'AEROTAXI DEL UPIA S.A.S.  AERUPIA S.A.S.', 'AEROTAXIS'),
('87', 'AMERICA?S AIR SAS', 'AEROTAXIS'),
('88', 'ARALL LTDA. AEROLINEAS LLANERAS', 'AEROTAXIS'),
('89', 'ARO LTDA. AEROVIAS REGIONALES DEL ORIENTE', 'AEROTAXIS'),
('9', 'SERVICIOS AEREOS PANAMERICANOS LIMITADA "SARPA LTDA"', 'Ambulancias A?reas'),
('90', 'AVIOCHARTER LTDA.', 'AEROTAXIS'),
('91', 'AVIONES DEL CESAR S.A.S, -AVIOCESAR S.A.S.', 'AEROTAXIS'),
('92', 'CENTRAL CHARTER DE COLOMBIA S.A.', 'AEROTAXIS'),
('93', 'CHARTER DEL CARIBE S.A.S.', 'AEROTAXIS'),
('94', 'DELTA HELICOPTEROS  S.A.S.', 'AEROTAXIS'),
('95', 'HELI JET S.A.S.', 'AEROTAXIS'),
('96', 'HELICOL S A S  HELICOPTEROS NACIONALES DE COLOMBIA S.A', 'AEROTAXIS'),
('97', 'HELICOPTEROS TERRITORIALES DE COLOMBIA S.A.S. HELITEC', 'AEROTAXIS'),
('98', 'HELICOPTEROS Y AVIONES S.A.S. "HELIAV S.A.S."', 'AEROTAXIS'),
('99', 'HELIGOLFO S.A.S.', 'AEROTAXIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_vuelo`
--

CREATE TABLE IF NOT EXISTS `datos_vuelo` (
  `cod_vuelo` int(45) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `destino` varchar(45) NOT NULL,
  `fecha_origen` date NOT NULL,
  `hora_origen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_vuelo`
--

INSERT INTO `datos_vuelo` (`cod_vuelo`, `origen`, `destino`, `fecha_origen`, `hora_origen`) VALUES
(999994, '17', '25', '2015-10-09', '14:02'),
(999996, '1', '26', '2015-11-04', '08:00am'),
(999997, '11', '111', '2015-10-09', '14:02');

--
-- Disparadores `datos_vuelo`
--
DELIMITER //
CREATE TRIGGER `tr_generacion_tarjetas` AFTER UPDATE ON `datos_vuelo`
 FOR EACH ROW BEGIN
call pro_informe_vuelo(OLD.cod_vuelo, OLD.origen, OLD.destino, OLD.fecha_origen, OLD.hora_origen, NEW.origen, NEW.destino);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `cod_dpto` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`cod_dpto`, `nombre`) VALUES
('1', 'Amazonass'),
('10', 'Casanare'),
('11', 'Cauca'),
('111', 'Amazonas'),
('12', 'Cesar'),
('123', 'Caucacia'),
('13', 'Choco'),
('14', 'Cordoba'),
('15', 'Cundinamarca'),
('16', 'Guainia'),
('17', 'Guaviare'),
('18', 'Huila'),
('19', 'La Guajira'),
('2', 'Antioquia'),
('20', 'Magdalena'),
('21', 'Meta'),
('22', 'Nari'),
('23', 'Norte de Santander'),
('24', 'Putumayo'),
('25', 'Quindio'),
('26', 'Risaralda'),
('27', 'San Andres'),
('28', 'Santander'),
('29', 'Sucre'),
('3', 'Arauca'),
('30', 'Tolima'),
('31', 'Valle'),
('32', 'Vaupes'),
('33', 'Vichada'),
('4', 'Atlantico'),
('5', 'Bogot'),
('6', 'Bolivar'),
('7', 'Boyaca'),
('8', 'Caldas'),
('9', 'Caqueta'),
('999', 'Mi dpto'),
('9999', 'Choco2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_vuelo`
--

CREATE TABLE IF NOT EXISTS `informe_vuelo` (
  `cod_vuelo` int(45) NOT NULL,
  `origen` int(45) NOT NULL,
  `destino` int(45) NOT NULL,
  `fecha_origen` date NOT NULL,
  `hora_origen` int(45) NOT NULL,
  `modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe_vuelo`
--

INSERT INTO `informe_vuelo` (`cod_vuelo`, `origen`, `destino`, `fecha_origen`, `hora_origen`, `modificacion`) VALUES
(999994, 111, 25, '2015-10-09', 14, '2015-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe_vuelos`
--

CREATE TABLE IF NOT EXISTS `informe_vuelos` (
  `cod_vuelo` varchar(45) NOT NULL,
  `cod_avion` varchar(45) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `informe_vuelos`
--

INSERT INTO `informe_vuelos` (`cod_vuelo`, `cod_avion`, `valor`, `modificacion`) VALUES
('999994', '888882', '850000', '2015-11-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
  `cedula` int(45) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`cedula`, `nombres`, `apellidos`, `direccion`, `telefono`, `email`, `sexo`, `usuario`, `contrasena`) VALUES
(123, 'ana', 'lozano', 'cra', '987', 'ana@gmail.com', 'Femenino', '72019bbac0b3dac88beac9ddfef0ca808919104f', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(456, 'Juan', 'Muñoz', 'calle Juan', '456', 'juan@gmail.com', 'Masculino', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '9adcb29710e807607b683f62e555c22dc5659713'),
(123456, 'Pedro', 'Perez', 'cra', '320', 'pedro@gmail.com', 'Masculino', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
`cod_reserva` int(45) NOT NULL,
  `cedula` int(45) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `num_pasajeros` int(45) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=777779 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`cod_reserva`, `cedula`, `tipo`, `num_pasajeros`, `fecha`, `hora`) VALUES
(777777, 123, 'Ejecutivo', 6, '2015-11-04', '11:26am'),
(777778, 456, 'Ejecutivo', 6, '2015-11-04', '11:26am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_vuelos`
--

CREATE TABLE IF NOT EXISTS `reserva_vuelos` (
`cod_reserva` int(45) NOT NULL,
  `cod_vuelo` int(45) NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=777779 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva_vuelos`
--

INSERT INTO `reserva_vuelos` (`cod_reserva`, `cod_vuelo`, `valor`) VALUES
(777777, 999996, 999),
(777778, 999994, 999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ususariosadmin`
--

CREATE TABLE IF NOT EXISTS `ususariosadmin` (
  `cedula` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ususariosadmin`
--

INSERT INTO `ususariosadmin` (`cedula`, `usuario`, `pass`, `nombre`, `correo`, `rol`) VALUES
('123', '72019bbac0b3dac88beac9ddfef0ca808919104f', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Ana Lozano', 'ana@gmail.com', '2'),
('1234', '5b6583d6c1c24f39d6619de50bf8ae0ed066bed3', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Marcela Gonzalez', 'marcelagonzalez3511@gmail.com', '1'),
('123456', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Pedro', 'Perez', '2'),
('456', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '9adcb29710e807607b683f62e555c22dc5659713', 'Juan Muñoz', 'juan@gmail.com', '2');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_reservas`
--
CREATE TABLE IF NOT EXISTS `vista_reservas` (
`cod_reserva` int(45)
,`cedula` int(45)
,`nombres` varchar(45)
,`apellidos` varchar(45)
,`num_pasajeros` int(45)
,`origen` varchar(45)
,`destino` varchar(45)
,`valor` double
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_select_vuelos`
--
CREATE TABLE IF NOT EXISTS `vista_select_vuelos` (
`cod_vuelo` int(45)
,`tipo` varchar(45)
,`nombre` varchar(54)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_vuelos`
--
CREATE TABLE IF NOT EXISTS `vista_vuelos` (
`cod_vuelo` int(45)
,`nombre` varchar(54)
,`origen` varchar(45)
,`destino` varchar(45)
,`fecha_origen` date
,`hora_origen` varchar(45)
,`valor` float
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE IF NOT EXISTS `vuelos` (
`cod_vuelo` int(45) NOT NULL,
  `cod_avion` int(45) NOT NULL,
  `valor` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=999998 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`cod_vuelo`, `cod_avion`, `valor`) VALUES
(999994, 888883, 850000),
(999996, 888882, 8900),
(999997, 888883, 850000);

--
-- Disparadores `vuelos`
--
DELIMITER //
CREATE TRIGGER `trigger_informe_vuelos` AFTER UPDATE ON `vuelos`
 FOR EACH ROW BEGIN 
IF (NEW.cod_avion != OLD.cod_avion || NEW.valor != OLD.valor) THEN
  INSERT INTO informe_vuelos(
	  cod_vuelo, 
	  cod_avion, 
	  valor, 
	  modificacion) 
  VALUES (
	old.cod_vuelo, old.cod_avion, old.valor, now());
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_reservas`
--
DROP TABLE IF EXISTS `vista_reservas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_reservas` AS (select `r`.`cod_reserva` AS `cod_reserva`,`r`.`cedula` AS `cedula`,`p`.`nombres` AS `nombres`,`p`.`apellidos` AS `apellidos`,`r`.`num_pasajeros` AS `num_pasajeros`,`d`.`origen` AS `origen`,`d`.`destino` AS `destino`,`rv`.`valor` AS `valor` from (((`reserva` `r` join `pasajero` `p` on((`r`.`cedula` = `p`.`cedula`))) join `reserva_vuelos` `rv` on((`rv`.`cod_reserva` = `r`.`cod_reserva`))) join `datos_vuelo` `d` on((`rv`.`cod_vuelo` = `d`.`cod_vuelo`))));

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_select_vuelos`
--
DROP TABLE IF EXISTS `vista_select_vuelos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_select_vuelos` AS (select `v`.`cod_vuelo` AS `cod_vuelo`,`a`.`tipo` AS `tipo`,`c`.`nombre` AS `nombre` from ((`vuelos` `v` join `aviones` `a` on((`a`.`cod_avion` = `v`.`cod_avion`))) join `compañia` `c` on((`a`.`cod_compañia` = `c`.`cod_compañia`))));

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_vuelos`
--
DROP TABLE IF EXISTS `vista_vuelos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_vuelos` AS (select `v`.`cod_vuelo` AS `cod_vuelo`,`c`.`nombre` AS `nombre`,`dv`.`origen` AS `origen`,`dv`.`destino` AS `destino`,`dv`.`fecha_origen` AS `fecha_origen`,`dv`.`hora_origen` AS `hora_origen`,`v`.`valor` AS `valor` from (((`vuelos` `v` join `datos_vuelo` `dv` on((`v`.`cod_vuelo` = `dv`.`cod_vuelo`))) join `aviones` `a` on((`v`.`cod_avion` = `a`.`cod_avion`))) join `compañia` `c` on((`c`.`cod_compañia` = `a`.`cod_compañia`))));

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aeropuertos`
--
ALTER TABLE `aeropuertos`
 ADD PRIMARY KEY (`cod_aeropuerto`,`cod_ciudad`), ADD UNIQUE KEY `cod_aeropuerto` (`cod_aeropuerto`), ADD KEY `cod_ciudad` (`cod_ciudad`);

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
 ADD PRIMARY KEY (`cod_avion`,`cod_compañia`), ADD UNIQUE KEY `cod_avion_2` (`cod_avion`), ADD KEY `cod_compañia` (`cod_compañia`), ADD KEY `cod_avion` (`cod_avion`), ADD KEY `cod_avion_3` (`cod_avion`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
 ADD PRIMARY KEY (`cod_ciudad`,`cod_dept`), ADD UNIQUE KEY `cod_ciudad` (`cod_ciudad`), ADD KEY `cod_dept` (`cod_dept`);

--
-- Indices de la tabla `compañia`
--
ALTER TABLE `compañia`
 ADD PRIMARY KEY (`cod_compañia`);

--
-- Indices de la tabla `datos_vuelo`
--
ALTER TABLE `datos_vuelo`
 ADD PRIMARY KEY (`cod_vuelo`), ADD KEY `destino` (`destino`), ADD KEY `origen_3` (`origen`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`cod_dpto`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
 ADD PRIMARY KEY (`cedula`), ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
 ADD PRIMARY KEY (`cod_reserva`,`cedula`), ADD KEY `cod_pasajero` (`cedula`), ADD KEY `cod_reserva` (`cod_reserva`);

--
-- Indices de la tabla `reserva_vuelos`
--
ALTER TABLE `reserva_vuelos`
 ADD PRIMARY KEY (`cod_reserva`,`cod_vuelo`), ADD KEY `cod_vuelo` (`cod_vuelo`), ADD KEY `cod_reserva` (`cod_reserva`);

--
-- Indices de la tabla `ususariosadmin`
--
ALTER TABLE `ususariosadmin`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
 ADD PRIMARY KEY (`cod_vuelo`,`cod_avion`), ADD UNIQUE KEY `cod_vuelo_3` (`cod_vuelo`), ADD KEY `cod_avion` (`cod_avion`), ADD KEY `cod_avion_2` (`cod_avion`), ADD KEY `cod_vuelo` (`cod_vuelo`), ADD KEY `cod_avion_3` (`cod_avion`), ADD KEY `cod_vuelo_2` (`cod_vuelo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
MODIFY `cod_avion` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=888885;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
MODIFY `cod_reserva` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=777779;
--
-- AUTO_INCREMENT de la tabla `reserva_vuelos`
--
ALTER TABLE `reserva_vuelos`
MODIFY `cod_reserva` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=777779;
--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
MODIFY `cod_vuelo` int(45) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=999998;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aeropuertos`
--
ALTER TABLE `aeropuertos`
ADD CONSTRAINT `aeropuertos_ibfk_1` FOREIGN KEY (`cod_ciudad`) REFERENCES `ciudad` (`cod_ciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `aviones`
--
ALTER TABLE `aviones`
ADD CONSTRAINT `aviones_ibfk_1` FOREIGN KEY (`cod_compañia`) REFERENCES `compañia` (`cod_compañia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`cod_dept`) REFERENCES `departamento` (`cod_dpto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_vuelo`
--
ALTER TABLE `datos_vuelo`
ADD CONSTRAINT `datos_vuelo_ibfk_1` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelos` (`cod_vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `datos_vuelo_ibfk_2` FOREIGN KEY (`origen`) REFERENCES `aeropuertos` (`cod_aeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `datos_vuelo_ibfk_3` FOREIGN KEY (`destino`) REFERENCES `aeropuertos` (`cod_aeropuerto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `pasajero` (`cedula`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reserva_vuelos`
--
ALTER TABLE `reserva_vuelos`
ADD CONSTRAINT `reserva_vuelos_fk` FOREIGN KEY (`cod_reserva`) REFERENCES `reserva` (`cod_reserva`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `reserva_vuelos_ibfk_1` FOREIGN KEY (`cod_vuelo`) REFERENCES `vuelos` (`cod_vuelo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
ADD CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`cod_avion`) REFERENCES `aviones` (`cod_avion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

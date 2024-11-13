DROP DATABASE winnerslife;
CREATE DATABASE winnerslife;
USE winnerslife;



CREATE TABLE paises_life (
id_paises int(11) NOT NULL AUTO_INCREMENT,
iso_paises char(2) DEFAULT NULL,
nombre_paises varchar(80) DEFAULT NULL,

PRIMARY KEY (id_paises)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE permissions_life (
id_permissions INT NOT NULL AUTO_INCREMENT,
nombre_permissions VARCHAR(35),
tipo_permissions INT,
status_permissions VARCHAR(50),

PRIMARY KEY (id_permissions)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE category_life (
id_category INT NOT NULL AUTO_INCREMENT,
nombre_category VARCHAR(35),
status_category VARCHAR(50),

PRIMARY KEY (id_category)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE admins_life (
id_admins INT NOT NULL AUTO_INCREMENT,
nombre_admins VARCHAR(100),
apellido_admins VARCHAR(100),
ci_admins VARCHAR(30),
correo_admins VARCHAR(100),
password_admins VARCHAR(61),
status_admins VARCHAR(50),
id_paises INT,
id_permissions INT,


PRIMARY KEY (id_admins),
CONSTRAINT FOREIGN KEY (id_paises) REFERENCES paises_life (id_paises),
CONSTRAINT FOREIGN KEY (id_permissions) REFERENCES permissions_life (id_permissions),

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE video_life (
id_video INT NOT NULL AUTO_INCREMENT,
nombre_video VARCHAR(100),
description_video VARCHAR(300),
url_video VARCHAR(500),
status_video VARCHAR(50),



PRIMARY KEY (id_video)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE career_life (
id_career INT NOT NULL AUTO_INCREMENT,
nombre_career VARCHAR(100),
descripcion_career VARCHAR(300),
status_career VARCHAR(50),

PRIMARY KEY (id_career)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE courses_life (
id_courses INT NOT NULL AUTO_INCREMENT,
nombre_courses VARCHAR(100),
status_courses VARCHAR(50),
id_category INT,
id_video INT,
id_career INT,



PRIMARY KEY (id_courses),
CONSTRAINT FOREIGN KEY (id_category) REFERENCES category_life (id_category),
CONSTRAINT FOREIGN KEY (id_video) REFERENCES video_life (id_video),
CONSTRAINT FOREIGN KEY (id_career) REFERENCES career_life (id_career)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE students_life (
id_students INT NOT NULL AUTO_INCREMENT,
primernombre_students VARCHAR(100),
segundonombre_students VARCHAR(100),
primerapellido_students VARCHAR(100),
segundoapellido_students VARCHAR(100),
ci_students VARCHAR(30),
correo_student VARCHAR(100),
status_student VARCHAR(50),
id_paises INT,

PRIMARY KEY (id_students),
CONSTRAINT FOREIGN KEY (id_paises) REFERENCES paises_life (id_paises)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE users_life (
id_user INT NOT NULL AUTO_INCREMENT,
nombre_user VARCHAR(100),
apellido_user VARCHAR(100),
ci_user VARCHAR(30),
correo_user VARCHAR(100),
password_user VARCHAR(61),
status_user VARCHAR(50),
id_paises INT,
id_permissions INT,
id_courses INT,
id_students INT,

PRIMARY KEY (id_user),
CONSTRAINT FOREIGN KEY (id_paises) REFERENCES paises_life (id_paises),
CONSTRAINT FOREIGN KEY (id_permissions) REFERENCES permissions_life (id_permissions),
CONSTRAINT FOREIGN KEY (id_courses) REFERENCES courses_life (id_courses),
CONSTRAINT FOREIGN KEY (id_students) REFERENCES students_life (id_students)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE califications_life (
id_califications INT NOT NULL AUTO_INCREMENT,
nota_califications FLOAT(2),
promedio_califications FLOAT(2),
fecha_califications DATE,
status_califications VARCHAR(50),
id_courses INT,
id_user INT,

PRIMARY KEY (id_califications),
CONSTRAINT FOREIGN KEY (id_courses) REFERENCES courses_life (id_courses),
CONSTRAINT FOREIGN KEY (id_user) REFERENCES users_life (id_user)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE inscriptions_life (
    id_inscriptions INT NOT NULL AUTO_INCREMENT,
    fecha_inscriptions DATE,
    id_students INT,
    id_courses INT,
    
    
    PRIMARY KEY (id_inscriptions),
    CONSTRAINT FOREIGN KEY (id_students) REFERENCES students_life (id_students),
    CONSTRAINT FOREIGN KEY (id_courses) REFERENCES courses_life (id_courses)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE feedback_life (
    id_feedback INT NOT NULL AUTO_INCREMENT,
    coment TEXT,
    fecha_feedback DATE,
    id_courses INT,
    id_students INT,
    
    PRIMARY KEY (id_feedback),
    CONSTRAINT FOREIGN KEY (id_courses) REFERENCES courses_life (id_courses),
    CONSTRAINT FOREIGN KEY (id_students) REFERENCES students_life (id_students)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;





INSERT INTO `paises_life` VALUES(1, 'AF', 'Afganistán');
INSERT INTO `paises_life` VALUES(2, 'AX', 'Islas Gland');
INSERT INTO `paises_life` VALUES(3, 'AL', 'Albania');
INSERT INTO `paises_life` VALUES(4, 'DE', 'Alemania');
INSERT INTO `paises_life` VALUES(5, 'AD', 'Andorra');
INSERT INTO `paises_life` VALUES(6, 'AO', 'Angola');
INSERT INTO `paises_life` VALUES(7, 'AI', 'Anguilla');
INSERT INTO `paises_life` VALUES(8, 'AQ', 'Antártida');
INSERT INTO `paises_life` VALUES(9, 'AG', 'Antigua y Barbuda');
INSERT INTO `paises_life` VALUES(10, 'AN', 'Antillas Holandesas');
INSERT INTO `paises_life` VALUES(11, 'SA', 'Arabia Saudí');
INSERT INTO `paises_life` VALUES(12, 'DZ', 'Argelia');
INSERT INTO `paises_life` VALUES(13, 'AR', 'Argentina');
INSERT INTO `paises_life` VALUES(14, 'AM', 'Armenia');
INSERT INTO `paises_life` VALUES(15, 'AW', 'Aruba');
INSERT INTO `paises_life` VALUES(16, 'AU', 'Australia');
INSERT INTO `paises_life` VALUES(17, 'AT', 'Austria');
INSERT INTO `paises_life` VALUES(18, 'AZ', 'Azerbaiyán');
INSERT INTO `paises_life` VALUES(19, 'BS', 'Bahamas');
INSERT INTO `paises_life` VALUES(20, 'BH', 'Bahréin');
INSERT INTO `paises_life` VALUES(21, 'BD', 'Bangladesh');
INSERT INTO `paises_life` VALUES(22, 'BB', 'Barbados');
INSERT INTO `paises_life` VALUES(23, 'BY', 'Bielorrusia');
INSERT INTO `paises_life` VALUES(24, 'BE', 'Bélgica');
INSERT INTO `paises_life` VALUES(25, 'BZ', 'Belice');
INSERT INTO `paises_life` VALUES(26, 'BJ', 'Benin');
INSERT INTO `paises_life` VALUES(27, 'BM', 'Bermudas');
INSERT INTO `paises_life` VALUES(28, 'BT', 'Bhután');
INSERT INTO `paises_life` VALUES(29, 'BO', 'Bolivia');
INSERT INTO `paises_life` VALUES(30, 'BA', 'Bosnia y Herzegovina');
INSERT INTO `paises_life` VALUES(31, 'BW', 'Botsuana');
INSERT INTO `paises_life` VALUES(32, 'BV', 'Isla Bouvet');
INSERT INTO `paises_life` VALUES(33, 'BR', 'Brasil');
INSERT INTO `paises_life` VALUES(34, 'BN', 'Brunéi');
INSERT INTO `paises_life` VALUES(35, 'BG', 'Bulgaria');
INSERT INTO `paises_life` VALUES(36, 'BF', 'Burkina Faso');
INSERT INTO `paises_life` VALUES(37, 'BI', 'Burundi');
INSERT INTO `paises_life` VALUES(38, 'CV', 'Cabo Verde');
INSERT INTO `paises_life` VALUES(39, 'KY', 'Islas Caimán');
INSERT INTO `paises_life` VALUES(40, 'KH', 'Camboya');
INSERT INTO `paises_life` VALUES(41, 'CM', 'Camerún');
INSERT INTO `paises_life` VALUES(42, 'CA', 'Canadá');
INSERT INTO `paises_life` VALUES(43, 'CF', 'República Centroafricana');
INSERT INTO `paises_life` VALUES(44, 'TD', 'Chad');
INSERT INTO `paises_life` VALUES(45, 'CZ', 'República Checa');
INSERT INTO `paises_life` VALUES(46, 'CL', 'Chile');
INSERT INTO `paises_life` VALUES(47, 'CN', 'China');
INSERT INTO `paises_life` VALUES(48, 'CY', 'Chipre');
INSERT INTO `paises_life` VALUES(49, 'CX', 'Isla de Navidad');
INSERT INTO `paises_life` VALUES(50, 'VA', 'Ciudad del Vaticano');
INSERT INTO `paises_life` VALUES(51, 'CC', 'Islas Cocos');
INSERT INTO `paises_life` VALUES(52, 'CO', 'Colombia');
INSERT INTO `paises_life` VALUES(53, 'KM', 'Comoras');
INSERT INTO `paises_life` VALUES(54, 'CD', 'República Democrática del Congo');
INSERT INTO `paises_life` VALUES(55, 'CG', 'Congo');
INSERT INTO `paises_life` VALUES(56, 'CK', 'Islas Cook');
INSERT INTO `paises_life` VALUES(57, 'KP', 'Corea del Norte');
INSERT INTO `paises_life` VALUES(58, 'KR', 'Corea del Sur');
INSERT INTO `paises_life` VALUES(59, 'CI', 'Costa de Marfil');
INSERT INTO `paises_life` VALUES(60, 'CR', 'Costa Rica');
INSERT INTO `paises_life` VALUES(61, 'HR', 'Croacia');
INSERT INTO `paises_life` VALUES(62, 'CU', 'Cuba');
INSERT INTO `paises_life` VALUES(63, 'DK', 'Dinamarca');
INSERT INTO `paises_life` VALUES(64, 'DM', 'Dominica');
INSERT INTO `paises_life` VALUES(65, 'DO', 'República Dominicana');
INSERT INTO `paises_life` VALUES(66, 'EC', 'Ecuador');
INSERT INTO `paises_life` VALUES(67, 'EG', 'Egipto');
INSERT INTO `paises_life` VALUES(68, 'SV', 'El Salvador');
INSERT INTO `paises_life` VALUES(69, 'AE', 'Emiratos Árabes Unidos');
INSERT INTO `paises_life` VALUES(70, 'ER', 'Eritrea');
INSERT INTO `paises_life` VALUES(71, 'SK', 'Eslovaquia');
INSERT INTO `paises_life` VALUES(72, 'SI', 'Eslovenia');
INSERT INTO `paises_life` VALUES(73, 'ES', 'España');
INSERT INTO `paises_life` VALUES(74, 'UM', 'Islas ultramarinas de Estados Unidos');
INSERT INTO `paises_life` VALUES(75, 'US', 'Estados Unidos');
INSERT INTO `paises_life` VALUES(76, 'EE', 'Estonia');
INSERT INTO `paises_life` VALUES(77, 'ET', 'Etiopía');
INSERT INTO `paises_life` VALUES(78, 'FO', 'Islas Feroe');
INSERT INTO `paises_life` VALUES(79, 'PH', 'Filipinas');
INSERT INTO `paises_life` VALUES(80, 'FI', 'Finlandia');
INSERT INTO `paises_life` VALUES(81, 'FJ', 'Fiyi');
INSERT INTO `paises_life` VALUES(82, 'FR', 'Francia');
INSERT INTO `paises_life` VALUES(83, 'GA', 'Gabón');
INSERT INTO `paises_life` VALUES(84, 'GM', 'Gambia');
INSERT INTO `paises_life` VALUES(85, 'GE', 'Georgia');
INSERT INTO `paises_life` VALUES(86, 'GS', 'Islas Georgias del Sur y Sandwich del Sur');
INSERT INTO `paises_life` VALUES(87, 'GH', 'Ghana');
INSERT INTO `paises_life` VALUES(88, 'GI', 'Gibraltar');
INSERT INTO `paises_life` VALUES(89, 'GD', 'Granada');
INSERT INTO `paises_life` VALUES(90, 'GR', 'Grecia');
INSERT INTO `paises_life` VALUES(91, 'GL', 'Groenlandia');
INSERT INTO `paises_life` VALUES(92, 'GP', 'Guadalupe');
INSERT INTO `paises_life` VALUES(93, 'GU', 'Guam');
INSERT INTO `paises_life` VALUES(94, 'GT', 'Guatemala');
INSERT INTO `paises_life` VALUES(95, 'GF', 'Guayana Francesa');
INSERT INTO `paises_life` VALUES(96, 'GN', 'Guinea');
INSERT INTO `paises_life` VALUES(97, 'GQ', 'Guinea Ecuatorial');
INSERT INTO `paises_life` VALUES(98, 'GW', 'Guinea-Bissau');
INSERT INTO `paises_life` VALUES(99, 'GY', 'Guyana');
INSERT INTO `paises_life` VALUES(100, 'HT', 'Haití');
INSERT INTO `paises_life` VALUES(101, 'HM', 'Islas Heard y McDonald');
INSERT INTO `paises_life` VALUES(102, 'HN', 'Honduras');
INSERT INTO `paises_life` VALUES(103, 'HK', 'Hong Kong');
INSERT INTO `paises_life` VALUES(104, 'HU', 'Hungría');
INSERT INTO `paises_life` VALUES(105, 'IN', 'India');
INSERT INTO `paises_life` VALUES(106, 'ID', 'Indonesia');
INSERT INTO `paises_life` VALUES(107, 'IR', 'Irán');
INSERT INTO `paises_life` VALUES(108, 'IQ', 'Iraq');
INSERT INTO `paises_life` VALUES(109, 'IE', 'Irlanda');
INSERT INTO `paises_life` VALUES(110, 'IS', 'Islandia');
INSERT INTO `paises_life` VALUES(111, 'IL', 'Israel');
INSERT INTO `paises_life` VALUES(112, 'IT', 'Italia');
INSERT INTO `paises_life` VALUES(113, 'JM', 'Jamaica');
INSERT INTO `paises_life` VALUES(114, 'JP', 'Japón');
INSERT INTO `paises_life` VALUES(115, 'JO', 'Jordania');
INSERT INTO `paises_life` VALUES(116, 'KZ', 'Kazajstán');
INSERT INTO `paises_life` VALUES(117, 'KE', 'Kenia');
INSERT INTO `paises_life` VALUES(118, 'KG', 'Kirguistán');
INSERT INTO `paises_life` VALUES(119, 'KI', 'Kiribati');
INSERT INTO `paises_life` VALUES(120, 'KW', 'Kuwait');
INSERT INTO `paises_life` VALUES(121, 'LA', 'Laos');
INSERT INTO `paises_life` VALUES(122, 'LS', 'Lesotho');
INSERT INTO `paises_life` VALUES(123, 'LV', 'Letonia');
INSERT INTO `paises_life` VALUES(124, 'LB', 'Líbano');
INSERT INTO `paises_life` VALUES(125, 'LR', 'Liberia');
INSERT INTO `paises_life` VALUES(126, 'LY', 'Libia');
INSERT INTO `paises_life` VALUES(127, 'LI', 'Liechtenstein');
INSERT INTO `paises_life` VALUES(128, 'LT', 'Lituania');
INSERT INTO `paises_life` VALUES(129, 'LU', 'Luxemburgo');
INSERT INTO `paises_life` VALUES(130, 'MO', 'Macao');
INSERT INTO `paises_life` VALUES(131, 'MK', 'ARY Macedonia');
INSERT INTO `paises_life` VALUES(132, 'MG', 'Madagascar');
INSERT INTO `paises_life` VALUES(133, 'MY', 'Malasia');
INSERT INTO `paises_life` VALUES(134, 'MW', 'Malawi');
INSERT INTO `paises_life` VALUES(135, 'MV', 'Maldivas');
INSERT INTO `paises_life` VALUES(136, 'ML', 'Malí');
INSERT INTO `paises_life` VALUES(137, 'MT', 'Malta');
INSERT INTO `paises_life` VALUES(138, 'FK', 'Islas Malvinas');
INSERT INTO `paises_life` VALUES(139, 'MP', 'Islas Marianas del Norte');
INSERT INTO `paises_life` VALUES(140, 'MA', 'Marruecos');
INSERT INTO `paises_life` VALUES(141, 'MH', 'Islas Marshall');
INSERT INTO `paises_life` VALUES(142, 'MQ', 'Martinica');
INSERT INTO `paises_life` VALUES(143, 'MU', 'Mauricio');
INSERT INTO `paises_life` VALUES(144, 'MR', 'Mauritania');
INSERT INTO `paises_life` VALUES(145, 'YT', 'Mayotte');
INSERT INTO `paises_life` VALUES(146, 'MX', 'México');
INSERT INTO `paises_life` VALUES(147, 'FM', 'Micronesia');
INSERT INTO `paises_life` VALUES(148, 'MD', 'Moldavia');
INSERT INTO `paises_life` VALUES(149, 'MC', 'Mónaco');
INSERT INTO `paises_life` VALUES(150, 'MN', 'Mongolia');
INSERT INTO `paises_life` VALUES(151, 'MS', 'Montserrat');
INSERT INTO `paises_life` VALUES(152, 'MZ', 'Mozambique');
INSERT INTO `paises_life` VALUES(153, 'MM', 'Myanmar');
INSERT INTO `paises_life` VALUES(154, 'NA', 'Namibia');
INSERT INTO `paises_life` VALUES(155, 'NR', 'Nauru');
INSERT INTO `paises_life` VALUES(156, 'NP', 'Nepal');
INSERT INTO `paises_life` VALUES(157, 'NI', 'Nicaragua');
INSERT INTO `paises_life` VALUES(158, 'NE', 'Níger');
INSERT INTO `paises_life` VALUES(159, 'NG', 'Nigeria');
INSERT INTO `paises_life` VALUES(160, 'NU', 'Niue');
INSERT INTO `paises_life` VALUES(161, 'NF', 'Isla Norfolk');
INSERT INTO `paises_life` VALUES(162, 'NO', 'Noruega');
INSERT INTO `paises_life` VALUES(163, 'NC', 'Nueva Caledonia');
INSERT INTO `paises_life` VALUES(164, 'NZ', 'Nueva Zelanda');
INSERT INTO `paises_life` VALUES(165, 'OM', 'Omán');
INSERT INTO `paises_life` VALUES(166, 'NL', 'Países Bajos');
INSERT INTO `paises_life` VALUES(167, 'PK', 'Pakistán');
INSERT INTO `paises_life` VALUES(168, 'PW', 'Palau');
INSERT INTO `paises_life` VALUES(169, 'PS', 'Palestina');
INSERT INTO `paises_life` VALUES(170, 'PA', 'Panamá');
INSERT INTO `paises_life` VALUES(171, 'PG', 'Papúa Nueva Guinea');
INSERT INTO `paises_life` VALUES(172, 'PY', 'Paraguay');
INSERT INTO `paises_life` VALUES(173, 'PE', 'Perú');
INSERT INTO `paises_life` VALUES(174, 'PN', 'Islas Pitcairn');
INSERT INTO `paises_life` VALUES(175, 'PF', 'Polinesia Francesa');
INSERT INTO `paises_life` VALUES(176, 'PL', 'Polonia');
INSERT INTO `paises_life` VALUES(177, 'PT', 'Portugal');
INSERT INTO `paises_life` VALUES(178, 'PR', 'Puerto Rico');
INSERT INTO `paises_life` VALUES(179, 'QA', 'Qatar');
INSERT INTO `paises_life` VALUES(180, 'GB', 'Reino Unido');
INSERT INTO `paises_life` VALUES(181, 'RE', 'Reunión');
INSERT INTO `paises_life` VALUES(182, 'RW', 'Ruanda');
INSERT INTO `paises_life` VALUES(183, 'RO', 'Rumania');
INSERT INTO `paises_life` VALUES(184, 'RU', 'Rusia');
INSERT INTO `paises_life` VALUES(185, 'EH', 'Sahara Occidental');
INSERT INTO `paises_life` VALUES(186, 'SB', 'Islas Salomón');
INSERT INTO `paises_life` VALUES(187, 'WS', 'Samoa');
INSERT INTO `paises_life` VALUES(188, 'AS', 'Samoa Americana');
INSERT INTO `paises_life` VALUES(189, 'KN', 'San Cristóbal y Nevis');
INSERT INTO `paises_life` VALUES(190, 'SM', 'San Marino');
INSERT INTO `paises_life` VALUES(191, 'PM', 'San Pedro y Miquelón');
INSERT INTO `paises_life` VALUES(192, 'VC', 'San Vicente y las Granadinas');
INSERT INTO `paises_life` VALUES(193, 'SH', 'Santa Helena');
INSERT INTO `paises_life` VALUES(194, 'LC', 'Santa Lucía');
INSERT INTO `paises_life` VALUES(195, 'ST', 'Santo Tomé y Príncipe');
INSERT INTO `paises_life` VALUES(196, 'SN', 'Senegal');
INSERT INTO `paises_life` VALUES(197, 'CS', 'Serbia y Montenegro');
INSERT INTO `paises_life` VALUES(198, 'SC', 'Seychelles');
INSERT INTO `paises_life` VALUES(199, 'SL', 'Sierra Leona');
INSERT INTO `paises_life` VALUES(200, 'SG', 'Singapur');
INSERT INTO `paises_life` VALUES(201, 'SY', 'Siria');
INSERT INTO `paises_life` VALUES(202, 'SO', 'Somalia');
INSERT INTO `paises_life` VALUES(203, 'LK', 'Sri Lanka');
INSERT INTO `paises_life` VALUES(204, 'SZ', 'Suazilandia');
INSERT INTO `paises_life` VALUES(205, 'ZA', 'Sudáfrica');
INSERT INTO `paises_life` VALUES(206, 'SD', 'Sudán');
INSERT INTO `paises_life` VALUES(207, 'SE', 'Suecia');
INSERT INTO `paises_life` VALUES(208, 'CH', 'Suiza');
INSERT INTO `paises_life` VALUES(209, 'SR', 'Surinam');
INSERT INTO `paises_life` VALUES(210, 'SJ', 'Svalbard y Jan Mayen');
INSERT INTO `paises_life` VALUES(211, 'TH', 'Tailandia');
INSERT INTO `paises_life` VALUES(212, 'TW', 'Taiwán');
INSERT INTO `paises_life` VALUES(213, 'TZ', 'Tanzania');
INSERT INTO `paises_life` VALUES(214, 'TJ', 'Tayikistán');
INSERT INTO `paises_life` VALUES(215, 'IO', 'Territorio Británico del Océano Índico');
INSERT INTO `paises_life` VALUES(216, 'TF', 'Territorios Australes Franceses');
INSERT INTO `paises_life` VALUES(217, 'TL', 'Timor Oriental');
INSERT INTO `paises_life` VALUES(218, 'TG', 'Togo');
INSERT INTO `paises_life` VALUES(219, 'TK', 'Tokelau');
INSERT INTO `paises_life` VALUES(220, 'TO', 'Tonga');
INSERT INTO `paises_life` VALUES(221, 'TT', 'Trinidad y Tobago');
INSERT INTO `paises_life` VALUES(222, 'TN', 'Túnez');
INSERT INTO `paises_life` VALUES(223, 'TC', 'Islas Turcas y Caicos');
INSERT INTO `paises_life` VALUES(224, 'TM', 'Turkmenistán');
INSERT INTO `paises_life` VALUES(225, 'TR', 'Turquía');
INSERT INTO `paises_life` VALUES(226, 'TV', 'Tuvalu');
INSERT INTO `paises_life` VALUES(227, 'UA', 'Ucrania');
INSERT INTO `paises_life` VALUES(228, 'UG', 'Uganda');
INSERT INTO `paises_life` VALUES(229, 'UY', 'Uruguay');
INSERT INTO `paises_life` VALUES(230, 'UZ', 'Uzbekistán');
INSERT INTO `paises_life` VALUES(231, 'VU', 'Vanuatu');
INSERT INTO `paises_life` VALUES(232, 'VE', 'Venezuela');
INSERT INTO `paises_life` VALUES(233, 'VN', 'Vietnam');
INSERT INTO `paises_life` VALUES(234, 'VG', 'Islas Vírgenes Británicas');
INSERT INTO `paises_life` VALUES(235, 'VI', 'Islas Vírgenes de los Estados Unidos');
INSERT INTO `paises_life` VALUES(236, 'WF', 'Wallis y Futuna');
INSERT INTO `paises_life` VALUES(237, 'YE', 'Yemen');
INSERT INTO `paises_life` VALUES(238, 'DJ', 'Yibuti');
INSERT INTO `paises_life` VALUES(239, 'ZM', 'Zambia');
INSERT INTO `paises_life` VALUES(240, 'ZW', 'Zimbabue');
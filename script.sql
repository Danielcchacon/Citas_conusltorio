
DROP DATABASE IF EXISTS consultorio;
CREATE DATABASE IF NOT EXISTS consultorio;

USE consultorio;

CREATE TABLE tipo_usuario (
    tipo_usuario_id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_tipo_usuario VARCHAR(200) NOT NULL
);


CREATE TABLE `usuario` (
  `usuario_id` int NOT NULL AUTO_INCREMENT,
  `nombres_usuario` varchar(150) DEFAULT NULL,
  `apellidos_usuario` varchar(150) DEFAULT NULL,
  `contraseña_usuario` varchar(200) DEFAULT NULL,
  `documento_usuario` varchar(15) DEFAULT NULL,
  `correo_usuario` varchar(200) DEFAULT NULL,
  `telefono_usuario` varchar(15) DEFAULT NULL,
  `tipo_usuario` int NOT NULL,
  `estado_usuario` varchar(20) DEFAULT NULL,
  `fecha_usuario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuario_id`)
);
CREATE TABLE eps (
    eps_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_eps VARCHAR(80) NOT NULL,
    nit_eps VARCHAR(60) NOT NULL,
    telefono_eps VARCHAR(15),
    direccion_eps VARCHAR(50),
    fecha_registro TIMESTAMP,
    estado_eps VARCHAR(20)
);

CREATE TABLE tipo_regimen (
    tipo_regimen_id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_tipo_regimen VARCHAR(200) NOT NULL
);

CREATE TABLE paciente (
    paciente_id INT AUTO_INCREMENT PRIMARY KEY,
    nombres_paciente VARCHAR(150),
    apellidos_paciente VARCHAR(150),
    documento_paciente VARCHAR(15) NOT NULL,
    correo_paciente VARCHAR(200) NOT NULL,
    telefono_paciente VARCHAR(15),
    fecha_nacimiento_paciente TIMESTAMP,
    tipo_paciente INT NOT NULL,
    eps_paciente INT NOT NULL,
    fecha_registro_paciente TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tipo_medico (
    tipo_medico_id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_tipo_medico VARCHAR(200) NOT NULL
);

CREATE TABLE medico (
    medico_id INT AUTO_INCREMENT PRIMARY KEY,
    nombres_medico VARCHAR(150),
    apellidos_medico VARCHAR(150),
    documento_medico VARCHAR(15) NOT NULL,
    correo_medico VARCHAR(200) NOT NULL,
    telefono_medico VARCHAR(15),
    tipo_medico INT NOT NULL,
    estado_medico VARCHAR(20) NOT NULL,
    fecha_registro_medico TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tipo_consulta (
    tipo_consulta_id INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_tipo_consulta VARCHAR(200) NOT NULL
);

CREATE TABLE consulta (
    consulta_id INT AUTO_INCREMENT PRIMARY KEY,
    paciente_id INT NOT NULL,
    tipo_consulta_id INT NOT NULL,
    medico_id INT NOT NULL,
    fecha_consulta TIMESTAMP,
    antecedentes_medicos VARCHAR(255),
    examen_fisico VARCHAR(255),
    diagnostico VARCHAR(255),
    tratamiento_medico VARCHAR(255),
    evolucion_paciente VARCHAR(255)
);

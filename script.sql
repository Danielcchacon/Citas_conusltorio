-- Establecer la codificación de la conexión
SET NAMES 'utf8mb4';
SET CHARACTER SET utf8mb4;

-- Eliminar la base de datos si existe
DROP DATABASE IF EXISTS consultorio;

-- Crear la base de datos con la codificación UTF-8
CREATE DATABASE consultorio
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

-- Usar la base de datos recién creada
USE consultorio;

-- Crear las tablas
CREATE TABLE tipo_usuario (
                              tipo_usuario_id INT AUTO_INCREMENT PRIMARY KEY,
                              descripcion_tipo_usuario VARCHAR(200) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE usuario (
                         usuario_id INT AUTO_INCREMENT PRIMARY KEY,
                         nombres_usuario VARCHAR(150) DEFAULT NULL,
                         apellidos_usuario VARCHAR(150) DEFAULT NULL,
                         contrasena_usuario VARCHAR(200) DEFAULT NULL,
                         documento_usuario VARCHAR(15) DEFAULT NULL,
                         correo_usuario VARCHAR(200) DEFAULT NULL,
                         telefono_usuario VARCHAR(15) DEFAULT NULL,
                         tipo_usuario INT NOT NULL,
                         estado_usuario VARCHAR(20) DEFAULT NULL,
                         fecha_usuario TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE eps (
                     eps_id INT AUTO_INCREMENT PRIMARY KEY,
                     nombre_eps VARCHAR(80) NOT NULL,
                     nit_eps VARCHAR(60) NOT NULL,
                     telefono_eps VARCHAR(15),
                     direccion_eps VARCHAR(50),
                     fecha_registro TIMESTAMP,
                     estado_eps VARCHAR(20)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE tipo_regimen (
                              tipo_regimen_id INT AUTO_INCREMENT PRIMARY KEY,
                              descripcion_tipo_regimen VARCHAR(200) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

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
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE tipo_medico (
                             tipo_medico_id INT AUTO_INCREMENT PRIMARY KEY,
                             descripcion_tipo_medico VARCHAR(200) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

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
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE TABLE tipo_consulta (
                               tipo_consulta_id INT AUTO_INCREMENT PRIMARY KEY,
                               descripcion_tipo_consulta VARCHAR(200) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

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
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

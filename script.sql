DROP SCHEMA IF EXISTS consultorio CASCADE;
CREATE SCHEMA consultorio;

-- Crear tabla "tipo_usuario"
CREATE TABLE consultorio.tipo_usuario
(
    tipo_usuario_id          SERIAL,
    descripcion_tipo_usuario VARCHAR(200)

);

-- Crear tabla "usuario"
CREATE TABLE consultorio.usuario
(
    usuario_id        SERIAL,
    nombres_usuario   VARCHAR(150),
    apellidos_usuario VARCHAR(150),
    documento_uduario VARCHAR(15),
    correo_usuario    VARCHAR(200),
    telefono_usuario  VARCHAR(15),
    tipo_usuario      INT,
    estado_usuario    VARCHAR(20),
    fecha_usuario     TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
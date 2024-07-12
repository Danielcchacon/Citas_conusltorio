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

--Crear tabla "Eps"
CREATE TABLE consultorio.eps
(
    eps_id         SERIAL,
    nombre_eps     VARCHAR(80),
    nit_eps        VARCHAR(60),
    telefono_eps   VARCHAR(15),
    direccion_eps  VARCHAR(50),
    fecha_registro TIMESTAMP,
    estado_eps     VARCHAR(20)
);

-- Crear tabla "tipo_regimen"
CREATE TABLE consultorio.tipo_regimen
(
    tipo_regimen_id          SERIAL,
    descripcion_tipo_regimen VARCHAR(200)

);

-- Crear tabla "usuario"
CREATE TABLE consultorio.paciente
(
    paciente_id               SERIAL,
    nombres_paciente          VARCHAR(150),
    apellidos_paciente        VARCHAR(150),
    documento_paciente        VARCHAR(15),
    correo_paciente           VARCHAR(200),
    telefono_paciente         VARCHAR(15),
    fecha_nacimiento_paciente TIMESTAMP,
    tipo_paciente             INT,
    eps_paciente              INT,
    fecha_registro_paciente   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla "tipo_medico"
CREATE TABLE consultorio.tipo_medico
(
    tipo_medico_id          SERIAL,
    descripcion_tipo_medico VARCHAR(200)
);

-- Crear tabla "medico"
CREATE TABLE consultorio.medico
(
    medico_id             SERIAL,
    nombres_medico        VARCHAR(150),
    apellidos_medico      VARCHAR(150),
    documento_medico      VARCHAR(15),
    correo_medico         VARCHAR(200),
    telefono_medico       VARCHAR(15),
    tipo_medico           INT,
    estado_medico         VARCHAR(20),
    fecha_registro_medico TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Crear tabla "tipo_consulta"
CREATE TABLE consultorio.tipo_consulta
(
    tipo_consulta_id          SERIAL,
    descripcion_tipo_consulta VARCHAR(200)
);

-- Crear tabla "medico"
CREATE TABLE consultorio.consulta
(
    consulta_id          SERIAL,
    paciente_id          INT,
    tipo_consulta_id     INT,
    medico_id            INT,
    fecha_consulta       TIMESTAMP,
    atencedentes_medicos VARCHAR(255),
    examen_fisico        VARCHAR(255),
    diagnostico          VARCHAR(255),
    tratamiento_medico   VARCHAR(255),
    evolucion_paciente   VARCHAR(255)

);
-- Usar la base de datos
USE consultorio;

-- Agregar constraint de clave foránea a la tabla "usuario" referenciando a la tabla "tipo_usuario"
ALTER TABLE usuario
    ADD CONSTRAINT fk_tipo_usuario
        FOREIGN KEY (tipo_usuario) REFERENCES tipo_usuario(tipo_usuario_id);

-- Agregar constraint de clave foránea a la tabla "paciente" referenciando a las tablas "tipo_regimen" y "eps"
ALTER TABLE paciente
    ADD CONSTRAINT fk_tipo_paciente
        FOREIGN KEY (tipo_paciente) REFERENCES tipo_regimen(tipo_regimen_id),
    ADD CONSTRAINT fk_eps
        FOREIGN KEY (eps_paciente) REFERENCES eps(eps_id);

-- Agregar constraint de clave foránea a la tabla "medico" referenciando a la tabla "tipo_medico"
ALTER TABLE medico
    ADD CONSTRAINT fk_tipo_medico
        FOREIGN KEY (tipo_medico) REFERENCES tipo_medico(tipo_medico_id);

-- Agregar constraint de clave foránea a la tabla "consulta" referenciando a las tablas "paciente", "tipo_consulta" y "medico"
ALTER TABLE consulta
    ADD CONSTRAINT fk_paciente
        FOREIGN KEY (paciente_id) REFERENCES paciente(paciente_id),
    ADD CONSTRAINT fk_tipo_consulta
        FOREIGN KEY (tipo_consulta_id) REFERENCES tipo_consulta(tipo_consulta_id),
    ADD CONSTRAINT fk_medico
        FOREIGN KEY (medico_id) REFERENCES medico(medico_id);

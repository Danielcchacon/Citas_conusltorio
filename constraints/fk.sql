-- Agregar constraint de clave foránea a la tabla "usuario" referenciando a la tabla "tipo_usuario"
ALTER TABLE consultorio.usuario
    ADD CONSTRAINT fk_tipo_usuario
        FOREIGN KEY (tipo_usuario) REFERENCES consultorio.tipo_usuario (tipo_usuario_id);

-- Agregar constraint de clave foránea a la tabla "paciente" referenciando a las tablas "tipo_regimen y eps"
ALTER TABLE consultorio.paciente
    ADD CONSTRAINT fk_tipo_pasiente
        FOREIGN KEY (tipo_paciente) REFERENCES consultorio.tipo_regimen (tipo_regimen_id),
    ADD CONSTRAINT fk_eps
        FOREIGN KEY (eps_paciente) REFERENCES consultorio.eps (eps_id);

-- Agregar constraint de clave foránea a la tabla "medico" referenciando a la tabla "tipo_medico"
ALTER TABLE consultorio.medico
    ADD CONSTRAINT fk_tipo_medico
        FOREIGN KEY (tipo_medico) REFERENCES consultorio.tipo_medico (tipo_medico_id);

-- Agregar constraint de clave foránea a la tabla "paciente" referenciando a las tablas "tipo_regimen y eps"
ALTER TABLE consultorio.consulta
    ADD CONSTRAINT fk_paciente
        FOREIGN KEY (paciente_id) REFERENCES consultorio.paciente (paciente_id),
    ADD CONSTRAINT fk_tipo_conuslta
        FOREIGN KEY (tipo_consulta_id) REFERENCES consultorio.tipo_consulta (tipo_consulta_id),
    ADD CONSTRAINT fk_medico
        FOREIGN KEY (medico_id) REFERENCES consultorio.medico (medico_id);
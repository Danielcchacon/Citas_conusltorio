
ALTER TABLE usuario
    ADD CONSTRAINT unique_documento_usuario UNIQUE (documento_usuario),
    ADD CONSTRAINT unique_correo_usuario UNIQUE (correo_usuario);

ALTER TABLE eps
    ADD CONSTRAINT unique_nombre_eps UNIQUE (nombre_eps),
    ADD CONSTRAINT unique_nit_eps UNIQUE (nit_eps);

ALTER TABLE paciente
    ADD CONSTRAINT unique_documento_paciente UNIQUE (documento_paciente),
    ADD CONSTRAINT unique_correo_paciente UNIQUE (correo_paciente);

ALTER TABLE medico
    ADD CONSTRAINT unique_documento_medico UNIQUE (documento_medico),
    ADD CONSTRAINT unique_correo_medico UNIQUE (correo_medico);

-- Agregar constraint de clave primaria a la tabla "tipo_usuario"
ALTER TABLE consultorio.tipo_usuario
    ADD PRIMARY KEY (tipo_usuario_id);

-- Agregar constraint de clave primaria a la tabla "usuario"
ALTER TABLE consultorio.usuario
    ADD PRIMARY KEY (usuario_id);

-- Agregar constraint de clave primaria a la tabla "eps"
ALTER TABLE consultorio.eps
    ADD PRIMARY KEY (eps_id);

-- Agregar constraint de clave primaria a la tabla "tipo_regimen"
ALTER TABLE consultorio.tipo_regimen
    ADD PRIMARY KEY (tipo_regimen_id);

-- Agregar constraint de clave primaria a la tabla "paciente"
ALTER TABLE consultorio.paciente
    ADD PRIMARY KEY (paciente_id);

-- Agregar constraint de clave primaria a la tabla "tipo_medico"
ALTER TABLE consultorio.tipo_medico
    ADD PRIMARY KEY (tipo_medico_id);

-- Agregar constraint de clave primaria a la tabla "medico"
ALTER TABLE consultorio.medico
    ADD PRIMARY KEY (medico_id);

-- Agregar constraint de clave primaria a la tabla "tipo_consulta"
ALTER TABLE consultorio.tipo_consulta
    ADD PRIMARY KEY (tipo_consulta_id);

-- Agregar constraint de clave primaria a la tabla "consulta"
ALTER TABLE consultorio.consulta
    ADD PRIMARY KEY (consulta_id);
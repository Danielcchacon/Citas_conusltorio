DELIMITER //

CREATE FUNCTION agregar_consulta(
    p_paciente_id INT,
    p_tipo_consulta_id INT,
    p_medico_id INT,
    p_fecha_consulta TIMESTAMP,
    p_antecedentes_medicos VARCHAR(255),
    p_examen_fisico VARCHAR(255),
    p_diagnostico VARCHAR(255),
    p_tratamiento_medico VARCHAR(255),
    p_evolucion_paciente VARCHAR(255)
)
    RETURNS VARCHAR(255)
BEGIN
    -- Validar que los campos obligatorios no sean nulos o vacíos
    IF p_paciente_id IS NULL OR p_tipo_consulta_id IS NULL OR p_medico_id IS NULL OR p_fecha_consulta IS NULL THEN
        RETURN 'Error: Campos obligatorios no pueden ser nulos.';
    END IF;

    -- Validar la existencia del paciente_id
    IF NOT EXISTS (SELECT 1 FROM paciente WHERE paciente_id = p_paciente_id) THEN
        RETURN 'Error: paciente_id no existe.';
    END IF;

    -- Validar la existencia del tipo_consulta_id
    IF NOT EXISTS (SELECT 1 FROM tipo_consulta WHERE tipo_consulta_id = p_tipo_consulta_id) THEN
        RETURN 'Error: tipo_consulta_id no existe.';
    END IF;

    -- Validar la existencia del medico_id
    IF NOT EXISTS (SELECT 1 FROM medico WHERE medico_id = p_medico_id) THEN
        RETURN 'Error: medico_id no existe.';
    END IF;

    -- Insertar la nueva consulta en la tabla consulta
    INSERT INTO consulta (paciente_id,
                          tipo_consulta_id,
                          medico_id,
                          fecha_consulta,
                          antecedentes_medicos,
                          examen_fisico,
                          diagnostico,
                          tratamiento_medico,
                          evolucion_paciente)
    VALUES (p_paciente_id,
            p_tipo_consulta_id,
            p_medico_id,
            p_fecha_consulta,
            p_antecedentes_medicos,
            p_examen_fisico,
            p_diagnostico,
            p_tratamiento_medico,
            p_evolucion_paciente);

    RETURN 'Consulta agregada exitosamente.';
END //


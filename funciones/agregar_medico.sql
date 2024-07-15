DELIMITER //

CREATE FUNCTION agregarMedico(
    p_nombres_medico VARCHAR(150),
    p_apellidos_medico VARCHAR(150),
    p_documento_medico VARCHAR(15),
    p_correo_medico VARCHAR(200),
    p_telefono_medico VARCHAR(15),
    p_tipo_medico INT,
    p_estado_medico VARCHAR(20)
)
    RETURNS VARCHAR(200)
BEGIN
    DECLARE medico_id INT;
        DECLARE mensaje_error VARCHAR(200);

        -- Handler para excepciones
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        SET mensaje_error = 'Error al agregar el médico. Verifique los datos ingresados.';
    END;

    -- Validar que no haya campos nulos o vacíos
    IF p_nombres_medico IS NULL OR p_nombres_medico = '' OR
       p_apellidos_medico IS NULL OR p_apellidos_medico = '' OR
       p_documento_medico IS NULL OR p_documento_medico = '' OR
       p_correo_medico IS NULL OR p_correo_medico = '' OR
       p_telefono_medico  IS NULL OR p_telefono_medico  = '' OR
       p_tipo_medico IS NULL OR
       p_estado_medico IS NULL OR p_estado_medico = '' THEN
        RETURN 'Nombres, apellidos, documento, correo, tipo de médico y estado no pueden ser nulos ni estar vacíos';
    END IF;

    -- Verificar que el tipo de médico exista en la tabla tipo_medico
    IF NOT EXISTS (SELECT 1 FROM tipo_medico WHERE tipo_medico_id = p_tipo_medico) THEN
        RETURN 'El tipo de médico no existe';
    END IF;

    -- Insertar el nuevo médico
    INSERT INTO medico (nombres_medico, apellidos_medico, documento_medico,
                        correo_medico, telefono_medico, tipo_medico, estado_medico, fecha_registro_medico)
    VALUES (p_nombres_medico, p_apellidos_medico, p_documento_medico, p_correo_medico,
            p_telefono_medico, p_tipo_medico, p_estado_medico, CURRENT_TIMESTAMP);

    -- Obtener el ID del nuevo médico insertado
    SET medico_id = LAST_INSERT_ID();

    -- Retornar mensaje de éxito
    RETURN CONCAT('Médico agregado con ID: ', medico_id);
END //

DELIMITER ;
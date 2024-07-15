DELIMITER //

CREATE FUNCTION agregarPaciente(
    p_nombres_paciente VARCHAR(150),
    p_apellidos_paciente VARCHAR(150),
    p_documento_paciente VARCHAR(15),
    p_correo_paciente VARCHAR(200),
    p_telefono_paciente VARCHAR(15),
    p_fecha_nacimiento_paciente TIMESTAMP,
    p_tipo_paciente INT,
    p_eps_paciente INT
)
    RETURNS VARCHAR(200)
BEGIN
    DECLARE paciente_id INT;
        DECLARE mensaje_error VARCHAR(200);

        -- Handler para excepciones
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        SET mensaje_error = 'Error al agregar el paciente. Verifique los datos ingresados.';
    END;

    -- Validar que no haya campos nulos o vacíos
    IF p_nombres_paciente IS NULL OR p_nombres_paciente = '' OR
       p_apellidos_paciente IS NULL OR p_apellidos_paciente = '' OR
       p_documento_paciente IS NULL OR p_documento_paciente = '' OR
       p_correo_paciente IS NULL OR p_correo_paciente = '' OR
       p_telefono_paciente IS NULL OR p_telefono_paciente = '' OR
       p_fecha_nacimiento_paciente IS NULL OR p_fecha_nacimiento_paciente = '' OR
       p_tipo_paciente IS NULL OR
       p_eps_paciente IS NULL THEN
        RETURN 'Ningun campo puede in nulo o vacio. Son necesarios para el proceso';
    END IF;

    -- Verificar que el tipo de paciente exista en la tabla tipo_paciente
    IF NOT EXISTS (SELECT 1 FROM tipo_regimen WHERE tipo_regimen_id = p_tipo_paciente) THEN
        RETURN 'El regimen del paciente no existe';
    END IF;

    -- Verificar que la EPS exista en la tabla eps
    IF NOT EXISTS (SELECT 1 FROM eps WHERE eps_id = p_eps_paciente) THEN
        RETURN 'La EPS no existe';
    END IF;

    -- Insertar el nuevo paciente
    INSERT INTO paciente (nombres_paciente, apellidos_paciente, documento_paciente,
                          correo_paciente, telefono_paciente, fecha_nacimiento_paciente,
                          tipo_paciente, eps_paciente, fecha_registro_paciente)
    VALUES (p_nombres_paciente, p_apellidos_paciente, p_documento_paciente, p_correo_paciente,
            p_telefono_paciente, p_fecha_nacimiento_paciente, p_tipo_paciente, p_eps_paciente, CURRENT_TIMESTAMP);

    -- Obtener el ID del nuevo paciente insertado
    SET paciente_id = LAST_INSERT_ID();

    -- Retornar mensaje de éxito
    RETURN CONCAT('Paciente agregado con ID: ', paciente_id);
END //

DELIMITER ;

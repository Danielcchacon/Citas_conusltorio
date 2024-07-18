DELIMITER //

CREATE FUNCTION agregarUsuario(
    p_nombres VARCHAR(150),
    p_apellidos VARCHAR(150),
    p_contrasena VARCHAR(200),
    p_documento VARCHAR(15),
    p_correo VARCHAR(200),
    p_telefono VARCHAR(15),
    p_tipo_usuario INT,
    p_estado VARCHAR(20)
) RETURNS VARCHAR(200)
BEGIN
    DECLARE usuario_id INT;
    DECLARE mensaje_error VARCHAR(200);
    DECLARE resultado VARCHAR(200);

    -- Validar que no haya campos nulos
    IF p_nombres IS NULL OR p_apellidos IS NULL OR p_contrasena IS NULL
        OR p_documento IS NULL OR p_correo IS NULL OR p_telefono IS NULL
        OR p_tipo_usuario IS NULL OR p_estado IS NULL THEN
        RETURN 'Ningún campo puede ser nulo';
    END IF;

    -- Verificar que el tipo de usuario exista en la tabla tipo_usuario
    IF NOT EXISTS (SELECT 1 FROM tipo_usuario WHERE tipo_usuario_id = p_tipo_usuario) THEN
        RETURN 'El tipo de usuario no existe';
    END IF;

    -- Intentar insertar el nuevo usuario
    BEGIN
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
        BEGIN
            GET DIAGNOSTICS CONDITION 1 mensaje_error = MESSAGE_TEXT;
            RETURN mensaje_error;
        END;

        INSERT INTO usuario (nombres_usuario, apellidos_usuario, contrasena_usuario,
                             documento_usuario, correo_usuario, telefono_usuario,
                             tipo_usuario, estado_usuario, fecha_usuario)
        VALUES (p_nombres, p_apellidos, p_contrasena, p_documento, p_correo,
                p_telefono, p_tipo_usuario, p_estado, CURRENT_TIMESTAMP);

        -- Verificar si se afectó una fila
        IF ROW_COUNT() = 0 THEN
            RETURN 'No se pudo insertar el usuario';
        ELSE
            -- Obtener el ID del nuevo usuario insertado
            SET usuario_id = LAST_INSERT_ID();
            RETURN CONCAT('Usuario agregado con ID: ', usuario_id);
        END IF;
    END;

END //

DELIMITER ;

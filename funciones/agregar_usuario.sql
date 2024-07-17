
DELIMITER //

CREATE PROCEDURE agregarUsuario(
    IN p_nombres VARCHAR(150),
    IN p_apellidos VARCHAR(150),
    IN p_contrasena VARCHAR(200),
    IN p_documento VARCHAR(15),
    IN p_correo VARCHAR(200),
    IN p_telefono VARCHAR(15),
    IN p_tipo_usuario INT,
    IN p_estado VARCHAR(20),
    OUT p_resultado VARCHAR(200)
)
BEGIN
    DECLARE usuario_id INT;
    DECLARE mensaje_error VARCHAR(200);
    DECLARE exito BOOLEAN DEFAULT FALSE;

    -- Handler para excepciones
    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION
    BEGIN
        GET DIAGNOSTICS CONDITION 1 mensaje_error = MESSAGE_TEXT;
        ROLLBACK;
        SET p_resultado = mensaje_error;
    END;

    -- Iniciar transacción
    START TRANSACTION;

    -- Validar que no haya campos nulos
    IF p_nombres IS NULL OR p_apellidos IS NULL OR p_contrasena IS NULL
        OR p_documento IS NULL OR p_correo IS NULL OR p_telefono IS NULL
        OR p_tipo_usuario IS NULL OR p_estado IS NULL THEN
        SET mensaje_error = 'Ningún campo puede ser nulo';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = mensaje_error;
    END IF;

    -- Verificar que el tipo de usuario exista en la tabla tipo_usuario
    IF NOT EXISTS (SELECT 1 FROM tipo_usuario WHERE tipo_usuario_id = p_tipo_usuario) THEN
        SET mensaje_error = 'El tipo de usuario no existe';
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = mensaje_error;
    END IF;

    -- Insertar el nuevo usuario
    INSERT INTO usuario (nombres_usuario, apellidos_usuario, contrasena_usuario,
                         documento_usuario, correo_usuario, telefono_usuario,
                         tipo_usuario, estado_usuario, fecha_usuario)
    VALUES (p_nombres, p_apellidos, p_contrasena, p_documento, p_correo,
            p_telefono, p_tipo_usuario, p_estado, CURRENT_TIMESTAMP);

    -- Obtener el ID del nuevo usuario insertado
    SET usuario_id = LAST_INSERT_ID();

    -- Confirmar la transacción
    COMMIT;
    SET exito = TRUE;

    -- Retornar mensaje de éxito o error
    IF exito THEN
        SET p_resultado = CONCAT('Usuario agregado con ID: ', usuario_id);
    ELSE
        SET p_resultado = 'Error al agregar el usuario';
    END IF;
END //

DELIMITER ;

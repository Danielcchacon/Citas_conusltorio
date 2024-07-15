DELIMITER //

CREATE FUNCTION agregarEPS(
    p_nombre_eps VARCHAR(80),
    p_nit_eps VARCHAR(60),
    p_telefono_eps VARCHAR(15),
    p_direccion_eps VARCHAR(50),
    p_estado_eps VARCHAR(20)
)
    RETURNS VARCHAR(200)
BEGIN
    DECLARE
        eps_id                INT;
        DECLARE mensaje_error VARCHAR(200);

        -- Handler para excepciones
        DECLARE CONTINUE      HANDLER FOR SQLEXCEPTION
    BEGIN
        SET mensaje_error = 'Error al agregar la EPS. Verifique los datos ingresados.';
    END;

    -- Validar que no haya campos nulos
    IF p_nombre_eps IS NULL OR p_nit_eps IS NULL OR p_estado_eps IS NULL
        OR p_telefono_eps IS NULL OR p_direccion_eps IS NULL THEN
        RETURN 'Ningun campo puede ir nulo. Rectifique sus campos ingresados';
    END IF;

    -- Validar que no haya campos vacios
    IF p_nombre_eps = '' OR p_nit_eps = '' OR p_estado_eps = ''
        OR p_telefono_eps = '' OR p_direccion_eps = '' THEN
        RETURN 'Ningun campo puede ir vacio. Rectifique sus campos ingresados';
    END IF;

    -- Insertar la nueva EPS
    INSERT INTO eps (nombre_eps, nit_eps, telefono_eps, direccion_eps, fecha_registro, estado_eps)
    VALUES (p_nombre_eps, p_nit_eps, p_telefono_eps, p_direccion_eps, CURRENT_TIMESTAMP, p_estado_eps);

    -- Obtener el ID de la nueva EPS insertada
    SET eps_id = LAST_INSERT_ID();

    -- Retornar mensaje de éxito
    RETURN CONCAT('EPS agregada con ID: ', eps_id);
END //

DELIMITER;

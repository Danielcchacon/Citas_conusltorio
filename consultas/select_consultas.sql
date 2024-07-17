SELECT
    DATE(fecha_consulta) AS dia,
    p.nombres_paciente AS nombre_paciente,
    m.nombres_medico AS nombre_medico
FROM
    consulta c
    JOIN paciente p ON c.paciente_id = p.paciente_id
    JOIN medico m ON c.medico_id = m.medico_id
WHERE
    MONTH(fecha_consulta) = MONTH(CURRENT_DATE)
    AND YEAR(fecha_consulta) = YEAR(CURRENT_DATE)
GROUP BY
    dia,
    nombre_paciente,
    nombre_medico
ORDER BY dia;
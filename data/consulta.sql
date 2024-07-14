INSERT INTO consulta (
    paciente_id, 
    tipo_consulta_id, 
    medico_id, 
    fecha_consulta, 
    antecedentes_medicos, 
    examen_fisico, 
    diagnostico, 
    tratamiento_medico, 
    evolucion_paciente
) 
VALUES 
    (1, 1, 1, '2024-07-10 10:00:00', 'Ninguno', 'Normal', 'Saludable', 'Ninguno', 'Estable'),
    (2, 2, 2, '2024-07-12 14:30:00', 'Hipertensión', 'Presión alta', 'Hipertensión', 'Medicamentos antihipertensivos', 'Mejorando');

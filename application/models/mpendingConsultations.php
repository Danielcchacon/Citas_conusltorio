<?php
class MpendingConsultations  extends CI_Model  {
  
    public function mselectpendingConsultations() {
        // Selecciona las columnas que deseas obtener
        $this->db->select('fecha_consulta, p.nombres_paciente AS nombre_paciente, m.nombres_medico AS nombre_medico, c.antecedentes_medicos, c.examen_fisico, c.diagnostico, c.tratamiento_medico, c.evolucion_paciente');
        
        // Define la tabla principal
        $this->db->from('consulta c');
        
        // Realiza los joins necesarios
        $this->db->join('paciente p', 'c.paciente_id = p.paciente_id');
        $this->db->join('medico m', 'c.medico_id = m.medico_id');
        
        // Filtra por el mes y año actuales
        $this->db->where('MONTH(fecha_consulta)', date('m'));
        $this->db->where('YEAR(fecha_consulta)', date('Y'));
    
        // Verifica si al menos uno de los campos está vacío o nulo
        $this->db->group_start(); // Inicia el grupo de condiciones OR
        $this->db->where('c.antecedentes_medicos IS NULL', NULL, FALSE);
        $this->db->or_where('TRIM(c.antecedentes_medicos) = ""', NULL, FALSE);
        $this->db->or_where('c.examen_fisico IS NULL', NULL, FALSE);
        $this->db->or_where('TRIM(c.examen_fisico) = ""', NULL, FALSE);
        $this->db->or_where('c.diagnostico IS NULL', NULL, FALSE);
        $this->db->or_where('TRIM(c.diagnostico) = ""', NULL, FALSE);
        $this->db->or_where('c.tratamiento_medico IS NULL', NULL, FALSE);
        $this->db->or_where('TRIM(c.tratamiento_medico) = ""', NULL, FALSE);
        $this->db->or_where('c.evolucion_paciente IS NULL', NULL, FALSE);
        $this->db->or_where('TRIM(c.evolucion_paciente) = ""', NULL, FALSE);
        $this->db->group_end(); // Cierra el grupo de condiciones OR
    
        // Ordena los resultados por fecha de consulta
        $this->db->order_by('fecha_consulta');
        
        // Ejecuta la consulta y devuelve los resultados
        $query = $this->db->get();
        return $query->result();
    }
    
    


}

   
?>
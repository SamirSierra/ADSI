<?php

class Convocatoria {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=practica', 'root');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Método para obtener todas las vacantes
    public function obtenerVacantes() {
        $query = "SELECT * FROM spg_convocatorias";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para guardar una nueva vacante
    public function guardarVacante($data) {
        $query = "INSERT INTO spg_convocatorias (empresa, programa, cargo, modalidad_practicas, estado) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['empresa'], 
            $data['programa'], 
            $data['cargo'], 
            $data['modalidad_practicas'], 
            $data['estado']
        ]);
    }

    // Método para actualizar una vacante
    public function actualizarVacante($data) {
        $query = "UPDATE spg_convocatorias SET empresa = ?, programa = ?, cargo = ?, modalidad_practicas = ?, estado = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            $data['empresa'], 
            $data['programa'], 
            $data['cargo'], 
            $data['modalidad_practicas'], 
            $data['estado'], 
            $data['id']
        ]);
    }

    // Método para eliminar una vacante
    public function eliminarVacante($id) {
        $query = "DELETE FROM spg_convocatorias WHERE id = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$id]);
    }

    // Método para obtener una vacante por ID
    public function obtenerVacantePorId($id) {
        $query = "SELECT * FROM spg_convocatorias WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}

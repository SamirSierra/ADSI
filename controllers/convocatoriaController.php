<?php

require_once 'C:/xampp/htdocs/adsi/models/convocatoria.php';

class VacanteController {
    private $vacanteModel;

    public function __construct() {
        $this->vacanteModel = new Convocatoria();
    }

    public function index() {
        // Obtener las vacantes
        $lista_vacantes = $this->vacanteModel->obtenerVacantes();
        // Incluir la vista y pasar la variable
        require 'views/vacante/index.php'; // Asegúrate de que la vista es la correcta
    }

    public function crear() {
        require 'views/vacante/crear.php';
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->vacanteModel->guardarVacante($_POST);
            header("Location: /vacantes");
            exit;
        }
    }

    public function editar($id) {
        $vacante = $this->vacanteModel->obtenerVacantePorId($id);
        require 'views/vacante/editar.php';
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->vacanteModel->actualizarVacante($_POST);
            header("Location: /vacantes");
            exit;
        }
    }

    public function eliminar($id) {
        $this->vacanteModel->eliminarVacante($id);
        header("Location: /vacantes");
        exit;
    }
}

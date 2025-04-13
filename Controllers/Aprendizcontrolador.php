<?php

class AprendizControlador
{

    private $aprendizModelo;
    private $modelo;

    public function __construct($modelo)
    {
        $this->aprendizModelo = new Aprendiz();
    }
    
    public function index()
    {
        $aprendices = $this->aprendizModelo->recibirDatos();
        include 'c://laragon/www/CRUD_APRENDICES_PRADA/Views/Aprendiz/index.php';
    }

    public function crear()
    {
        include 'c://laragon/www/CRUD_APRENDICES_PRADA/Views/Aprendiz/create.php';
    }

    public function guardar($data)
    {
        try {
           $this->aprendizModelo->crear($data);
           echo "Exito, Aprendiz creado correctamente";
        } catch (Exception $e) {
  echo"Error al crear aprendiz: " . $e->getMessage();
        }
    }

    public function editar($id)
    {
        $aprendiz = $this->aprendizModelo->recibirID($id);
        include 'c://laragon/www/CRUD_APRENDICES_PRADA/Views/Aprendiz/edit.php';
    }

    public function actualizar($id, $data)
    {
        try {
            $this->aprendizModelo->actualizar($id, $data);
            echo "Exito, Aprendiz actualizado correctamente";

        } catch (\Exception $e) {
            echo "Error, no se puede actualizar el aprendiz" . $e->getMessage();
        }
    }

    public function eliminar($id)
    {
        try {
            $this->aprendizModelo->eliminar($id);
            echo "Exito, aprendiz eliminado correctamente";
        } catch (\Exception $e) {
            echo "Error, No se pudo eliminar el aprendiz" .$e->getMessage();
        }
    }

}


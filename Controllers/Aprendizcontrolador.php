<?php

require_once 'c://laragon/www/CRUD_APRENDICES_PRADA/Models/Aprendizmodelo.php';

class AprendizControlador
{
    private $aprendizModelo;
    private $action;
    private $id;


    public function __construct()
    {
        $this->aprendizModelo = new Aprendiz();
    }

    public function index()
    {
        $aprendizModel = new Aprendiz();
        $aprendices = $aprendizModel->recibirDatos(); // Método que obtiene todos los aprendices

        // Verifica si se obtuvieron datos
        if (empty($aprendices)) {
            $aprendices = []; // Inicializa como un array vacío si no hay resultados
        }
        return $aprendices;
    }

    public function crear()
    {
        include 'c://laragon/www/CRUD_APRENDICES_PRADA/Views/Aprendiz/create.php';
    }


    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['store'])) {
            // print_r($_POST);
            $data = [
                'primer_nombre' => $_POST['primer_nombre'],
                'segundo_nombre' => $_POST['segundo_nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'],
                'segundo_apellido' => $_POST['segundo_apellido'] ?? '',
                'numero_doc' => $_POST['numero_doc'],
                'id_tipo_doc' => $_POST['id_tipo_doc'],
                'id_genero' => $_POST['id_genero'],
                'id_grupo_sanguineo' => $_POST['id_grupo_sanguineo'],
                'id_programa_formacion' => $_POST['id_programa_formacion'],
                'fecha_inicio' => $_POST['fecha_inicio'],
                'descripcion' => 'Registro desde formulario web'
            ];

            try {
                $aprendizModel = new Aprendiz();
                $aprendizModel->Crear($data);
                header('Location: ../Views/index.php');
            } catch (Exception $e) {
                echo "Error al crear aprendiz: " . $e->getMessage();
            }
        }
    }

    public function editar()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["editar"])) {
            print_r($_POST);
            $data = [
                'id_aprendiz' => (int) $_POST['id'],
                'primer_nombre' => $_POST['primer_nombre'],
                'segundo_nombre' => $_POST['segundo_nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'],
                'segundo_apellido' => $_POST['segundo_apellido'] ?? '',
                'numero_doc' => $_POST['numero_doc'],
                'id_tipo_doc' => $_POST['id_tipo_doc'],
                'id_genero' => $_POST['id_genero'],
                'id_grupo_sanguineo' => $_POST['id_grupo_sanguineo'],
                'id_programa_formacion' => $_POST['id_programa_formacion'],
                'fecha_inicio' => $_POST['fecha_inicio'],
                'descripcion' => 'Registro desde formulario web'
            ];
            try {
                $aprendizModel = new Aprendiz();
                $aprendizModel->Actualizar($data);
                header('Location: ../Views/index.php');
            } catch (Exception $e) {
                echo "Error al actualizar aprendiz: " . $e->getMessage();
            }
        }
    }


    public function eliminar()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['eliminar'])) {
            try {
                // Instanciar el modelo
                $aprendizModel = new Aprendiz();
                // Llamar al método eliminar
                $aprendizModel->eliminar(id_aprendiz: (int) $_POST['id']);
                // Redirigir después de eliminar
                header('Location: ../Views/index.php');
            } catch (Exception $e) {
                echo "Error al eliminar aprendiz: " . $e->getMessage();
            }
        }
    }
    
    public function ver($id_aprendiz)
    {
        $aprendizModel = new Aprendiz();
        return $aprendizModel->ver($id_aprendiz);
    }



    private function validarIdEnTabla($tabla, $id)
    {
        $query = "SELECT COUNT(*) FROM $tabla WHERE id = :id";
        $stmt = (new Database())->getConnection()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
}
$Aprendizcontrolador = new AprendizControlador();
$Aprendizcontrolador->store();
$Aprendizcontrolador->editar();
$Aprendizcontrolador->eliminar();





// try {
//     $aprendiz = new AprendizControlador();
//     $data = ['id_aprendiz' => 1,'primer_nombre'=> 'Lisandro','segundo_nombre'=> '','primer_apellido'=> 'Prada', 'segundo_apellido'=>'Ruiz','numero_doc'=>'1234567890', 'id_tipo_doc'=>1, 'id_genero'=>1, 'id_grupo_sanguineo'=>8, 'id_programa_formacion'=>3, 'fecha_inicio'=>''];
//     $aprendiz->store($data);
//     echo "Usuario creado";
// } catch (Exception $e) {
//     echo ''. $e->getMessage();
// }
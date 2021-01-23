<?php
namespace App\Controllers;

use App\Models\Manual;
use League\Plates\Engine;

class ManualController extends Controller {

    private $manualModel;

    public function __construct() {
      parent::__construct();
      $this->manualModel = new Manual;
    }
  
    public function single($slug) {
        $manual = $manualModel->get($slug);
        if(is_null($manual)) {
            open404Error();
            exit;
        }
        echo $this->templates->render('sections/manuals/manual_single', [
            'manual' => $manual
        ]);
    }
    public function search() {
        $query = $_POST["query"] ?? '';
        $query = trim($query);
        $query = filter_var($query, FILTER_SANITIZE_STRING);
        $manuals = $this->$manualModel->search($query);
        echo $this->templates->render('sections/manuals/manual_search', [
            'manuals' => $manuals,
            'query' => $query,
        ]);
    }
    public function edit($slug){
        $manual = $manualModel->get($lug);
        if(is_null($manual)){
            open404Error();
            exit;
        }
        $error = [];
        $data = [];
        if($_POST) {
            $data['title'] = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);
            $data['order'] = filter_var(trim($_POST['order']), FILTER_SANITIZE_NUMBER_INT);
            // if(strlen($data['title']) < 10 || strlen($data['title'] > 100)) {
            //     $errors[] = 'El titulo debe contener entre 10 y 100 caracteres';
            // }
            // if(! filter_var($data['order'], FILTER_VALIDATE_INT)) {
            //     $errors[] = 'EL order debe ser un numero entero';
            // }
            $error = $this->validate($data);
            if(count($errors) === 0) {
                $result[] = $this->manualModel->update($manual, $data);
                if($result) {
                    $manual = $result;
                    $msg = 'Editado correctamente';
                } else {
                    $errors[] = 'Se ha producido un error al guardar. Intentalo de nuevo mas tarde';
                    var_dump($result);
                }
            }
        }
        echo $this->templates->render('sections/manuals/manual_edit',[
            'manual' => $manual,
            'errors' => $errors,
            'data' => $data,
            'msg' => $msg ?? '',
            'action' => "/manuales/{$manual['slug']}/editar",
        ]);
    }

    private function validate($data) {
        $error = [];
        if(strlen($data['title']) < 10 || strlen($data['title'] > 100)) {
            $error[] = 'El titulo debe contener entre 10 o 100 caracteres';
        }
        if(! filter_var($data['order'], FILTER_VALIDATE_INT)) {
            $error[] = 'El orden debe ser un numero entero';
        }
        return $error;
    }
    public function insert() {
        $data = [
            'title' => '',
            'oder' => '',
        ];
        echo $this->templates->render('sections/manuals/manual_insert', [
            'data' => $data,
            'action' => "/manuales/nuevo",
            'errors' => [],
        ]);
    }

    public function save() {
        $data = [
            'title' => $_POST['order'] ?? '' ,
            'order' => $_POST['order'] ?? '' ,
        ];
        $data['title'] = filter_var(trim($data['title']), FILTER_SANITIZE_STRING);
        $data['order'] = filter_var(trim($data['order']), FILTER_SANITIZE_NUMBER_INT);
        $error = $this->validate($data);
        if(count($error) === 0){

            $id = $this->manualModel->insert($data);
            if($id) {
                $manual = $this->manualModel->find($id);
                header("location: /manuales/{$manual['slug']}");
                return false;
            } else {
                $error = ['Error al insertar. Prueba de nuevo mas tarde.'];
            }
        }
        echo $this->templates->render('sections/manuals/manual_insert', [
            'data' => $data,
            'action' => "/manuales/nuevo",
            'errors' => $error,
        ]);        
    }
}
?>
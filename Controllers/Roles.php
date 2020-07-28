<?php

class Roles extends Controllers
{
    public function __construct()
    {

        parent::__construct();
    }

    public function roles()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "User Roles";
        $data['page_name'] = "user rol";
        $data['page_title'] = "User Roles";

        $this->views->getView($this, "roles", $data);

    }

    public function getRoles()
    {
        $arrData = $this->model->selectRoles();

        for ($i=0; $i < count($arrData) ; $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-success">Active</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-outline-dark btn-sm btnPermisosRol" rl="'.$arrData[$i]['id'].'" title="Permisos"><i class="fas fa-key"></i></button>
            <button class="btn btn-outline-success btn-sm btnEditsRol" rl="'.$arrData[$i]['id'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-outline-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }

        //dep($arrData[0]['status']); exit;

        //dep($arrData);
        //Esto es para convertir un array en un formato json, lo estamos obligando a que se convierta en un objeto
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function setRol()
    {
        //dep($_POST);

        $strRol = strClean($_POST['txtNombre']); //la funcion de strClean la creamos en los helpers para que limpie los caracteres
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intval($_POST['listStatus']);

        $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);

        if($request_rol > 0)
        {
            $arrResponse = array("status" => true, "msg" => "Role saved successfully");

        }elseif ($request_rol == "exist")
        {
            $arrResponse = array("status" => false,  "msg" => "¡Alert! Role already exists");
        }else {
            $arrResponse = array("status" => false, "msg" => "Incorrect information please try again");
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

}

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
        $data['page_name'] = "user_rol";
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
            <button class="btn btn-outline-success btn-sm btnEditRol" rl="'.$arrData[$i]['id'].'" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-outline-danger btn-sm btnDelRol" rl="'.$arrData[$i]['id'].'" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            </div>';
        }

        //dep($arrData[0]['status']); exit;

        //dep($arrData);
        //Esto es para convertir un array en un formato json, lo estamos obligando a que se convierta en un objeto
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getRol(int $id)
    {
        $intId = intval(strClean($id));

        if($intId > 0)
        {
            $arrData = $this->model->selectRol($intId);

            if(empty($arrData))
            {
                $arrResponse = array('status' => false, 'msg' => "Unable to update role");
            }else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function setRol()
    {
        //dep($_POST);

        $intId = intval($_POST['idRol']);
        $strRol = strClean($_POST['txtNombre']); //la funcion de strClean la creamos en los helpers para que limpie los caracteres
        $strDescripcion = strClean($_POST['txtDescripcion']);
        $intStatus = intval($_POST['listStatus']);

        if($intId == 0)
        {
            //Crear
            $request_rol = $this->model->insertRol($strRol, $strDescripcion, $intStatus);
            $option = 1;
        }else {
            //Actualizar
            $request_rol = $this->model->updateRol($intId, $strRol, $strDescripcion, $intStatus);
            $option = 2;
        }

        if($request_rol > 0)
        {
            if($option == 1)
            {
                $arrResponse = array("status" => true, "msg" => "Role saved successfully");
            }else{
                $arrResponse = array("status" => true, "msg" => "Role updated successfully");
            }

        }elseif ($request_rol == "exist")
        {
            $arrResponse = array("status" => false,  "msg" => "¡Alert! Role already exists");
        }else {
            $arrResponse = array("status" => false, "msg" => "Incorrect information please try again");
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delRol()
    {
        if($_POST){
            $intId = intval($_POST['idrol']);
            $requestDelete = $this->model->deleteRol($intId);
            if($requestDelete == 'ok')
            {
                $arrResponse = array('status' => true, 'msg' => 'The role has been removed');
            }else if($requestDelete == 'exist'){
                $arrResponse = array('status' => false, 'msg' => "You can not delete the role");
            }else{
                $arrResponse = array('status' => false, 'msg' => "Failed to delete role");
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }
}

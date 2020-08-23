<?php

class Users extends Controllers
{
    public function __construct()
    {

        parent::__construct();
    }

    public function users()
        {
            $data['page_tag'] = "Users";
            $data['page_title'] = "USERS <small>Daqat Shop</small>";
            $data['page_name'] = "users";
            $this->views->getView($this, "users", $data);

        }

    public function setUser()
    {
        if ($_POST) {
            //dep($_POST);
            //echo $_POST['txtIdentificacion'];

            if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombre']) || empty($_POST['txtApellido']) ||
               empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']) || empty($_POST['listStatus']))
            {
                $arrResponse = array('status' => false, 'msg' => 'Incorrect information');
            }else{
                $strIdentification = strClean($_POST['txtIdentificacion']);
                $strFirstName = ucwords(strClean($_POST['txtNombre']));
                $strLastName = ucwords(strClean($_POST['txtApellido']));
                $intPhoneNumber = intval(strClean($_POST['txtTelefono']));
                $strEmail = strtolower(strClean($_POST['txtEmail']));
                $intTypeId = intval(strClean($_POST['listRolid']));
                $intStatus = intval(strClean($_POST['listStatus']));

                $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256", $_POST['txtPassword']);
                $request_user = $this->model->insertUser(
                    $strIdentification,
                    $strFirstName,
                    $strLastName,
                    $intPhoneNumber,
                    $strEmail,
                    $strPassword,
                    $intTypeId,
                    $intStatus);

                if ($request_user > 0) {
                    $arrResponse = array('status' => true, 'msg' => 'User successfully created');
                }elseif($request_user == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => 'Alert! user already exist');
                }else{
                    $arrResponse = array('status' => false, 'msg' => 'User can not be created');
                }
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function getUsers()
    {
        $arrData = $this->model->selectUsers();
        //dep($arrData);

        for ($i=0; $i < count($arrData) ; $i++) {

            if($arrData[$i]['status'] == 1)
            {
                $arrData[$i]['status'] = '<span class="badge badge-success">Active</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inactive</span>';
            }
            $arrData[$i]['options'] = '<div class="text-center">
            <button class="btn btn-outline-dark btn-sm btnViewUsuario" us="'.$arrData[$i]['idpersona'].'" title="Ver usuario"><i class="fas fa-eye"></i></button>
            <button class="btn btn-outline-success btn-sm btnEditUsuario" us="'.$arrData[$i]['idpersona'].'" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>
            <button class="btn btn-outline-danger btn-sm btnDelUsuario" us="'.$arrData[$i]['idpersona'].'" title="Eliminar usuario"><i class="fas fa-trash-alt"></i></>
            </div>';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
}

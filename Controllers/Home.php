<?php

class Home extends Controllers
{
    public function __construct()
    {
        //Este metodo viene desde el constructor del archivo Controller.php que esta en Libraries
        //Esto es para que me carge automaticamente el model que corresponde
        parent::__construct();
    }

    public function home()
        {
            $data['page_id'] = 1;
            $data['page_tag'] = "Home";
            $data['page_title'] = "Pagina principal";
            $data['page_name'] = "home";
            $data['page_content'] = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut porro nesciunt dolore, sunt numquam. Repudiandae, quidem nesciunt. Incidunt suscipit ipsam tempore ex?";
            $this->views->getView($this, "home", $data);

        }

    public function insertar()
    {
        $data = $this->model->setUser("Carlos", 18);
        print_r($data);
    }

    public function verUsuario($id)
    {
        $data = $this->model->getUser($id);
        print_r($data);
    }

    public function actualizar()
    {
        $data = $this->model->updateUser(1, "Roberto", 20);
        print_r($data);
    }

    public function verUsuarios()
    {
        $data = $this->model->getUsers();
        print_r($data);
    }

    public function eliminarUsuario($id)
    {
        $data = $this->model->delUser($id);
        print_r($data);
    }

}

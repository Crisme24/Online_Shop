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

}

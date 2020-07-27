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

}

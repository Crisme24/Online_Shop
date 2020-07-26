<?php

class Home extends Controllers
{
    public function __construct()
    {

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

}

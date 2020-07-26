<?php

class Products extends Controllers
{
    public function __construct()
    {

        parent::__construct();
    }

    public function products()
        {
            $data['page_id'] = 2;
            $data['page_tag'] = "Products";
            $data['page_title'] = "Products on sale";
            $data['page_name'] = "products";

            $this->views->getView($this, "products", $data);

        }

}

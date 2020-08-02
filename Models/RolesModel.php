<?php

class RolesModel extends Mysql
{
    public $intId;
    public $strRol;
    public $strDescripcion;
    public $intStatus;

    public function __construct()
    {

        parent::__construct();
    }

    public function selectRoles()
    {
        $sql = "SELECT * FROM role WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectRol(int $id)
    {
        $this->intId = $id;
        $sql = "SELECT * FROM role WHERE id = $this->intId";
        $request = $this->select($sql);
        return $request;
    }

    public function insertRol(string $rol, string $descripcion, int $status)
    {
        $return = "";
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

    $sql = "SELECT * FROM role WHERE name = '{$this->strRol}'";
    $request = $this->select_all($sql);

    if(empty($request))
    {
        $query_insert = "INSERT INTO role(name, description, status) VALUES (?, ?, ?)";
        $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    } else {
        $return = "exist";
    }

    return $return;
    }

    public function updateRol(int $id, string $rol, string $descripcion, int $status)
    {
        $this->intId = $id;
        $this->strRol = $rol;
        $this->strDescripcion = $descripcion;
        $this->intStatus = $status;

        $sql = "SELECT * FROM role WHERE name = '$this->strRol' AND id != $this->intId";
        $request = $this->select_all($sql);

        if(empty($request))
        {
            $sql = "UPDATE role SET name = ?, description = ?, status = ? WHERE id = $this->intId";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intStatus);
            $request = $this->update($sql, $arrData);
        }else{
            $request = 'exist';
        }

        return $request;
    }
}

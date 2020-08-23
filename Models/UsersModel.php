<?php

class UsersModel extends Mysql
{
    private $intIdUser;
    private $strIdentification;
    private $strFirstName;
    private $strLastName;
    private $intPhoneNumber;
    private $strEmail;
    private $strPassword;
    //private $strToken;
    private $intTypeId;
    private $intStatus;

    public function __construct()
    {

        parent::__construct();
    }

    public function insertUser(string $identification, string $firstName, string $lastName, int $phoneNumber, string $email,
    string $password, int $typeId, int $status)
    {
        $this->strIdentification = $identification;
        $this->strFirstName = $firstName;
        $this->strLastName = $lastName;
        $this->intPhoneNumber = $phoneNumber;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $this->intTypeId = $typeId;
        $this->intStatus = $status;
        $return = 0;

        $sql = "SELECT * FROM persona WHERE
                email_user = '{$this->strEmail}' or identificacion = '{$this->strIdentification}'";

        $request = $this->select_all($sql);

        if(empty($request))
        {
            $query_insert = "INSERT INTO persona(
                identificacion, nombres, apellidos, telefono, email_user, password, rolid, status)
                VALUE(?, ?, ?, ?, ?, ?, ?, ?)";

            $arrData = array($this->strIdentification, $this->strFirstName, $this->strLastName, $this->intPhoneNumber,
            $this->strEmail, $this->strPassword, $this->intTypeId, $this->intStatus);

            $request_insert = $this->insert($query_insert, $arrData);

            $return = $request_insert;
        }else{
            $return = 'exist';
        }

        return $return;
    }

    public function selectUsers()
    {
        $sql = "SELECT p.idpersona, p.identificacion, p.nombres, p.apellidos, p.telefono, p.email_user, p.status, r.name
                FROM persona p
                INNER JOIN role r
                ON p.rolid = r.id
                WHERE p.status != 0";

        $request = $this->select_all($sql);

        return $request;
    }

}

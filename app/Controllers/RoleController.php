<?php
class RoleController
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db->getConnect();
    }

    public function getRole($id)
    {
        include_once 'app/Models/RoleModel.php';
        if (trim($id) !== "" && is_numeric($id)) {
            $Role = (new Role())::byId($this->conn, $id);
        }
    }
}

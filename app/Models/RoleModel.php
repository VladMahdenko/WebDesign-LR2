<?php
class Role
{
    private $title;
    private $id;

    public function __construct($title = '')
    {
        $this->title = $title;
    }

    public static function byId($conn, $id)
    {
        $sql = "SELECT * FROM roles WHERE id = $id";
        $res = $conn->query($sql);
        if ($res) {
            $role = $res->fetch_assoc();
            return $role;
        }
    }

    public static function all($conn)
    {
        $sql = "SELECT * FROM roles";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $arr = [];
            while ($db_field = $result->fetch_assoc()) {
                $arr[] = $db_field;
            }
            return $arr;
        } else {
            return [];
        }
    }
}

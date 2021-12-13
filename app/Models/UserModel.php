<?php
class User
{
    private $first_name;
    private $last_name;
    private $email;
    private $filepath;
    private $password;
    private $role_id;

    public function __construct($first_name = '', $last_name = '', $email = '', $filepath = '', $password = '', $role_id = '')
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->filepath = $filepath;
        $this->password = $password;
        $this->role_id = $role_id;
    }

    public function add($conn)
    {
        $sql = "INSERT INTO users (email, first_name, last_name, path_to_img, role_id, password)
           VALUES ('$this->email', '$this->first_name','$this->last_name', '$this->filepath', '$this->role_id', MD5('$this->password'))";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            return true;
        }
    }

    public static function all($conn)
    {
        $sql = "SELECT * FROM users";
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


    public static function update($conn, $id, $data)
    {
    }
    public static function delete($conn, $id)
    {
        $sql = "DELETE FROM users WHERE id = $id";
        $result = $conn->query($sql);
        if ($result) {
            return true;
        }
    }

    public static function byId($conn, $id)
    {
        $sql = "SELECT * FROM users WHERE id = $id";
        $res = $conn->query($sql);
        if ($res) {
            $user = $res->fetch_assoc();
            return $user;
        }
    }
}

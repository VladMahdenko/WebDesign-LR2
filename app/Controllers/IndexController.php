<?php
class IndexController
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db->getConnect();
    }

    public function index()
    {
        include_once 'app/Models/UserModel.php';
        $users = (new User())::all($this->conn);
        include_once 'app/Models/RoleModel.php';
        $roles = (new Role())::all($this->conn);
        include_once 'views/home.php';
    }

    public function signUp()
    {
        include_once 'views/signUp.php';
    }

    public function show()
    {
        include_once 'app/Models/UserModel.php';
        include_once 'app/Models/RoleModel.php';
        include_once 'app/Models/CommentModel.php';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (trim($id) !== "" && is_numeric($id)) {
            $user = (new User())::byId($this->conn, $id);
        }
        $person = $user['email'];
        $roles = (new Role())::all($this->conn);
        $comments = (new Comment())::byPerson($this->conn, $person);
        include_once 'views/showUser.php';
    }
}

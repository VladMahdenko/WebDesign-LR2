<?php
class UsersController
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
        include_once 'views/home.php';
    }

    public function add()
    {

        include_once 'app/Models/UserModel.php';
        $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($_POST["role"] == "admin") $role_id = 1;
        if ($_POST["role"] == "user") $role_id = 2;
        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $isUploaded = false;
        $filePath = '';
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $filePath = $target_dir . basename($_FILES["photo"]["name"]);
            $isUploaded = true;
        } else $filePath = 'public/uploads/blank_profile.png';
        if (trim($first_name) !== "" && trim($last_name) !== "" && trim($email) !== "") {
            $user = new User($first_name, $last_name, $email, $filePath, $password, $role_id);
            $user->add($this->conn);
        }
        header('Location: ?controller=index');
    }

    public function delete()
    {

        include_once 'app/Models/UserModel.php';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (trim($id) !== "" && is_numeric($id)) {
            (new User())::delete($this->conn, $id);
        }
        header('Location: ?controller=index');
    }

    public function show()
    {
        include_once 'app/Models/UserModel.php';
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if (trim($id) !== "" && is_numeric($id)) {
            $user = (new User())::byId($this->conn, $id);
        }
        include_once 'views/showUser.php';
    }

    public function edit()
    {
        include_once 'app/Models/UserModel.php';
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $target_dir = "public/uploads/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $isUploaded = false;
        $filePath = '';
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $filePath = $target_dir . basename($_FILES["photo"]["name"]);
            $isUploaded = true;
        } else $filePath = 'public/uploads/blank_profile.png';

        if (trim($name) !== "" && trim($email) !== "" && trim($gender) !== "" && trim($id) !== "" && is_numeric($id)) {
            $data = [];
            $data["email"] = $email;
            $data["name"] = $name;
            $data["gender"] = $gender;
            $data["filepath"] = $filePath;
            $data["password"] = $password;
            (new User())::update($this->conn, $id, $data);
        }
        header('Location: ?controller=index');
    }
}

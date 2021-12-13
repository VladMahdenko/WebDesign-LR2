<?php
class Comment
{
    private $author;
    private $text;
    private $date;
    private $person;
    private $filepath;

    public function __construct($author = '', $text = '', $date = '', $person = '', $filepath = '')
    {
        $this->author = $author;
        $this->text = $text;
        $this->date = $date;
        $this->person = $person;
        $this->filepath = $filepath;
    }

    public function add($conn)
    {
        $sql = "INSERT INTO comments (author, text, date, person, filepath)
           VALUES ('$this->author', '$this->text','$this->date', '$this->person', '$this->filepath)";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            return true;
        }
    }

    public static function all($conn)
    {
        $sql = "SELECT * FROM comments";
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

    public static function byPerson($conn, $person)
    {
        $sql = "SELECT * FROM comments WHERE person = '$person'";
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

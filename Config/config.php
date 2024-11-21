<?php

class Config
{
    private $localhost = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "auth";
    private $create;

    public function __construct()
    {
        $this->connectDatabase();
    }

    public function connectDatabase()
    {
        $this->create = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
        if (!$this->create) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->create;
    }

    public function insertDatabase($email, $password)
    {
        $query = "INSERT INTO authentication (email, password) VALUES ('$email', '$password')";
        mysqli_query($this->create, $query);
    }

    public function selectDatabase()
    {
        $query = "SELECT * FROM authentication";
        return mysqli_query($this->create, $query);
    }

    public function deleteDatabase($id)
    {
        $query = "DELETE FROM authentication WHERE id = $id";
        mysqli_query($this->create, $query);
    }

    public function updateDatabase($id, $email, $password)
    {
        $query = "UPDATE authentication SET email='$email', password='$password' WHERE id=$id";
        mysqli_query($this->create, $query);
    }
}

?>

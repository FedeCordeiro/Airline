<?php

class UserModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_airline;charset=utf8', 'root', '');
    }

    public function getUserByUsername($username)
    {
        $query = $this->db->prepare('SELECT * FROM `user` WHERE username = ?');
        $query->execute(array(($username)));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function add($user, $pass)
    {
        $passEnc = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->db->prepare('INSERT INTO `user` (username, password) VALUES (?, ?)');
        $query->execute([$user, $passEnc]);
    }
}

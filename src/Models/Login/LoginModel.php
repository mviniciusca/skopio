<?php

namespace Src\Models\Login;

use Src\Models\Model;
use PDO;

class LoginModel extends Model
{
    protected $username;
    protected $password;
    protected $table = 'user';

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function login()
    {
        $query = "SELECT * FROM $this->table WHERE username = :username AND password = :password";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':username', $this->username);
        $stmt->bindValue(':password', $this->password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

<?php

namespace Src\Models\Dashboard;

use Src\Models\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $order = 'DESC';
    //
    protected $level = 'admin';
    protected $status = 'y';
    //
    protected $username;
    protected $password;
    protected $email;
    protected $user_id;

    public function setUsername($username)
    {
        return $this->username = $username;
    }

    public function setPassword($password)
    {
        return $this->password = $password;
    }

    public function setEmail($email)
    {
        return $this->email = $email;
    }

    public function setUserId()
    {
        return bin2hex(openssl_random_pseudo_bytes(4));
    }

    public function setLevel()
    {
        return $this->level;
    }

    public function setStatus()
    {
        return $this->status;
    }
}

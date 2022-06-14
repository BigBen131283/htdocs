<?php

namespace App\Models;

class UsersModel extends Model
{
    protected $id;
    protected $email;
    protected $password;

    public function __construct()
    {
        $this->table = strtolower(str_replace('Model', '', __CLASS__));
    }
}
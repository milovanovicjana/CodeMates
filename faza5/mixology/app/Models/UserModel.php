<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'IdUser';


    protected $allowedFields = ['IdUser', 'Name', 'Surname', 'Mail', 'Password', 'Username', 'DateOfBirth', 'Gender' ];
}
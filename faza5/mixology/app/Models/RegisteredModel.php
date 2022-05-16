<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisteredModel extends Model
{
    protected $table      = 'registered';
    protected $primaryKey = 'IdUser';


    protected $allowedFields = ['IdUser'];
}
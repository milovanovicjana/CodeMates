<?php

namespace App\Models;

use CodeIgniter\Model;

class PreferencesModel extends Model
{
    protected $table      = 'preferences';
    protected $primaryKey = ['IdUser', 'IdIngredient'];


    protected $allowedFields = ['IdUser', 'IdIngredient', 'Value'];
}
<?php

namespace App\Models;

use CodeIgniter\Model;

class ValorModel extends Model
{
    protected $table = 'valores'; 
    protected $primaryKey = 'id'; 
    protected $allowedFields = ['nome', 'tempos_tecla', 'tempos'];
}

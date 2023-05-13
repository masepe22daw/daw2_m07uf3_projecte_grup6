<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investigador extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    public $incrementing = true;

    protected $keyType = 'int';

  
}

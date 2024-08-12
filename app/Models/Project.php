<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Project extends Model
{

    protected $fillable = [
        'nm_projeto',
        'data_ini',
        'data_fim',
    ];

    protected $primaryKey = 'cd_projeto';

    protected $table = 'projeto';

}

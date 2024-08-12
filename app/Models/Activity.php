<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    protected $fillable = [
        'nm_atividade',
        'data_ini',
        'data_fim',
        'cd_projeto',
        'is_finalizada',
    ];

    protected $primaryKey = 'cd_atividade';

    protected $table = 'atividade';

}

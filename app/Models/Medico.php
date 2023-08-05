<?php

namespace App\Models;

use App\Models\Relations\BelongsToManyPacientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToManyPacientes;

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];
}

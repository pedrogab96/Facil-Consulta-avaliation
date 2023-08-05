<?php

namespace App\Models;

use App\Models\Relations\BelongsToManyMedicos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToManyMedicos;

    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];
}

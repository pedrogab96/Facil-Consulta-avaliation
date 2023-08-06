<?php

namespace App\Models;

use App\Models\Relations\BelongsToMany\BelongsToManyDoctors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToManyDoctors;

    protected $fillable = [
        'nome',
        'cpf',
        'celular',
    ];

    protected $table = 'pacientes';
}

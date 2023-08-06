<?php

namespace App\Models;

use App\Models\Relations\BelongsToMany\BelongsToManyPatients;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;
    use BelongsToManyPatients;

    protected $fillable = [
        'nome',
        'especialidade',
        'cidade_id',
    ];

    protected $table = 'medicos';
}

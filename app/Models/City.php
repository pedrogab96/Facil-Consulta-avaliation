<?php

namespace App\Models;

use App\Models\Relations\HasMany\HasManyDoctors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasManyDoctors;

    protected $fillable = [
        'nome',
        'estado',
    ];

    protected $table = 'cidades';
}

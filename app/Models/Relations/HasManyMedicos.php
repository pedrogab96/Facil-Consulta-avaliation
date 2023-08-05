<?php

namespace App\Models\Relations;

use App\Models\Medico;

trait HasManyMedicos
{
    /**
     * Retrieves the medicos associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function doctors()
    {
        return $this->hasMany(Medico::class);
    }
}

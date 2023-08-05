<?php

namespace App\Models\Relations;

use App\Models\Medico;

trait BelongsToManyMedicos
{
    /**
     * Retrieves the medicos associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctors()
    {
        return $this->belongsToMany(Medico::class);
    }
}

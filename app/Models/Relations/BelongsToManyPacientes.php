<?php

namespace App\Models\Relations;

use App\Models\Paciente;

trait BelongsToManyPacientes
{
    /**
     * Retrieves the patients associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients()
    {
        return $this->belongsToMany(Paciente::class);
    }
}

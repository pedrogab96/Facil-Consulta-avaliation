<?php

namespace App\Models\Relations\BelongsToMany;

use App\Models\Patient;

trait BelongsToManyPatients
{
    /**
     * Retrieves the patients associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'medico_paciente', 'medico_id', 'paciente_id');
    }
}

<?php

namespace App\Models\Relations\BelongsToMany;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyDoctors
{
    /**
     * Retrieves the Doctors associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class, 'medico_paciente', 'paciente_id', 'medico_id')->withTimestamps();
    }
}

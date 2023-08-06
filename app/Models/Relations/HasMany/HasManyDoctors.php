<?php

namespace App\Models\Relations\HasMany;

use App\Models\Doctor;

trait HasManyDoctors
{
    /**
     * Retrieves the Doctors associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}

<?php

namespace App\Models\Relations\HasMany;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasManyDoctors
{
    /**
     * Retrieves the Doctors associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}

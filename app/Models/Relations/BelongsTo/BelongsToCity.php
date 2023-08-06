<?php

namespace App\Models\Relations\BelongsTo;

use App\Models\City;

trait BelongsToCity
{
    /**
     * Retrieves the medicos associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

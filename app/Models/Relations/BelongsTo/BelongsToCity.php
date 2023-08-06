<?php

namespace App\Models\Relations\BelongsTo;

use App\Models\City;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait BelongsToCity
{
    /**
     * Retrieves the medicos associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}

<?php

namespace App\Models\Relations;

use App\Models\Cidade;

trait BelongsToCidade
{
    /**
     * Retrieves the medicos associated with this object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}

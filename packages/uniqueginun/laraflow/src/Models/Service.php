<?php

namespace Uniqueginun\Laraflow\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $table = 'wf_services';

    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(ServiceDetail::class, 'wf_service_id');
    }
}

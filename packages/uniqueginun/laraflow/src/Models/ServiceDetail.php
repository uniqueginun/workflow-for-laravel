<?php

namespace Uniqueginun\Laraflow\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceDetail extends Model
{
    protected $table = 'wf_service_details';

    protected $guarded = [];

    public function main(): HasOne
    {
        return $this->hasOne(Main::class, 'wf_service_detail_id');
    }

    public function steps(): HasMany
    {
        return $this->hasMany(Step::class, 'wf_service_detail_id');
    }

    public function stepActions(): HasMany
    {
        return $this->hasMany(StepAction::class, 'wf_service_detail_id');
    }
}

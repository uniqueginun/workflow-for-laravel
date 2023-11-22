<?php

namespace Uniqueginun\Laraflow\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Main extends Model
{
    protected $table = 'wf_main';

    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(MainDetail::class, 'wf_main_id');
    }
}

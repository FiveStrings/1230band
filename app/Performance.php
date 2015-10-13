<?php

namespace TTBand;

use Illuminate\Database\Eloquent\Model;

class Performance extends Model
{
    public function songs() {
        return $this->belongsToMany('TTBand\Song');
    }
}

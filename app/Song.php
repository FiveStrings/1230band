<?php

namespace TTBand;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['title', 'artist', 'body'];

    public function performances() {
        return $this->belongsToMany('TTBand\Performance');
    }
}

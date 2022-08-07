<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function packageType()
    {
        return $this->belongsTo('App\PackageType', 'packagetype_id');
    }
}

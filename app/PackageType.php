<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    public function package()
    {
        return $this->hasMany('App\Package', 'packagetype_id');
    }
}

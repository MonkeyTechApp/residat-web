<?php


namespace App\Models\Module\Region\Traits\Relations;


use App\Models\Module\Country\Country;
use App\Models\Module\Zone\Zone;

trait RegionRelations
{
    public function zones(){
        return $this->hasMany(Zone::class);
    }

    public function country (){
        return $this->belongsTo(Country::class);
    }
}

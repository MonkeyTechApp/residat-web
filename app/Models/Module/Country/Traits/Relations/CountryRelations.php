<?php
namespace App\Models\Module\Country\Traits\Relations;


use App\Models\Module\Region\Region;

trait CountryRelations
{
    public function regions(){
        return $this->hasMany(Region::class);
    }

}

<?php


namespace App\Models\Module\Zone\Traits\Relations;


use App\Models\Module\Region\Region;
use App\Models\Module\Zone\Zone;

trait ZoneRelations
{

    public function mother(){
        return $this->belongsTo(Zone::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Zone::class, 'parent_id');
    }

    public function region (){
        return $this->belongsTo(Region::class);
    }
}

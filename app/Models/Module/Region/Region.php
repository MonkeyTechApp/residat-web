<?php


namespace App\Models\Module\Region;


use App\Models\Auth\User\Traits\Ables\Protectable;
use App\Models\Module\Region\Traits\Relations\RegionRelations;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Module\Region
 *
 * @property string $id
 * @property string $name
 * @property String $country_id
 * @property bool $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereCountryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereName($value)
 * @mixin \Eloquent
 */

class Region extends Model
{
    use
        Uuids,
        RegionRelations,
        Notifiable,
        SoftDeletes,
        Sortable,
        Protectable;

    public $sortable = ['name', 'country_id', 'created_at', 'updated_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'regions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'country_id', 'active'];
}

<?php


namespace App\Models\Module\Country;


use App\Models\Auth\User\Traits\Ables\Protectable;
use App\Models\Module\Country\Traits\Relations\CountryRelations;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;


/**
 * App\Models\Module\Country
 *
 * @property string $id
 * @property string $name
 * @property bool $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereName($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    use
        Uuids,
        CountryRelations,
        Notifiable,
        SoftDeletes,
        Sortable,
        Protectable;

    public $sortable = ['name', 'active', 'created_at', 'updated_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'active', 'active'];
}

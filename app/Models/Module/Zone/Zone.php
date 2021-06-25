<?php


namespace App\Models\Module\Zone;



use App\Models\Auth\User\Traits\Ables\Protectable;
use App\Models\Auth\User\Traits\Ables\Rolable;
use App\Models\Auth\User\Traits\Attributes\UserAttributes;
use App\Models\Auth\User\Traits\Scopes\UserScopes;
use App\Models\Module\Zone\Traits\Relations\ZoneRelations;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Models\Module\Zone
 *
 * @property string $id
 * @property string $name
 * @property integer $level
 * @property string $svg
 * @property integer $parent_id
 * @property integer $region_id
 * @property bool $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User sortable($defaultSortParameters = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereActive($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereRegionId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\User whereLevel($value)
 * @mixin \Eloquent
 */
class Zone extends Model
{
    use
        Uuids,
        ZoneRelations,
        Notifiable,
        SoftDeletes,
        Sortable,
        Protectable;

    public $sortable = ['name', 'parent_id', 'region_id', 'active', 'created_at', 'updated_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administrative_zones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id', 'region_id', 'active'];

}

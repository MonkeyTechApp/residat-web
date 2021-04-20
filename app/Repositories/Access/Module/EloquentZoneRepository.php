<?php namespace App\Repositories\Access\Module;

/**
 * Class EloquentUserRepository
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Exceptions\GeneralException;
use App\Models\Module\Zone\Zone;
use App\Repositories\DbRepository;
use Exception;

class EloquentZoneRepository extends DbRepository
{
    /**
     * Model
     *
     * @var object
     */
    protected $model;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->model = new Zone;
    }

    /**
     * Restore Zone
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $zone = $this->model->withTrashed()->where('id', $id)->first();

        if(isset($zone) && isset($zone->id))
        {
            $zone->restore();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * Destroy Zone
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {

        $zone = $this->model->find($id);

        if($zone->delete())
        {
            return true;
        }

    }
}

<?php namespace App\Repositories\Access\Module;

/**
 * Class EloquentUserRepository
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Exceptions\GeneralException;
use App\Models\Module\Region\Region;
use App\Repositories\DbRepository;
use Exception;

class EloquentRegionRepository extends DbRepository
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
        $this->model = new Region;
    }

    /**
     * Restore Region
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $region = $this->model->withTrashed()->where('id', $id)->first();

        if(isset($region) && isset($region->id))
        {
            $region->restore();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * Destroy Region
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {

        $region = $this->model->find($id);

        if($region->delete())
        {
            return true;
        }

    }
}

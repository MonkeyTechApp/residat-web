<?php namespace App\Repositories\Access\Module;

/**
 * Class EloquentUserRepository
 *
 * @author Anuj Jaha <er.anujjaha@gmail.com>
 */

use App\Exceptions\GeneralException;
use App\Models\Module\Country\Country;
use App\Repositories\DbRepository;
use Exception;

class EloquentCountryRepository extends DbRepository
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
        $this->model = new Country;
    }

    /**
     * Restore Country
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function restore($id)
    {
        $country = $this->model->withTrashed()->where('id', $id)->first();

        if(isset($country) && isset($country->id))
        {
            $country->restore();
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.restore_error'));
    }

    /**
     * Destroy Country
     *
     * @param string|int $id
     * @throws GeneralException
     * @return bool
     */
    public function destroy($id)
    {

        $country = $this->model->find($id);

        if($country->delete())
        {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.users.delete_error'));
    }
}

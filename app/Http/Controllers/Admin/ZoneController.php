<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Module\Country\Country;
use App\Models\Module\Region\Region;
use App\Models\Module\Zone\Zone;
use App\Repositories\Access\Module\EloquentZoneRepository;
use Illuminate\Http\Request;
use \Validator;

class ZoneController extends Controller
{
    /**
     * Repository
     *
     * @var object
     */
    protected $repository;

    /**
     * Construct
     *
     */
    public function __construct()
    {
        $this->repository = new EloquentZoneRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('admin.zones.index', ['zones' => Zone::with('children' , 'mother' , 'region')->sortable(['created' => 'asc'])->paginate()]);
    }

    /**
     * Restore Users
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function restore(Request $request)
    {
        return view('admin.zones.restore', ['zones' => Zone::onlyTrashed()->with('children' , 'mother' , 'region')
            ->sortable(['name' => 'asc'])->paginate()]);
    }

    /**
     * Restore Users
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restoreUser($id)
    {
        $status = $this->repository->restore($id);

        if($status)
        {
            return redirect()->route('admin.zones')->withFlashSuccess('Zone Restored Successfully!');
        }

        return redirect()->route('admin.zones')->withFlashDanger('Unable to Restore Zone!');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Zone $zone
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Zone $zone)
    {
        return view('admin.zones.show', ['zone' => $zone]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Zone $zone
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Zone $zone)
    {
        $data = Zone::with('children', 'region.zones', 'mother')->where('id',$zone->id)->first();
        return view('admin.zones.edit', ['zone' => $data, 'countries' => Country::with('regions')->get()
            , 'regions' => Region::with('zones')->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Zone $zone
     * @return mixed
     */
    public function update(Request $request, Zone $zone)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $zone->name = $request->get('name');
        $zone->active = $request->get('active', 0);
        $zone->region()->associate(Region::where('id',$request->get('region'))->first());

        $zone->save();


        return redirect()->intended(route('admin.zones'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->repository->destroy($id);

        if($status)
        {
            return redirect()->route('admin.zones')->withFlashSuccess('Zone Deleted Successfully!');
        }

        return redirect()->route('admin.zones')->withFlashDanger('Unable to Delete Zone!');
    }
}

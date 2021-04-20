<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Module\Region\Region;
use App\Repositories\Access\Module\EloquentRegionRepository;
use \Validator;
use Illuminate\Http\Request;

class RegionController extends Controller
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
        $this->repository = new EloquentRegionRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.regions.index', ['regions' => Region::with('zones' , 'country')->sortable(['email' => 'asc'])->paginate()]);
    }

    /**
     * Restore Regions
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        return view('admin.regions.restore', ['regions' => Region::onlyTrashed()->with('zones' , 'country')->sortable(['name' => 'asc'])->paginate()]);
    }

    /**
     * Restore Regions
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function restoreUser($id)
    {
        $status = $this->repository->restore($id);

        if($status)
        {
            return redirect()->route('admin.regions')->withFlashSuccess('Region Restored Successfully!');
        }

        return redirect()->route('admin.regions')->withFlashDanger('Unable to Restore Region!');
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
     * @param Region $region
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Region $region)
    {
        return view('admin.regions.show', ['region' => $region]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Region $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        return view('admin.regions.edit', ['region' => $region]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Region $region
     * @return mixed
     */
    public function update(Request $request, Region $region)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'active' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $region->name = $request->get('name');
        $region->active = $request->get('active', 0);

        $region->save();


        return redirect()->intended(route('admin.regions'));
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
            return redirect()->route('admin.regions')->withFlashSuccess('Region Deleted Successfully!');
        }

        return redirect()->route('admin.regions')->withFlashDanger('Unable to Delete Region!');
    }
}

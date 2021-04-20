<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Module\Country\Country;
use App\Repositories\Access\Module\EloquentCountryRepository;
use \Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
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
        $this->repository = new EloquentCountryRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.countries.index', ['countries' => Country::with('regions')->sortable(['email' => 'asc'])->paginate()]);
    }

    /**
     * Restore Users
     *
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        return view('admin.countries.restore', ['countries' => Country::onlyTrashed()->with('regions')->sortable(['name' => 'asc'])->paginate()]);
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
            return redirect()->route('admin.countries')->withFlashSuccess('Country Restored Successfully!');
        }

        return redirect()->route('admin.countries')->withFlashDanger('Unable to Restore Country!');
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
     * @param Country $country
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Country $country)
    {
        return view('admin.countries.show', ['country' => $country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Country $country
     * @return mixed
     */
    public function update(Request $request, Country $country)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'active' => 'sometimes|boolean',
        ]);


        $validator->sometimes('name', 'unique:countries', function ($input) use ($country) {
            return strtolower($input->name) != strtolower($country->name);
        });

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $country->name = $request->get('name');
        $country->active = $request->get('active', 0);

        $country->save();


        return redirect()->intended(route('admin.countries'));
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
            return redirect()->route('admin.countries')->withFlashSuccess('Country Deleted Successfully!');
        }

        return redirect()->route('admin.countries')->withFlashDanger('Unable to Delete Country!');
    }
}

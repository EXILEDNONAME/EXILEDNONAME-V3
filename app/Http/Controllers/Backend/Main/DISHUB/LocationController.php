<?php

namespace App\Http\Controllers\Backend\Main\DISHUB;

use Auth;
use DataTables;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\Backend\Main\DISHUB\Location\LocationStoreRequest;
use App\Http\Requests\Backend\Main\DISHUB\Location\LocationUpdateRequest;

class LocationController extends Controller {

  /**
  **************************************************
  * @return Authentication
  * @return Auto-Configurations
  **************************************************
  **/

  public function __construct() {
    $this->middleware('auth');
    $this->url = '/dashboard/dishub/locations';
    $this->path = 'pages.backend.main.dishub.location';
    $this->model = 'App\Models\Backend\Main\DISHUB\Location';
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index(Request $request) {
    $activity = Activity::where('subject_type', $this->model)->orderBy('created_at', 'desc')->take(5)->get();
    $data = $this->model::select('*');
    if(request()->ajax()) {
      return DataTables::eloquent($data)
      ->addColumn('action', 'includes.datatable.action')
      ->addColumn('checkbox', 'includes.datatable.checkbox')
      ->rawColumns(['action', 'checkbox'])
      ->addIndexColumn()
      ->make(true);
    }

    return view($this->path . '.index', compact('activity'));
  }

  /**
  **************************************************
  * @return Show
  **************************************************
  **/

  public function show($id) {
    $data = $this->model::findOrFail($id);
    return view($this->path . '.show', compact('data'));
  }

  /**
  **************************************************
  * @return Create
  **************************************************
  **/

  public function create() {
    $path = $this->path;
    return view($this->path . '.create', compact('path'));
  }

  /**
  **************************************************
  * @return Store
  **************************************************
  **/

  public function store(LocationStoreRequest $request) {
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', trans('notification.success.create'));
  }

  /**
  **************************************************
  * @return Edit
  **************************************************
  **/

  public function edit($id) {
    $path = $this->path;
    $data = $this->model::findOrFail($id);
    return view($this->path . '.edit', compact('path', 'data'));
  }

  /**
  **************************************************
  * @return Update
  **************************************************
  **/

  public function update(LocationUpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', trans('notification.success.edit'));
  }

  /**
  **************************************************
  * @return Destroy
  **************************************************
  **/

  public function destroy($id) {
    $this->model::destroy($id);
    return redirect($this->url)->with('success', trans('notification.success.delete'));
  }

  /**
  **************************************************
  * @return Enable
  * @return Disable
  **************************************************
  **/

  public function enable($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 1 ]);
    return Response::json($data);
  }

  public function disable($id) {
    $data = $this->model::where('id', $id)->update([ 'active' => 2 ]);
    return Response::json($data);
  }

  /**
  **************************************************
  * @return Delete
  **************************************************
  **/

  public function delete($id) {
    $data = $this->model::where('id',$id)->delete();
    return Response::json($data);
  }

  /**
  **************************************************
  * @return Delete-All
  **************************************************
  **/

  public function deleteall(Request $request)
  {
    $exilednoname = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$exilednoname))->delete();
    return Response::json($exilednoname);
  }

}

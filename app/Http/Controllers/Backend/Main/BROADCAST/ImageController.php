<?php

namespace App\Http\Controllers\Backend\Main\BROADCAST;

use Auth;
use DataTables;
use Redirect,Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use App\Http\Requests\Backend\Main\BROADCAST\Image\ImageStoreRequest;
use App\Http\Requests\Backend\Main\BROADCAST\Image\ImageUpdateRequest;

class ImageController extends Controller {

  /**
  **************************************************
  * @return Authentication
  * @return Auto-Configurations
  **************************************************
  **/

  public function __construct() {
    $this->middleware('auth');
    $this->url = '/dashboard/broadcast/images';
    $this->path = 'pages.backend.main.broadcast.image';
    $this->model = 'App\Models\Backend\Main\BROADCAST\Image';
  }

  /**
  **************************************************
  * @return Index
  **************************************************
  **/

  public function index(Request $request) {
    $data = $this->model::select('*');
    if(request()->ajax()) {
      return DataTables::eloquent($data)
      ->addColumn('action', 'includes.datatable.action')
      ->addColumn('checkbox', 'includes.datatable.checkbox')
      ->rawColumns(['action', 'checkbox'])
      ->addIndexColumn()
      ->make(true);
    }

    return view($this->path . '.index', compact('model'));
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

  public function store(ImageStoreRequest $request) {
    $image = time() . "_" . $request->file('image')->getClientOriginalName();
    $destination = base_path() . '/public/files/broadcast/images';
    $request->file('image')->move($destination, $image);

    $this->model::create([
      'name' => $request->name,
      'path' => $image,
      'description' => $request->description,
      'created_by' => $request->created_by,
    ]);

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

  public function update(ImageUpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);

    if ( $request->file('image')) {
      $image = time() . "_" . $request->file('image')->getClientOriginalName();
      $destination = base_path() . '/public/files/broadcast/images';
      $request->file('image')->move($destination, $image);

      $this->model::where('id', $id)->update([
        'name' => $request->name,
        'path' => $image,
        'description' => $request->description,
        'updated_by' => $request->updated_by,
      ]);
    }
    else {
      $this->model::where('id', $id)->update([
        'name' => $request->name,
        'description' => $request->description,
        'updated_by' => $request->updated_by,
      ]);
    }

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
    $this->model::destroy($id);
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

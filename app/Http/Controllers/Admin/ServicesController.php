<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ServiceCreateRequest  as CreateRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest  as UpdateRequest;
use App\Http\Resources\Admin\ServiceListResource  as ListResource;
use App\Http\Resources\Admin\ServiceSingleResource  as SingleResource;
use App\Models\Service as Model;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Log;

class ServicesController extends Controller
{
    public $path = 'services';

    /**
    * Get All Records
    * @return \Illuminate\Http\JsonResponse
    */

    public function index()
    {
        try {
            // dd('dd');
            $data = Model::latest()->get();
            // dd($data);
            $records = ListResource::collection($data);
            // dd($records);
            return view($this->path.'.list', compact('records'));
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
    * Get Single Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function show($id)
    {
        try {
            $data = Model::find($id);
            if ($data){
            $record = new SingleResource($data);
                return view($this->path.'.show',compact(['record']));
            }else {
                 return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceProviders = ServiceProvider::get();
        return view($this->path.'.add-edit',compact('serviceProviders'));
    }

    /**
    * Create a New Record
    * @param CreateRequest $request
    * @return \Illuminate\Http\JsonResponse
    */

    public function store(CreateRequest $request)
    {
        try {
            $request_data = $request->except(['image']);
            if($request->image)
            {
                $request_data['image'] = uploadImage($request->file('image'),$this->path);
            }
            Model::create($request_data);
            return redirect()->route('services.index')->with('success','Created Successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
           $record = Model::find($id);
        $serviceProviders = ServiceProvider::get();

            if ($record){
                return view($this->path.'.add-edit',compact(['record','serviceProviders']));
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
    * Update Record
    * @param UpdateRequest $request, $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $request_data = $request->except(['image']);
            if($request->image)
            {
                $request_data['image'] = uploadImage($request->file('image'),$this->path);
            }
            $record = Model::find($id);
            if ($record){
                $record->update($request_data);
                return redirect('/'.$this->path)->with('success','Updated Successfully');
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
    * Delete Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function destroy($id)
    {
        try {
            $record = Model::find($id);
            if ($record){
                $record->delete();
                return redirect()->back()->with('success','Deleted Successfully');
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }


    /**
    * List Trashed Records
    * @return \Illuminate\Http\JsonResponse
    */
    public function trashed()
    {
        try {
            $data = Model::onlyTrashed()->get();
            $records = ListResource::collection($data);
            return view($this->path.'.list'.'/trashed', compact('records'));
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

    /**
    * Restore Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function restore($id)
    {
        try {
            $record = Model::onlyTrashed()->find($id);
            if ($record){
                $record->restore();
                return redirect('/'.$this->path.'/trashed')->with('success','Restored Successfully');
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }


    /**
    * Change Statues Of Record
    * @param $id
    * @return \Illuminate\Http\JsonResponse
    */
    public function changeStatues($id)
    {
        try {
            $record = Model::find($id);
            if ($record){
                $record->active = !$record->active;
                $record->save();
                return redirect()->back()->with('success','Statues Changed Successfully');
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }

}

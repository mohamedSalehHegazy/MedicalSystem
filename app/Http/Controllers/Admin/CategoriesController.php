<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest  as CreateRequest;
use App\Http\Requests\Admin\CategoryCreateRequest  as UpdateRequest;
use App\Http\Resources\Admin\CategoryListResource  as ListResource;
use App\Http\Resources\Admin\CategorySingleResource  as SingleResource;
use App\Models\Category  as Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriesController extends Controller
{
    public $path = 'categories';

    /**
    * Get All Records
    * @return \Illuminate\Http\JsonResponse
    */

    public function index()
    {
        try {
            $data = Model::latest()->get();
            $records = ListResource::collection($data);
            return view($this->path.'.list', compact('records'));
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
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
                 return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->path.'.add-edit');
    }

    /**
    * Create a New Record
    * @param CreateRequest $request
    * @return \Illuminate\Http\JsonResponse
    */

    public function store(CreateRequest $request)
    {
        try {
            if($request->hasFile('icon'))
                $file = $request->file('icon');
                $image = uploads_img($file,'admin/uploads/categories/');
                // dd($image);
                Model::create([
                'icon'=>$image,
                'name_en'=>$request->name_en,
                'name_ar'=>$request->name_ar,
            ]);
            return redirect('admin/'.$this->path)->with('success','Created Successfully');
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
           $record = Model::find($request->id);
            if ($record){
                return view($this->path.'.add-edit',compact(['record']));
            }else {
                return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
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
            $record = Model::find($id);
            if ($record){
                $record->update($request->all());
                return redirect('admin/'.$this->path)->with('success','Updated Successfully');
            }else {
                return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
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
                return redirect('admin/'.$this->path)->with('success','Deleted Successfully');
            }else {
                return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
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
            return view('layouts.wrong');
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
                return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
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
                return redirect('admin/'.$this->path)->with('success','Statues Changed Successfully');
            }else {
                return redirect('admin/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.wrong');
        }
    }

}

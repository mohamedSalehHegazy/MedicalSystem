<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ServiceProvider  as Model;
use App\Http\Resources\Admin\ServiceProviderListResource  as ListResource;
use App\Http\Resources\Admin\ServiceProviderSingleResource  as SingleResource;
use App\Http\Requests\Admin\ServiceProviderCreateRequest as CreateRequest;
use App\Http\Requests\Admin\ServiceProviderUpdateRequest  as UpdateRequest;
use Illuminate\Http\Response;

class ServiceProviderController extends Controller
{
    /**
    * Get All Records
    * @return \Illuminate\Http\JsonResponse
    */

    public function index()
    {
        try {
            $records = Model::latest()->get();
            return response()->json([
                'success' => true,
                'data' => ListResource::collection($records)
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
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
            $record = Model::find($id);
            if ($record){
                return response()->json([
                    'success' => true,
                    'data' => new SingleResource($record)
                ]);
            }else {
            return response()->json([
                'message' => 'Not Found !'
            ],response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
    * Create a New Record
    * @param CreateRequest $request
    * @return \Illuminate\Http\JsonResponse
    */

    public function store(CreateRequest $request)
    {
        try {
            if($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/admin/serviceProvider'),$fileName);
            }
            $record = Model::create([
              //type model fields ex('name' => $request->name)
              'name_ar'=>$request->name_ar,
              'name_en'=>$request->name_en,
              'address'=>$request->address,
              'logo'=>$fileName,
              'lat'=>$request->lat,
              'long'=>$request->long,
              'category_id'=>$request->category_id,


            ]);
            return response()->json([
                'message' => 'Created Successfully',
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
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
                if($request->hasFile('logo')) {
                    $file = $request->file('logo');
                    @unlink(public_path('uploads/admin/serviceProvider/'.$record->logo));
                    $fileName = date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('uploads/admin/serviceProvider'),$fileName);
                    $record->logo = $fileName;
                }
                $record->update([
                    //type model fields ex('name' => $request->name)
                    'name_ar'=>$request->name_ar,
                    'name_en'=>$request->name_en,
                    'address'=>$request->address,
                    'logo'=>$fileName,
                    'lat'=>$request->lat,
                    'long'=>$request->long,
                    'category_id'=>$request->category_id,
                    'logo'=>$request->logo,

                ]);
                return response()->json([
                    'message' => 'Updated Successfully',
                ]);
            }else {
            return response()->json([
                'message' => 'Not Found !'
            ],response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
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
                @unlink(public_path('uploads/admin/serviceProvider/'.$record->logo));
                $record->delete();
                return response()->json([
                    'message' => 'Deleted Successfully',
                ]);
            }else {
            return response()->json([
                'message' => 'Not Found !'
            ],response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
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
                return response()->json([
                    'message' => 'Restored Successfully',
                ]);
            }else {
            return response()->json([
                'message' => 'Not Found !'
            ],response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
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
                return response()->json([
                    'message' => 'Statues Changed Successfully',
                ]);
            }else {
            return response()->json([
                'message' => 'Not Found !'
            ],response::HTTP_BAD_REQUEST);
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json([
                'message' => 'Some Thing Went Wrong !'
            ],response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Service  as Model;
use App\Http\Resources\Admin\ServiceListResource  as ListResource;
use App\Http\Resources\Admin\ServiceSingleResource  as SingleResource;
use App\Http\Requests\Admin\ServiceCreateRequest  as CreateRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest  as UpdateRequest;
use Illuminate\Http\Response;

class ServiceController extends Controller
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
            $record = Model::create([
                'name_en'=>$request->name_en,
                'name_ar'=>$request->name_ar,
                'description_en'=>$request->description_en,
                'description_ar'=>$request->description_ar,
                'image'=>$request->image,
                'price'=>$request->price,
                'service_provider_id'=>$request->service_provider_id,
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
                $record->update([
                    'name_en'=>$request->name_en,
                    'name_ar'=>$request->name_ar,
                    'description_en'=>$request->description_en,
                    'description_ar'=>$request->description_ar,
                    'image'=>$request->image,
                    'price'=>$request->price,
                    'service_provider_id'=>$request->service_provider_id,
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

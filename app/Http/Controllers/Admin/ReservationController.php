<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReservationListResource as ListResource;
use App\Models\Reservation  as Model;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    public $path = 'reservations';
    
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
                return redirect('/'.$this->path)->with('success','Statues Changed Successfully');
            }else {
                return redirect('/'.$this->path)->with('error','Not Found');
            }
        } catch (\Throwable $th) {
            Log::error($th);
            return view('layouts.500');
        }
    }
}

@extends('layouts.app')
@section('content')
@php
$flag = 0;
if(isset($record))
$flag=1;
@endphp
@include('layouts.success')
@include('layouts.error')
<form method="post" class="w-75 mx-auto mt-5 pb-3"
    action="{{$flag ? url('admin/services/'.$record->id) : route('services.store')}}"
    enctype="multipart/form-data">
    {{csrf_field()}}
    @if($flag)
    @method('PUT')
    @endif
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Name EN</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter EN Name" name = "name_en" value="{{$flag ? $record->name_en : old('name_en')}}" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Name AR</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter AR Name" name = "name_ar" value="{{$flag ? $record->name_ar : old('name_ar')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Description En</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description_en" name = "description_en" value="{{$flag ? $record->description_en : old('description_en')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Description Ar</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter description_ar" name = "description_ar" value="{{$flag ? $record->description_ar : old('description_ar')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Price</label>
        <input disabled type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter price" name = "price" value="{{$flag ? $record->price : old('price')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Image </label>
        <img src="{{ $flag ? $record->image : old('image') }}" height="200px" width="200px" >
    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1"> Service Provider </label>
    <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter service_provider_id" name = "service_provider_id" value="{{$flag ? $record->service_provider['name_'.app()->getLocale()] : old('service_provider_id')}}" required>
    </div>

    @if ($flag)
        <input type="hidden" value="{{$record->id}}" name="id">
    @endif

</form>
@endsection

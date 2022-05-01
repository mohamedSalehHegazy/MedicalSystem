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
    action="{{$flag ? url('admin/serviceProviders/'.$record->id) : route('serviceProviders.store')}}"
    enctype="multipart/form-data">
    {{csrf_field()}}
    @if($flag)
    @method('PUT')
    @endif
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Name EN</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter EN Name" name = "name_en" value="{{$flag ? $record->name_en : old('name_en')}}" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Name AR</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter AR Name" name = "name_ar" value="{{$flag ? $record->name_ar : old('name_ar')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter address" name = "address" value="{{$flag ? $record->address : old('address')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> lat</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter lat" name = "lat" value="{{$flag ? $record->lat : old('address')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> long</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter long" name = "long" value="{{$flag ? $record->long : old('address')}}" required>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1"> Logo </label>
        <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "logo" value="{{$flag ? $record->logo : old('logo')}}" required>
        <img src="{{ $flag ? $record->logo : old('logo') }}" height="200px" width="200px" >

    </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1"> Category </label>
    <select class="form-control" name="category_id">
        @foreach($categories as $category)
        <option value=""> </option>
        <option value="{{ $category->id }}">{{ $category["name_".app()->getLocale()]  }}</option>
        @endforeach
    </select>
    </div>

    @if ($flag)
        <input type="hidden" value="{{$record->id}}" name="id">
    @endif
    <div class="form-group row mt-md-5">
        <div class="col-12 col-lg-10 ml-0 ml-lg-5">
            <button type="submit" class="btn btn-primary btn-block">{{$flag ? 'Update' : 'Add'}}</button>
        </div>
    </div>
</form>
@endsection

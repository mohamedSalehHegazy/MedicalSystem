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
    action="{{$flag ? route('contracts.update') : route('contracts.store')}}"
    enctype="multipart/form-data">
    {{csrf_field()}}
@foreach ($columns as $col)
    @if ($col == 'client_id' )
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Client</label>
        <select class="form-control" id="exampleFormControlSelect1" name="client_id">
            <option> </option>
            @for($i = 0; $i < count($clients) ; $i++))
            <option value="{{$clients[$i]->id}}" >{{$clients[$i]->name }}</option>
            @endfor
        </select>
    </div>
    @else
    @endif
    @if ($col == 'status_id' )
    <div class="form-group">
        <label for="exampleFormControlSelect1"> Status</label>
        <select class="form-control" id="exampleFormControlSelect1" name="status_id">
            <option> </option>
            @for($i = 0; $i < count($statuses) ; $i++))
            <option value="{{$statuses[$i]->id}}" >{{$statuses[$i]->status }}</option>
            @endfor
        </select>
    </div>
    @else

    @endif
    @if ($col == 'last_contact' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Last Contact</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "last_contact" value="{{$flag ? $record->last_contact : old('last_contact')}}" required>
    </div>
    @else
    @endif
    @if ($col == 'next_contact' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Next Contact</label>
        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "next_contact" value="{{$flag ? $record->next_contact : old('next_contact')}}" required >
    </div>
    @else
    @endif
    @if ($col == 'next_action' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Next Action</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "next_action" value="{{$flag ? $record->next_action : old('next_action')}}">
    </div>
    @else
    @endif
    @if ($col == 'vendor_link')
    <div class="form-group">
        <label for="exampleInputEmail1"> Vendor Link</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "vendor_link" value="{{$flag ? $record->vendor_link : old('vendor_link')}}" >
    </div>
    @else
    @endif
    @if ($col == 'contract')
    <div class="form-group">
        <label for="exampleInputEmail1"> Contract </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "contract" value="{{$flag ? $record->contract : old('contract')}}" >
    </div>
    @else
    @endif
    @if ($col == 'cs_call')
    <div class="form-group">
        <label for="exampleInputEmail1"> CS Call</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "cs_call" value="{{$flag ? $record->cs_call : old('cs_call')}}" >
    </div>
    @else
    @endif
    @if ($col == 'feedback')
    <div class="form-group">
        <label for="exampleInputEmail1"> Feedback</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "feedback" value="{{$flag ? $record->feedback : old('feedback')}}" >
    </div>
    @else
    @endif
    @if ($col == 'content')
    <div class="form-group">
        <label for="exampleInputEmail1"> Content </label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name = "content" value="{{$flag ? $record->content : old('content')}}" >
    </div>
    @else
    @endif
@endforeach
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
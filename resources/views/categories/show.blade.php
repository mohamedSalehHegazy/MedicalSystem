@extends('layouts.app')
@section('content')
@foreach ($columns as $col)
    @if ($col == 'client_id' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Client </label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{$record->seller->name}}" >
    </div>
    @else
    @endif
    @if ($col == 'status' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Status</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->status->status}}" >
    </div>
    @else
    @endif
    @if ($col == 'last_contact' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Last Contact</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->last_contact}}" >
    </div>
    @else
    @endif
    @if ($col == 'next_contact' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Next Contact</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->next_contact}}">
    </div>
    @else
    @endif
    @if ($col == 'client_id' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Next Action</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->next_action}}">
    </div>
    @else
    @endif
    @if ($col == 'vendor_link' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Vendor Link</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->vendor_link}}" >
    </div>
    @else
    @endif
    @if ($col == 'contract' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Contract </label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->contract}}" >
    </div>
    @else
    @endif
    @if ($col == 'cs_call' )
    <div class="form-group">
        <label for="exampleInputEmail1"> CS Call</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->cs_call}}" >
    </div>
    @else
    @endif
    @if ($col == 'feedback' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Feedback</label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->feedback}}" >
    </div>
    @else
    @endif
    @if ($col == 'content' )
    <div class="form-group">
        <label for="exampleInputEmail1"> Content </label>
        <input disabled type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{$record->content}}" >
    </div>
    @else
    @endif 
@endforeach
@endsection

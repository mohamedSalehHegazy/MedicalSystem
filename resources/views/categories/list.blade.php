@extends('layouts.app')
@section('content')
                    <div class="row">
                        <div class="col-10 m-1">
                            <a href="{{url('contracts/create')}}" class="btn btn-success mb-4 mt-2"><i class = "fa fa-plus"></i> Add New </a>  
                        </div>
                        @include('layouts.success')
                        @include('layouts.error')
                    @if($records->count() == 0)
                        <div class="col-12">
                            <p class="alert alert-warning text-dark"> No Data Available</p>
                        </div>
                    @else
                    <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                        <th scope="col">Client</th>
                        <th scope="col">Agent</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($records as $record)
                        <td>{{$record->seller->name}}</td>
                        <td>{{$record->user->name}}</td>
                        <td>{{$record->status->status}}</td>
                        <td>
                        <div class="row">
                            <div class="col-10 col-md-3">
                                <!-- Delete Button -->
                                <form method="post" action="{{route('contracts.destroy')}}"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{$record->id}}" name="id">
                                    <button type="submit" class="btn btn-danger mt-1"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                            <div class="col-10 col-md-3">
                                <!-- Edit Button -->
                                <form method="post" 
                                    action= "{{route('contracts.edit')}}"
                                    enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        @method('get')
                                        <input type="hidden" value="{{$record->id}}" name="id">
                                        <button type="submit" class="btn btn-secondary mt-1"><i class="far fa-edit"></i></button>
                                </form>
                            </div>
                            <div class="col-10 col-md-3">
                                <!-- Show Button -->
                                <form method="post" 
                                    action= "{{route('contracts.show')}}"
                                    enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        @method('get')
                                        <input type="hidden" value="{{$record->id}}" name="id">

                                        <button type="submit" class="btn btn-primary mt-1"><i class="fas fa-eye"></i></button>
                                </form>
                            </div>
                        </div>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                </div>
                @endif
@endsection
@extends('layouts.app')
@section('content')
                    <div class="row">
                        <div class="col-10 m-1">
                            <a href="{{route('categories.create')}}" class="btn btn-success mb-4 mt-2"><i class = "fa fa-plus"></i> Add New </a>  
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
                        <th scope="col"># </th>
                        <th scope="col">Name EN</th>
                        <th scope="col">Name AR</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Parent Category</th>
                        <th scope="col">Need Delivery</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($records as $record)
                        <td>{{$record->id}}</td>
                        <td>{{$record->name_en}}</td>
                        <td>{{$record->name_ar}}</td>
                        <td>{{$record->icon}}</td>
                        <td>{{$record->parent_category}}</td>
                        <td>{{$record->need_delivery}}</td>
                        <td>{{$record->active}}</td>
                        <td>
                        <div class="row">
                            <div class="col-10 col-md-3">
                                <!-- Delete Button -->
                                <form method="post" action="{{url('admin/categories/'.$record->id)}}"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    @method('delete')
                                    <input type="hidden" value="{{$record->id}}" name="id">
                                    <button type="submit" class="btn btn-danger mt-1"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </div>
                            <div class="col-10 col-md-3">
                                <!-- Edit Button -->
                                <form method="post" 
                                    action= "{{route('categories.edit')}}"
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
                                    action= "{{url('admin/categories/'.$record->id)}}"
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
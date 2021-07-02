@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                <div class="align-middle"><h5 >Gallery</h5></div>

                <a href="{{route('show.imageAdd')}}" class="btn btn-success">Add Image</a>
                </div>

                <div class="card-body">
                    @if(session()->has('message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session()->get('message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif
                    

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Created On</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($gallery as $index => $image)
                          <tr>
                            <th scope="row" class="align-middle">{{$index + 1}}</th>
                            <td>
                              <img src="{{asset('gallery/').'/'.$image->image}}" class="img-fluid img-thumbnail" alt="{{$image->image}}" width="150">
                            </td>
                            
                            <td class="align-middle">{{Carbon\Carbon::parse($image->created_at)->format('M d, Y h:i A')}}</td>
                            <td class="align-middle">
                                <a href="{{route('show.editImage',$image->id)}}" class="btn btn-primary active">Edit</a>
                                <a href="{{route('delete.Image',$image->id)}}" class="btn btn-danger active">Delete</a>

                            </td>
                          </tr>

                        @empty
                            <tr>
                              

                              <td colspan="9" class="text-center">No Image found!</td>

                            </tr>
                        @endforelse
                        
                      </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

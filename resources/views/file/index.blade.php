@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>File</h5>
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
                    <form action="{{route('update.file')}}" method="post">
                      @csrf
                      <div class="row">

                         <div class="col-md-12">
                          <div class="form-group">
                            <label for="text">You can update the file content here</label>
                            <textarea class="form-control" id="text" rows="3" name="text">{{$contents}}</textarea>
                          </div>
                        </div>


                        <div class="col-md-12 text-right mt-4">

                          <a href="{{route('home')}}" class="btn btn-success">Cancel</a>
                          <button class="btn btn-primary" type="submit">Submit</button>

                        </div>


                      </div>


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

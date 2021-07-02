@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>Update Image</h5>
                </div>

                <div class="card-body">
                    <form action="{{route('update.Image')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="row">

                        <div class="col-md-12 text-center mb-4 mt-2">
                            <img src="{{asset('gallery/').'/'.$gallery->image}}" class="img-fluid img-thumbnail" alt="{{$gallery->image}}" width="300">
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="file">Select an Image</label>
                            <input type="file" class="form-control-file  @error('file') is-invalid @enderror" id="file" name="file" >
                            @error('file')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                          
                        </div>

                        <input type="hidden" name="image_id" value="{{$gallery->id}}">

                      </div>

                        <div class="col-md-12 text-right mt-4">

                          <a href="{{route('gallery')}}" class="btn btn-success">Cancel</a>
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

@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div> -->

        <div class="col-md-8">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                  <h5>Add Students</h5>
                </div>

                <div class="card-body">
                    <form action="{{route('create.student')}}" method="post">
                      @csrf
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{old('name')}}">
                            @error('name')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Term</label>
                            <select class="form-control" id="" name="term">
                              
                              <option value="One" @if(old('term') == 'One') selected @endif>One</option>
                              <option value="Two" @if(old('term') == 'Two') selected @endif>Two</option>
                              <option value="Three" @if(old('term') == 'Three') selected @endif>Three</option>
                              <option value="Four" @if(old('term') == 'Four') selected @endif>Four</option>
                              <option value="Five" @if(old('term') == 'Five') selected @endif>Five</option>
                            </select>
                            @error('term')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-12">
                          <label>Subject Marks</label>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control @error('physics') is-invalid @enderror" placeholder="Enter Physics Mark" name="physics" value="{{old('physics')}}">
                            @error('physics')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control  @error('chemistry') is-invalid @enderror" placeholder="Enter Chemistry Mark" name="chemistry" value="{{old('chemistry')}}">
                            @error('chemistry')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <input type="number" class="form-control @error('biology') is-invalid @enderror" placeholder="Enter Biology Mark" name="biology" value="{{old('biology')}}">
                            @error('biology')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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

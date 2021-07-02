@extends('layouts.app')

@section('content')

@php


@endphp
<div class="container">
    <div class="row justify-content-center">
        

        <div class="col-md-12">
            <div class="card">

                <div class="card-header d-flex justify-content-between align-middle">
                <div class="align-middle"><h5 >Students</h5></div>

                <a href="{{route('create.show')}}" class="btn btn-success">Add</a>
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
                          <th scope="col">Name</th>
                          <th scope="col">Physics</th>
                          <th scope="col">Chemistry</th>
                          <th scope="col">Biology</th>
                          <th scope="col">Term</th>
                          <th scope="col">Total Marks</th>
                          <th scope="col">Created On</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @forelse($students as $index => $student)
                          <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->physics}}</td>
                            <td>{{$student->chemistry}}</td>
                            <td>{{$student->biology }}</td>
                            <td>{{$student->term}}</td>
                            <td>{{$student->total}}</td>
                            <td>{{Carbon\Carbon::parse($student->created_at)->format('M d, Y h:i A')}}</td>
                            <td>
                                <a href="{{route('edit.show',$student->id)}}" class="btn btn-primary active">Edit</a>
                                <a href="{{route('delete.student',$student->id)}}" class="btn btn-danger active">Delete</a>

                            </td>
                          </tr>

                        @empty
                            <tr>
                              

                              <td colspan="9" class="text-center">No Student found!</td>

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

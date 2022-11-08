@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                @endif
                <form action="{{route('role.store')}}" method="post">
             @csrf
                    <div class="card">
                    <div class="card-header">{{ __('Create Role') }}
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <lavel>Name</lavel>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>   <div class="alert alert-danger">
                        {{$message}}
                                 </div></strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <lavel>Description</lavel>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>
                                  <div class="alert alert-danger">
                                   {{$message}}
                                 </div>
                                </strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

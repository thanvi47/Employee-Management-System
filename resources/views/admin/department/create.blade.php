@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                <form action="{{route('department.store')}}" method="post">
             @csrf
                    <div class="card">
                    <div class="card-header">{{ __('Create Department') }}</div>

                    <div class="card-body">

                        <div class="form-group">
                            <lavel>Name</lavel>

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <lavel>Description</lavel>
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror">
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
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

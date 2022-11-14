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
                <form action="{{route('notice.store')}}" method="post">
             @csrf
                    <div class="card">
                    <div class="card-header">{{ __('Create New Notice') }}
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <lavel>Title</lavel>

                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
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
                                        <strong>   <div class="alert alert-danger">
                                   {{$message}}
                                 </div></strong>
                                    </span>
                            @enderror
                        </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{old('date')}}">
                                @error('date')
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
                                <label>Created By</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                                @error('name')
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

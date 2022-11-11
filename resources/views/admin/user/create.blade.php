@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
            @if(session('error'))
            <div class="alert alert-warning">
                {{session('error')}}
            </div>
        @endif
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Register employee

                </li>
            </ol>
        </nav>
        <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data" >@csrf

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">General Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>First name</label>
                                <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" value="{{old('firstname')}}">
                                @error('firstname')
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
                                <label>Last name</label>
                                <input type="text" name="lastname" class="form-control  @error('lastname') is-invalid @enderror" value="{{old('lastname')}}">
                                @error('lastname')
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
                                <label>Address</label>
                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" value="{{old('address')}}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                <strong>
                                  <div class="alert alert-danger">
                                   {{$message}}
                                 </div>
                                </strong>
                            </span>
                                @enderror </div>

                            <div class="form-group">
                                <label>Mobile number </label>
                                <input type="number" name="mobile_number" class="form-control  @error('mobile_number') is-invalid @enderror" value="{{old('mobile_number')}}">
                                @error('mobile_number')
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
                                <label>Department</label>
                                <select class="form-control  @error('department_id') is-invalid @enderror" name="department_id"  >
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach

                                </select>
                                @error('department_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>
                                            <div class="alert alert-danger">{{$message}}</div>
                                        </strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror" value="{{old('designation')}}">
                              @error('designation')
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
                                <label>Start date</label>
                                <input type="date" name="start_form" class="form-control  @error('start_form') is-invalid @enderror" placeholder="dd-mm-yyyy" value="{{old('start_form')}}">
                                @error('start_form')
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
                                <label>Image</label>
                                <input type="file" name="image" class="form-control  @error('image') is-invalid @enderror" value="{{old('image')}}">
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                <strong>
                                  <div class="alert alert-danger">
                                   {{$message}}
                                 </div>
                                </strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Login Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Email </label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{old('email')}}" >
                                @error('email')
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
                                <label>Password</label>
                                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" value="{{old('password')}}" >
                                @error('password')
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
                                <label>Role</label>
                                <select class="form-control  @error('role_id') is-invalid @enderror" name="role_id" >
                                    <option value="">Select Role</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach

                                </select>
                                @error('role_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>
                                  <div class="alert alert-danger">
                                   {{$message}}
                                 </div>
                                </strong>
                            </span>
                                @enderror
                            </div>

                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-outline-primary " type="submit">Submit</button>
                    </div>
                </div>

            </div>
        </form>
    </div>

@endsection

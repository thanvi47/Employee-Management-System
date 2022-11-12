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
                <li class="breadcrumb-item active" aria-current="page">Edit Leave

                </li>
            </ol>
        </nav>
        <form action="{{route('leave.update',$leave->id)}}" method="post" enctype="multipart/form-data" >@csrf
        @method('PUT')
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">General Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Start From</label>
                                <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" value="{{$leave->from}}">
                                @error('from')
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
                                <label>To Date</label>
                                <input type="date" name="to" class="form-control  @error('to') is-invalid @enderror" value="{{$leave->to}}">
                                @error('to')
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
                                <label>Type of Leave</label>
                                <select name="type" class="form-control  @error('type') is-invalid @enderror">
                                    <option @if($leave->type=='annualleave') selected @endif value="annualleave">Annual Leave</option>
                                    <option @if($leave->type=='sickleave') selected @endif value="sickleave">Sick Leave</option>
                                    <option @if($leave->type=='parentalleave') selected @endif  value="parentalleave">Parental Leave</option>
                                    <option @if($leave->type=='otherleave') selected @endif  value="otherleave">Other Leave</option>
                                </select>
{{--                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" value="{{old('address')}}">--}}
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                <strong>
                                  <div class="alert alert-danger">
                                   {{$message}}
                                 </div>
                                </strong>
                            </span>
                                @enderror </div>


                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" value="{{$leave->description}}" >
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
                                <button class="btn btn-outline-primary " type="submit">Submit</button>
                            </div>
                        </div>


                    </div>

                </div>

            </div>
        </form>

    </div>

@endsection

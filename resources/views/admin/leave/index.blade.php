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
                <li class="breadcrumb-item active" aria-current="page">Create Leave

                </li>
            </ol>
        </nav>
         <form action="{{route('leave.store')}}" method="post" enctype="multipart/form-data" >@csrf

{{--            <div class="row justify-content-center">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">General Information</div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Start From</label>--}}
{{--                                <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" value="{{old('form')}}">--}}
{{--                                @error('from')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>--}}
{{--                                  <div class="alert alert-danger">--}}
{{--                                   {{$message}}--}}
{{--                                 </div>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>To Date</label>--}}
{{--                                <input type="date" name="to" class="form-control  @error('to') is-invalid @enderror" value="{{old('to')}}">--}}
{{--                                @error('to')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>--}}
{{--                                  <div class="alert alert-danger">--}}
{{--                                   {{$message}}--}}
{{--                                 </div>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label>Type of Leave</label>--}}
{{--                                <select name="type" class="form-control  @error('type') is-invalid @enderror">--}}
{{--                                    <option value="annualleave">Annual Leave</option>--}}
{{--                                    <option value="sickleave">Sick Leave</option>--}}
{{--                                    <option value="parentalleave">Parental Leave</option>--}}
{{--                                    <option value="otherleave">Other Leave</option>--}}
{{--                                </select>--}}
{{--                                <input type="text" name="address" class="form-control  @error('address') is-invalid @enderror" value="{{old('address')}}">--}}
{{--                                @error('type')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>--}}
{{--                                  <div class="alert alert-danger">--}}
{{--                                   {{$message}}--}}
{{--                                 </div>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                @enderror </div>--}}


{{--                            <div class="form-group">--}}
{{--                                <label>Description</label>--}}
{{--                                <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" value="{{old('description')}}" >--}}
{{--                                @error('description')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>--}}
{{--                                  <div class="alert alert-danger">--}}
{{--                                   {{$message}}--}}
{{--                                 </div>--}}
{{--                                </strong>--}}
{{--                            </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <button class="btn btn-outline-primary " type="submit">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}
        </form>

            <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>From Date</th>
                    <th>To</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Reply</th>
                    <th>Status</th>
                    <th>Approve/Reject</th>

                </tr>
                </thead>
                <tbody>
                @foreach($leaves as $key=>$leave)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$leave->user->name}}</td>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}} </td>
                        <td>{{$leave->description}} </td>
                        <td>{{$leave->type}} </td>
                        <td>{{$leave->message}} </td>
                        <td>
                            @if($leave->status==0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif($leave->status==1) <span class="badge badge-success">Accept</span>
                            @else
                            <span class="badge badge-danger">Reject</span>
                            @endif</td>

                        <td>
{{--                            @if(isset(auth()->user()->role->permissions['name']['department']['can-delete']))--}}
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$leave->id}}">
                                <i class="fas fa-accusoft text-info">Approve/Reject</i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$leave->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('accept.reject',$leave->id)}}" method="post">@csrf

                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <label for="">Status</label>
                                                <div class="form-group">
                                                <select class="form-control" name="status">
                                                    <option value="0">Pending</option>
                                                    <option value="3">Reject</option>
                                                    <option value="1">Accept</option>

                                                </select>
                                                </div>
                                                <lable>Message</lable>
                                                <div class="form-group">
                                                    <input type="text" name="message"class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
            @endforeach
                </tbody>

            </table>
    </div>

@endsection

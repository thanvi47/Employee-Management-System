@extends('admin.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Employee</li>
                    </ol>
                </nav>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Start Date</th>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            <img src="{{asset('profile')}}/{{$user->image}}" alt="" width="100">
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>  {{$user->department->name ?? ''}} </td>

                        <td>{{$user->designation}}</td>
                        <td>{{$user->mobile_number}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->start_form}}</td>
                        <td> <span  class="badge badge-success">{{$user->role->name ?? ''}}</span></td>
{{--                        <td></span></td>--}}
                        <td>
                            @if(isset(auth()->user()->role->permissions['name']['user']['can-edit']))
                        <a href="{{route('user.edit',$user->id)}} "  > <i class="fas fa-edit">Edit</i></a>@endif
                        </td>

                        <td>
                            @if(isset(auth()->user()->role->permissions['name']['user']['can-delete']))
                            <a href="#" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                <i class="fas fa-trash text-danger">Delete</i>
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">@csrf
                                        {{method_field('DELETE')}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!--Modal end-->

                            @endif
                        </td>


                    </tr>
                    @endforeach






                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

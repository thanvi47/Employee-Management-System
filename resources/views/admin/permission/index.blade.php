@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
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
                    <ol class="breadcrumb-item active" aria-current="page">
                        All Permissions
                    </ol>

                </nav>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sn</th>
                        <th>Name</th>
{{--                        <th>Description</th>--}}
                        <th>Edit</th>

                        <th>Delete</th>
                    </tr>
                    </thead>
                    {{--                        <tfoot>--}}
                    {{--                        <tr>--}}
                    {{--                            <th>Name</th>--}}
                    {{--                            <th>Position</th>--}}
                    {{--                            <th>Office</th>--}}
                    {{--                            <th>Age</th>--}}
                    {{--                            <th>Start date</th>--}}
                    {{--                            <th>Salary</th>--}}
                    {{--                        </tr>--}}
                    {{--                        </tfoot>--}}
                    <tbody>
                    @foreach($permissions as $key=>$permission)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$permission->role->name}}</td>
{{--                            <td>{{$department->description}} </td>--}}
                            <td>
                                @if(isset(auth()->user()->role->permissions['name']['permission']['can-edit']))
                                <a href="{{route('permission.edit',$permission->id)}} "  class="btn btn-outline-primary"> <i class="fas fa-edit">Edit</i></a>@endif</td>
                            <td>
                                @if(isset(auth()->user()->role->permissions['name']['permission']['can-delete']))
                                <form action="{{route('permission.destroy',$permission->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger"  type="submit"><i class="fas fa-trash"> Delete </i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    {{--                        <tr>--}}
                    {{--                            <td>Tiger Nixon</td>--}}
                    {{--                            <td>System Architect</td>--}}
                    {{--                            <td>Edinburgh</td>--}}
                    {{--                            <td>61</td>--}}
                    {{--                            <td>2011/04/25</td>--}}
                    {{--                            <td>$320,800</td>--}}
                    {{--                        </tr>--}}
                    {{--                        <tr>--}}
                    {{--                            <td>Garrett Winters</td>--}}
                    {{--                            <td>Accountant</td>--}}
                    {{--                            <td>Tokyo</td>--}}
                    {{--                            <td>63</td>--}}
                    {{--                            <td>2011/07/25</td>--}}
                    {{--                            <td>$170,750</td>--}}
                    {{--                        </tr>--}}


                    </tbody>

                </table>





            </div>
        </div>
    </div>

@endsection


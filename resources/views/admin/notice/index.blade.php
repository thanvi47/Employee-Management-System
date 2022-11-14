@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">All Notice</li>
                    </ol>
                </nav>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-warning">
                        {{Session::get('error')}}
                    </div>
                @endif
                @foreach($notices as $key=>$notice)
                    <div class="card alert alert-info">
                        <div class="card-header">
                            <h3 class="card-title alert alert-warning ">{{$notice->title}}</h3>
                            <div class="card-body">
                                {{$notice->description}} <br>
                                <hr>
                            Date :    <p class="badge badge-success">{{$notice->date}}</p>
                            Created By :    <p class="badge badge-warning">{{$notice->name}}</p>

                            </div>
                            <div class="card-footer ">
                            <span class="float-right">
                                @if(isset(auth()->user()->role->permissions['name']['notice']['can-delete']))
                                   <a href="#" data-toggle="modal" data-target="#exampleModal{{$notice->id}}">
                                <i class="fas fa-trash text-danger">Delete</i>
                            </a>
                                @endif


                       <div class="modal fade" id="exampleModal{{$notice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('notice.destroy',$notice->id)}}" method="post">@csrf
                                        {{method_field('DELETE')}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            </span>

                                <span class="float-left">
                                    @if(   isset(auth()->user()->role->permissions['name']['notice']['can-edit']))
                                    <a href="{{route('notice.edit',$notice->id)}} "> <i
                                            class="fas fa-edit">Edit</i></a>
                                    @endif
                        </span>
                            </div>

                        </div>
                        @endforeach


                    </div>
            </div>
        </div>

@endsection


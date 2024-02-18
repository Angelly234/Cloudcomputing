@extends('layout.master')
@section('dycontent')
<div class="container-fluid">			    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All Student</h4>
                <br>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">Users</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">All Users</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item"><a href="/all-students" class="nav-link btn-primary mr-1 show active">Unbanned List</a></li>
                <li class="nav-item"><a href="/ban"  class="nav-link btn-primary">Banned List</a></li>
            </ul>
        </div>
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All Users List  </h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Started at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $users ) 
                                        <tr>
                                            <td>{{$users->users_id}}</td>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>{{ Carbon\Carbon::parse($users->created_at)->format('Y-m-d') }}</td>
                                             <td>
                                                <form action="/banUpdate?users_id={{$users->users_id}}" method="POST">
                                                @csrf
                                                <button class="btn btn-danger btn-sm"style="margin-top: 4px;" onclick="confirmUnan()" ><i class="la la-check-circle"></i> Ban</button>
                                                </form>
                                            </td> 
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div> 
</div>
@stop
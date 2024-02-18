@extends('layout.master')
@section('dycontent')
<div class="container-fluid">			    
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>All upload</h4>
                <br>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">upload</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0);">All upload</a></li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="row tab-content">
                <div id="list-view" class="tab-pane fade active show col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">All scholar List </h4>
                       
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Publish date</th>
                                            <th scope="col">Upload Date</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upload as $upload ) 
                                        <tr>
                                            <td>{{$upload->upload_papers_id}}</td>
                                            <td>{{$upload->description}}</td>
                                            <td>{{$upload->title}}</td>
                                            <td>{{$upload->publish_date}}</td>
                                            <td>{{ Carbon\Carbon::parse($upload->publish_date)->format('Y-m-d') }}</td>
                                           
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
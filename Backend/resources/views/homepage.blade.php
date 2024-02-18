@extends('layout.master')

@section('dycontent')
<div class="container-fluid">
    <ol class="breadcrumb mb-7">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-primary">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-users"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Users</p>
                            <h3 class="text-white">{{ $usersCount }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: {{ $usersCount * 2 }}%"></div>
                            </div>
                            <small>In percent: {{ $usersCount * 2 }}% </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-warning">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-user"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Total Scholars</p>
                            <h3 class="text-white">{{ $scholarsCount }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: {{ $scholarsCount * 2 }}%"></div>
                            </div>
                            <small>In percent: {{ $scholarsCount * 2 }}% </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="widget-stat card bg-danger">
                <div class="card-body">
                    <div class="media">
                        <span class="mr-3">
                            <i class="la la-cloud-download"></i>
                        </span>
                        <div class="media-body text-white">
                            <p class="mb-1">Document Uploads</p>
                            <h3 class="text-white">{{ $uploadCount }}</h3>
                            <div class="progress mb-2 bg-white">
                                <div class="progress-bar progress-animated bg-light" style="width: {{ $uploadCount * 2 }}%"></div>
                            </div>
                            <small>In percent: {{ $uploadCount * 2 }}% </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12 col-xxl-12 col-md-12">
            <div class="card profile-tab">
                <div class="card-header">
                    <h4 class="card-title">Status</h4>
                </div>
                <div class="card-body custom-tab-1">
                    <ul class="nav nav-tabs mb-3">
                        <li class="nav-item"><a href="#user" data-toggle="tab" class="nav-link pb-2 active show">Normal Users</a></li>
                        <li class="nav-item"><a href="#scholar" data-toggle="tab" class="nav-link pb-2">Scholar Users</a></li>
                        <li class="nav-item"><a href="#upload" data-toggle="tab" class="nav-link pb-2">Upload Users</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="user" class="tab-pane fade active show">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Started at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $userCount = 0;
                                    @endphp
                                    @foreach($users as $user)
                                    @if($userCount < 5)
                                    <tr>
                                        <td>{{ $user->users_id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}</td>
                                    </tr>
                                    @php
                                    $userCount++;
                                    @endphp
                                    @else
                                    @break
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                            @if(count($users) > 5)
                            <div class="mt-3 text-right">
                                <a href="/all-users" class="btn btn-primary">View All Users</a>
                            </div>
                            @endif
                        </div>
        
                        <div id="scholar" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Started at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $scholarCount = 0;
                                        @endphp
                                        @foreach($scholars as $scholar)
                                        @if($scholarCount < 5)
                                        <tr>
                                            <td>{{ $scholar->scholars_id }}</td>
                                            <td>{{ $scholar->name }}</td>
                                            <td>{{ $scholar->email }}</td>
                                            <td>{{ Carbon\Carbon::parse($scholar->created_at)->format('Y-m-d') }}</td>
                                        </tr>
                                        @php
                                        $scholarCount++;
                                        @endphp
                                        @else
                                        @break
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if(count($scholars) > 5)
                            <div class="mt-3 text-right">
                                <a href="/all-scholars" class="btn btn-primary">View All Scholar Users</a>
                            </div>
                            @endif
                        </div>
        
                        <div id="upload" class="tab-pane fade">
                            <div class="table-responsive">
                                <table class="table table-responsive-md">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Website</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Publish Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $uploadCount = 0;
                                        @endphp
                                        @foreach($upload as $uploadedPaper)
                                        @if($uploadCount < 5)
                                        <tr>
                                            <td>{{ $uploadedPaper->upload_papers_id }}</td>
                                            <td>{{ $uploadedPaper->title }}</td>
                                            <td>{{ $uploadedPaper->website }}</td>
                                            <td>{{ $uploadedPaper->file }}</td>
                                            <td>{{ Carbon\Carbon::parse($uploadedPaper->publish_date)->format('Y-m-d') }}</td>
                                        </tr>
                                        @php
                                        $uploadCount++;
                                        @endphp
                                        @else
                                        @break
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if(count($upload) > 5)
                            <div class="mt-3 text-right">
                                <a href="/upload" class="btn btn-primary">View All Upload Users</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection

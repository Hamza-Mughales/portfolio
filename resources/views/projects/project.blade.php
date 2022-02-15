@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
<h1>Projects </h1>
</div>
<div class="mb-2">
    <a href="{{ route('add_project') }}" class="btn btn-primary">New Project</a>
</div>


<table class="table table-striped ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Short_desc</th>
            <th>Description</th>
            <th>URL</th>
            <th>Order</th>
            <th>Main_img</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $projects as $project )
        <tr>
            <td> {{$project->id}}</td>
            <td> {{$project->name}}</td>
            <td> {{$project->short_desc}}</td>
            <td> {{$project->description}}</td>
            <td> {{$project->url}}</td>
            <td> {{$project->order}}</td>
            <td> <img class="w-100" src="{{asset('storage/'.$project->main_img)}}" alt="not fount" ></td>
            <td class="d-flex">
                <a href="{{ route('update_project',['project_id' => $project->id ]) }}" class="btn btn-info btn-sm m-1">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete_project',['project_id' => $project->id ]) }}" class="btn btn-danger btn-sm m-1">
                    <i class="fa fa-times"></i>
                </a>
                <a href="{{ route('project_details',['project_id' => $project->id ]) }}" class="btn btn-primary btn-sm m-1">Show details</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
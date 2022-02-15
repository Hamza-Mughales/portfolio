@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
<h1>{{$project_name}} Details</h1>
</div>
<div class="mb-2">
    <a href="{{ route('add_proj_details', ['project_id'=>$project_id]) }}" class="btn btn-primary">New Details</a>
</div>


<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>Img</th>
            <th>Description</th>
            <th>Project_id</th>
            <th>Order</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $project_details as $pd )
        <tr>
            <td> {{$pd->id}}</td>
            <td> {{$pd->title}}</td>
            <td> <img width="90" height="90" alt="no img" src="{{ asset( 'storage/'. $pd->img )}} "/></td>
            <td> {{$pd->description}}</td>
            <td> {{$pd->project_id}}</td>
            <td> {{$pd->order}}</td>
            <td>
                <a href="{{ route('edit_proj_details', [ 'p_desc_id' => $pd->id ]) }}" class="btn btn-info btn-sm">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete_proj_details',['id'    => $pd->id]) }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
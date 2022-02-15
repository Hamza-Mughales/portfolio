@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
<h1>Skills </h1>
</div>
<div class="mb-2">
    <a href="{{ route('add_skill') }}" class="btn btn-primary">New Skill</a>
</div>


<table class="table table-striped ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Percentage</th>
            <th>Order</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $skills as $skill )
        <tr>
            <td> {{$skill->id}}</td>
            <td> {{$skill->name}}</td>
            <td> {{$skill->percentage}}</td>
            <td> {{$skill->order}}</td>
            <td> {{$skill->type}}</td>
            <td class="d-flex">
                <a href="{{ route('update_skill',['skill_id' => $skill->id ]) }}" class="btn btn-info btn-sm m-1">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete_skill',['skill_id' => $skill->id ]) }}" class="btn btn-danger btn-sm m-1">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection
@extends('layouts.layout')

@section('content')
<div class="text-center w-100 mb-5">
<h1>About </h1>
</div>
<div class="mb-2">
    <a href="{{ route('add_about') }}" class="btn btn-primary">New About</a>
</div>


<table class="table table-striped  table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>C.V</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

        @foreach( $about as $about )
        <tr>
            <td> {{$about->id}}</td>
            <td> {{$about->name}}</td>
            <td> {{$about->phone}}</td>
            <td> {{$about->email}}</td>
            <td> {{$about->title}}</td>
            <td> {{$about->description}}</td>
            <?php
                if ($about->img) 
                    $about_img = asset( 'storage/'. $about->img );
                else
                    $about_img = asset( 'img/avatar.jpg' );
            ?>
            <td> <img width="90" height="90" alt="no img" src="{{ $about_img }} "/></td>
            <td> {{$about->cv}}</td>
            <td class="d-flex">
                <a href="{{ route('edit_about',['about_id'=> $about->id] ) }}" class="btn btn-info btn-sm m-1">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="{{ route('delete_about',['about_id'=> $about->id] ) }}" class="btn btn-danger btn-sm m-1">
                    <i class="fa fa-times"></i>
                </a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection